<?php

namespace App\Http\Controllers\Admin\Credit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodayCollectionController extends Controller
{
    public function todaycollect(){
        return view('credits.toady-collection.index');
    }
}
