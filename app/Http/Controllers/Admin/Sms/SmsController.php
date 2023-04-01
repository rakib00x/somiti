<?php

namespace App\Http\Controllers\Admin\Sms;

use App\Http\Controllers\Controller;
use App\Http\Traits\MobileSmsTrait;
use App\Models\SmsHistory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class SmsController extends Controller
{
    use MobileSmsTrait;
    public function singlesms()
    {
        return view('sms.singlesms');
    }

    public function singlesms_send(Request $request)
    {
        $request->validate([
            'mobile'    => 'required|regex:/(01)[3-9]\d{8}$/',
            'message'    => 'required|string',
        ]);
        if (env('SMS_API_KEY') && env('SMS_API_STATUS') == 1) {
            $this->singleMobileSms($request->mobile, $request->message);
            return redirect()->back()->with(Toastr::success('Message Sent Successfully!', 'Success'));
        }
        return redirect()->back()->with(Toastr::error('Creadential Not Match!', 'Error'));
    }

    public function monthlysms()
    {
        return view('sms.monthly');
    }

    public function smsreport(Request $request)
    {
        $histories = SmsHistory::query()
            ->where(function ($q) use ($request) {
                if ($request->start_date) {
                    $q->whereDate('created_at', '>=', $request->start_date,);
                }
                if ($request->end_date) {
                    $q->whereDate('created_at', '<=',  $request->end_date);
                }
                if ($request->account) {
                    $q->where('account_number', $request->account);
                }
            })
            ->orderBy('id', 'desc')
            ->get();
        return view('sms.report', compact('histories'));
    }
}
