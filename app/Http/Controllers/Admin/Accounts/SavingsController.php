<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Helpers\CheckStaffAccessByArea;
use App\Http\Controllers\Controller;
use App\Http\Traits\MobileSmsTrait;
use App\Models\Accounts\Members;
use App\Models\Primary\Area;
use App\Models\Savings;
use App\Models\SavingsBalance;
use App\Models\SavingsScheme;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
// use Ramsey\Uuid\Uuid;

class SavingsController extends Controller
{
    use CheckStaffAccessByArea;
    use MobileSmsTrait;

    protected $rules = [
        'account_id'     => 'required',
        'scheme_id'      => 'required',
        'start_date'     => 'required|date',
        'savings_amount' => 'required|integer',
        'installment'    => 'required|integer',
        'expire_date'    => 'required|date',
    ];

    protected $messages = [
        'scheme_id.required'      => 'Scheme not found',
        'start_date.required'     => 'Savings start date is required',
        'start_date.date'         => 'Savings start date must be a date',
        'savings_amount.required' => 'Amount per installment date is required',
        'savings_amount.integer'  => 'Amount per installment must be a positive',
        'expire_date.required'    => 'Expire date is required',
        'expire_date.date'        => 'Expire date must be a date',
    ];


    public function index(Request $request)
    {
        // Session::forget('goto_url'
        $areas = Area::all();
        if (Auth::user()->hasRole('admin|manager')) {
            $savings = Savings::query()
            ->where(function ($q) use ($request){
                if($request->search){
                    $q->where('account_id', $request->search)
                    ->orWhereIn('account_id', Members::query()->where('m_name', $request->search)->pluck('account'));
                }
                if($request->area_id){
                    $q->whereIn('account_id', Members::query()->where('area_id', $request->area_id)->pluck('account'));
                }
            })
            ->latest()
            ->paginate(100);
        }
        if (Auth::user()->hasRole('field-officer')) {

            // return response()->json();
            $savings = Savings::query()
            ->where(function ($q) use ($request){
                if($request->search){
                    $q->where('account_id', $request->search)
                    ->orWhereIn('account_id', Members::query()->where('m_name', $request->search)->pluck('account'));
                }
            })->whereIn('account_id', Members::where('area_id', Auth::user()->staff->area)->pluck('account'))
            ->latest()
            ->paginate(100);
        }
        return view('savings.index', compact('savings', 'areas'));
    }

    public function closed()
    {
        if (request()->has('account')) {
            $account = request()->query('account');

            $this->checkMemberAccessView($account);

            $savings = Savings::where('account_id', $account)->where('status', '0')->with(['member', 'scheme'])->latest()->paginate();
        } else {
            $savings = Savings::where('status', '0')->with(['member', 'scheme'])->latest()->paginate(10);
        }

        return view('savings.closed', compact('savings'));
    }

    public function getNew($id)
    {
        $member = Members::find($id);

        $this->checkMemberAccessView($member->account);

        $schemes = SavingsScheme::where('status', 1)->get();
        $num_savings = Savings::where('account_id', $member->account)->where('status', '1')->count();

        return view('savings.new', compact('member', 'schemes', 'num_savings'));
    }

    public function postNew(Request $request)
    {
        $this->validate($request, ['account' => 'required']);

        $this->checkMemberAccess($request->account);

        $member = DB::table('members')->select(['id', 'account'])->where('account', $request->account)->first();

        if (!$member) {
            return redirect()->back()->with(Toastr::error('Account not found!', 'Error!'));
        }

        $savings_check = DB::table('savings')->select('status')->where('account_id', $request->account)->whereIn('status', [1, 2, 3])->get()->first();
        if ($savings_check) {
            return redirect()->back()->with(Toastr::warning('This account is already has running/open dps', 'Warning'));
        }


        return redirect()->route('savings.add', $member->id);
    }

    public function create()
    {
        return view('savings.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules, $this->messages);

        $this->checkMemberAccess($request->account_id);

        $savings = new Savings($request->except('expire_date', 'distance', 'interest'));
        $savings->code = Str::uuid();
        $savings->expire_date = date('Y-m-d', strtotime($request->expire_date));
        $savings->status = 1;
        $savings->save();

        // sms section
        $member = Members::where('account', $request->account_id)->first();
        $scheme = SavingsScheme::find($request->scheme_id);
        if ($member && $member->m_mobile && $scheme) {
            $smsData = [
                'mobile' => $member->m_mobile,
                'account' => $member->account,
                'scheme' => $scheme->name,
                'amount' => $request->savings_amount,
                'installment' => $request->installment,
                'date' => $request->start_date,
                'deposit_amount' => $member->cd_ac_total_deposit,
                'account_balance' => $member->cd_ac_balance,
            ];
            $this->newSavingsSms($smsData);
        }

        return redirect()->to(route('savings.index'))->with(Toastr::success('New Savings added successfully!', 'Added'));
    }

    public function shows($id)
    {
        $savings = Savings::where('account_id', $id)->first();

        $this->checkMemberAccessView($id);

        return view('savings.transactions', compact('savings'));
    }

    public function edit($id)
    {
        $this->checkMemberAccess($id);
    }

    public function update(Request $request, $id)
    {
        $this->checkMemberAccess($id);
    }

    public function destroy($id)
    {
        $this->checkMemberAccess($id);

        $savings = Savings::find($id);
        $savings->forceDelete();

        return redirect()->route('savings.index')->with(Toastr::info('Saving Ac deleted successfully!', 'Success'));
    }

    public function transactionsDetete($id)
    {
        if (Auth()->user()->hasRole('admin|manager')) {
            SavingsBalance::find($id)->delete();
           return redirect()->back()->with(Toastr::success("Savings Transaction deleted successfully!", "Success"));
       }
       abort(404);
    }
}
