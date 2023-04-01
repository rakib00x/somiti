<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Members;
use Illuminate\Http\Request;

class MemberBalanceReportController extends Controller
{
    public function search()
    {
        return view('Reports.all_report.member_balance.search');
    }

    public function index(Request $request){

        $member = Members::where('account' , $request->account)->first();
        return view('Reports.all_report.member_balance.index', compact('member'));
      
    }
}
