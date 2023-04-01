<?php

namespace App\Http\Controllers\Admin\credits;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashCreditController extends Controller
{
    public function search(){
        return view('credits.cccollection.search');
    }

    public function csearch(){
        return view('credits.ccclosing.search');
    }

    public function index(){
        return view('credits.cccollection.index');
    }

    public function ccclosing(){
        return view('credits.ccclosing.index');
    }
}
