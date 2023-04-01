<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use App\Models\Accounts\Members;
use App\Models\Accounts\MemberShareAccount;
use App\Models\Savings;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShareAccountController extends Controller
{
    public function index(){
        $all_share_account = Members::where('share', '!=', null)->get();
        return view('Accounts.ShareAccount.index', [
            'all_share_account'=>$all_share_account,
        ]);
    }

    public function destroy($id){
        try {
            $memeber = Members::find($id);
            $saving_account = Savings::where('account_id', $memeber->account)->first();
            if ($saving_account) {
                $saving_account->forceDelete();
            }
            $file = new FileManager();
            $file->folder('members')->delete($memeber->m_photo);
            $file->folder('members')->delete($memeber->m_signature);
            $file->folder('members')->delete($memeber->nid_attachment);
            $file->folder('members/nominee')->delete($memeber->n_photo);
            $memeber->delete();
            return redirect()->back()->with(Toastr::success('Share Account deleted successfully!', 'Deleted'));
        } catch (Exception  $e) {
            return redirect()->back()->with(Toastr::error('Something went wrong!', 'Warning'));
        }
    }
    //new_transaction
    public function new_transaction($id){
        $share_account = Members::findOrFail($id);
        return view('Accounts.ShareAccount.new-transaction',[
            'share_account'=>$share_account,
        ]);
    }

    //transaction_store
    public function transaction_store(Request $request){
        $request->validate([
            'date' => 'required',
            'transaction_type' => 'required',
            'amount' => 'required',
        ]);

        // return $request->all();
        $share_id = Members::find($request->share_account_id);
        $type = $request->transaction_type;
        $user_id = Auth::user()->id;

        //sale share
        if($type == 'Sale'){
            if($request->amount <= $share_id->share){
                $share_amount = $share_id->share - $request->amount;
                MemberShareAccount::insert([
                    'user_id'=>$user_id,
                    'date'=>$request->date,
                    'account_number'=>$share_id->account,
                    'amount'=>$request->amount,
                    'share'=>$request->amount/100,
                    'transaction_type'=>$type,
                    'details'=>$request->details,
                    'created_at'=>Carbon::now(),
                ]);

               $share_id->update([
                    'share'=>$share_amount,
               ]);

                return redirect()->route('shareTransaction.list',$share_id->account)->with(Toastr::success('Share Sale Success !', 'success'));
            }
            else{
               return redirect()->back()->with(Toastr::warning('You can Sale max = '.$share_id->share.'TK', 'success'));
            }
        }
        //purchase share
        if($type == 'Purchase'){
            if($request->amount < 100){
                return redirect()->back()->with(Toastr::warning('Share Purchase minimum = 100TK', 'success'));
            }
            else{
                $share_amount = $share_id->share + $request->amount;
                MemberShareAccount::insert([
                    'user_id'=>$user_id,
                    'date'=>$request->date,
                    'account_number'=>$share_id->account,
                    'amount'=>$request->amount,
                    'share'=>$request->amount/100,
                    'transaction_type'=>$type,
                    'details'=>$request->details,
                    'created_at'=>Carbon::now(),
                ]);

               $share_id->update([
                    'share'=>$share_amount,
               ]);

                return redirect()->route('shareTransaction.list',$share_id->account)->with(Toastr::success('Share Purchase Success !', 'success'));
            }
        }


    }

    //transaction_list
    public function transaction_list($id){
        $transactions_lists = MemberShareAccount::where('account_number', $id)->latest()->get();
         $trn_id = Members::where('account', $id)->pluck('id')->first();
        return view('Accounts.ShareAccount.transaction-list',[
            'transactions_lists'=>$transactions_lists,
            'trn_id'=>$trn_id,
        ]);
    }

    //transaction_list_update
    public function transaction_list_update(Request $request){
        return $request->all();
    }

    public function transaction_list_delete($id){
        MemberShareAccount::find($id)->delete();
        return back()->with(Toastr::success('Share Transaction Deleted !', 'success'));
    }

    //share_certificate
    public function share_certificate($id){
        $share_account = Members::findOrFail($id);
        return view('Accounts.ShareAccount.shareCertificate',[
            'share_account'=>$share_account,
        ]);
    }
    //share_statement
    public function share_statement($id){
        $share_account = Members::findOrFail($id);
        return view('Accounts.ShareAccount.share-statement',[
            'share_account'=>$share_account,
        ]);
    }
}
