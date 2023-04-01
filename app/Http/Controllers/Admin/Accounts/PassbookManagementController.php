<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PassbookManagementController extends Controller
{
    public function index(){
       return view('Accounts.passbook-management.index');
    }
}
