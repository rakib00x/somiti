<?php

namespace App\Http\Controllers\Admin\Credit;

use App\Helpers\CheckStaffAccessByArea;
use App\Http\Controllers\Controller;
use App\Models\Accounts\CurrentAccount;
use App\Models\Accounts\GeneralAccount;
use App\Models\Accounts\GeneralAcTransactions;
use App\Models\Accounts\Loan;
use App\Models\Accounts\Members;
use App\Models\CurrentAccountDetails;
use App\Models\LoanInstallments;
use App\Models\Savings;
use App\Models\SavingsBalance;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\MobileSmsTrait;


class CommonCollectionController extends Controller
{
    use CheckStaffAccessByArea;
    use MobileSmsTrait;

    public function index($account)
    {
        $general_account = GeneralAccount::where('account_id', $account)->first();
        $current_account = CurrentAccountDetails::where('account_id', $account)->first();
        $member = Members::where('account', $account)->first();
        $savings = Savings::where('account_id', $account)->first();
        $loan_accounts = Loan::where('account_id', $account)->get();
        $this->checkMemberAccessView($account);

        Session::put('goto_url', url()->current());
        return view('credits.common.index', compact('general_account', 'savings', 'member', 'current_account', 'loan_accounts'));
    }

    public function test($account)
    {
        $member = Members::where('account', $account)->first();

        $this->checkMemberAccessView($account);

        Session::put('goto_url', url()->current());
        return view('credits.common.test', compact('member'));
    }

    public function search()
    {
        return view('credits.common.search');
    }

    public function postSearch(Request $request)
    {
        $request->validate(['account' => 'required']);

        $this->checkMemberAccess($request->account);

        $member = Members::where('account', $request->account)->first();

        if (!$member) {
            return redirect()->back()->with(Toastr::error("No Member Account found with given the account number ", 'Error!'));
        }

        return redirect()->route('credits.common.index', $request->account);
    }

    public function commoncollection_store(Request $request, $account)
    {
        $member = Members::where('account',$account)->first();
        if ($request->general) {
            $this->checkMemberAccess($account);
            $generalAccount = new GeneralAcTransactions();
            $generalAccount->date = $request->previous_date ?? Carbon::now();
            $generalAccount->account = $account;
            $generalAccount->deposit = $request->general;
            $generalAccount->note = $request->note;
            $generalAccount->processed_by = Auth::user()->name;
            $generalAccount->save();
             // sms section
         if ($generalAccount && $member->m_mobile) {
            $smsData = [
                'mobile' => $member->m_mobile,
                'account' => $generalAccount->account_id,
                'password' => $request->password,
                'date' => date('d-m-Y'),
            ];
            $this->newMemberSms("Congratulations! Your general common collection has been open successfully. Account Number:", $smsData);
        }
        }

        if ($request->current) {
            $this->checkMemberAccess($account);
            $current_account = new CurrentAccount();
            $current_account->date = $request->previous_date ?? Carbon::now();
            $current_account->account = $account;
            $current_account->deposit_amount = $request->current;
            $current_account->posted_by = Auth::user()->name;
            $current_account->save();
            // sms section
         if ($current_account && $member->m_mobile) {
            $smsData = [
                'mobile' => $member->m_mobile,
                'account' => $member->account_id,
                'password' => $request->password,
                'date' => date('d-m-Y'),
            ];
            $this->newMemberSms("Congratulations! Your current common collection has been open successfully. Account Number:", $smsData);
        }
        }

        if ($request->dps_deposit) {
            $this->checkMemberAccessView(Savings::find($request->savings_id)->member->account);

            $count = $request->dps_deposit / $request->per_installment;
            if (!is_int($count)) {
                return redirect()->back()->with(Toastr::error('Invalid Dps Installment Amount', 'Error!'));
            }

            for ($i = 1; $i <= $count; $i++) {
                $deposit = new SavingsBalance();
                $deposit->code = uniqid();
                $deposit->savings_id = $request->savings_id;
                $deposit->date = $request->previous_date ?? Carbon::now();
                $deposit->deposit = $request->per_installment;
                $deposit->note = $request->note;
                $deposit->processed_by = Auth::user()->name;
                $deposit->savings()->update(['status' => 2]);
                $deposit->save();
                // sms section
                if ($deposit && $member->m_mobile) {
                    $smsData = [
                        'mobile' => $member->m_mobile,
                        'account' => $member->account_id,
                        'password' => $request->password,
                        'date' => date('d-m-Y'),
                    ];
                    $this->newMemberSms("Congratulations! Your deposite common collection has been open successfully. Account Number:", $smsData);
                }
            }
        }

        if ($request->loan_amount > 0) {

            // return $request->previous_date;
            for ($i = 0; $i < count($request->loan_amount); $i++) {
                if ($request->loan_amount[$i] && $request->loan_id[$i]) {
                    $install = new LoanInstallments();
                    $install->processed_by = Auth::user()->name;
                    $install->loan()->update(['status' => 2]);
                    $install->installment_no = LoanInstallments::where('loan_id', $request->loan_id[$i])->max('installment_no') + 1;
                    $install->loan_id = $request->loan_id[$i];
                    $install->date = $request->previous_date ?? Carbon::now();
                    $install->amount = $request->loan_amount[$i];
                    $install->save();
                    if ($install && $member->m_mobile) {
                        $smsData = [
                            'mobile' => $member->m_mobile,
                            'account' => $member->account_id,
                            'password' => $request->password,
                            'date' => date('d-m-Y'),
                        ];
                        $this->newMemberSms("Congratulations! Your loan common collection has been open successfully. Account Number:", $smsData);
                    }
                }
            }
        }
        return redirect()->route('credits.common.search')->with(Toastr::success('Deposit posted successfully', 'Success!'));
    }
}
