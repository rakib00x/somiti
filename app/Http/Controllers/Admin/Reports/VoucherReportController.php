<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VoucherReportController extends Controller
{
    public function voucherSearch(){
        return view('Reports.voucher.search');
    }

    public function index(){
        return view('Reports.all_report.index');
    }
}
