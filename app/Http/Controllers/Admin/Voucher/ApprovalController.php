<?php

namespace App\Http\Controllers\Admin\Voucher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts\LoanApplication;

class ApprovalController extends Controller
{
    public function approve(){
        $loan_application = LoanApplication::latest()->get();
        return view('voucher.for_approval.index', compact('loan_application'));
    }
}
