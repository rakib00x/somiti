<?php

namespace App\Http\Controllers\Admin\Voucher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashController extends Controller
{
    public function cash(){
        return view('voucher.cash_closing.index');
    }

    public function create(){
        return view('voucher.cash_closing.create');
    }
}
