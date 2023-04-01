<?php

namespace App\Http\Controllers\Admin\Primary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    Public function index(){
        return view('Primary.Statistic_view.index');
    }
}
