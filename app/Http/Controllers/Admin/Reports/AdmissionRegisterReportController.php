<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Members;
use App\Models\Primary\Area;
use App\Models\Primary\Staffs;
use Illuminate\Http\Request;

class AdmissionRegisterReportController extends Controller
{
    public function search()
    {

        $areas = Area::all();
        $staffs = Staffs::select('id', 'name', 'area')->get();
        return view('Reports.all_report.admission_register.search', compact('areas','staffs'));
    }

    public function index(Request $request)
    {

       $status = $request->status;
        if($request->staff == 'all'){
            $members = Members::when($status, function($query, $status){
                $query->where('active', $status);
            })
            ->where('created_at', '>=', $request->start_date)   
            ->where('created_at', '<=', $request->end_date)
            ->paginate(100);
        }else{
            $staff = Staffs::findOrFail($request->staff);
           
            $members = Members::when($status, function($query, $status){
                $query->where('active', $status);
            })
            ->where('area_id', $staff->area)
            ->where('created_at', '>=', $request->start_date)
            ->where('created_at', '<=', $request->end_date)
            ->paginate(100);
            
        }

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        
        return view('Reports.all_report.admission_register.index', compact('members', 'start_date', 'end_date'));
    }

}
