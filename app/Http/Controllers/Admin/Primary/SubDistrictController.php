<?php

namespace App\Http\Controllers\Admin\Primary;

use App\Http\Controllers\Controller;
use App\Models\Accounts\District;
use App\Models\Accounts\Division;
use App\Models\Accounts\SubDistrict;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubDistrictController extends Controller
{
    public function index(Request $request)
    {
        if($request->search){
            $subdistricts = SubDistrict::where('title', $request->search)
            ->paginate(10);
        }
        else{

            $subdistricts = SubDistrict::paginate(10);
        }
        return view('Primary.subdistrict.index', compact('subdistricts'));
    }

    public function create()
    {
        $districts = District::where('status', 1)->get();
        return view('Primary.subdistrict.create', compact('districts'));
    }

    // Public function getdivision(Request $request){
    //     $districts = District::where('division_id', $request->division_id)->where('status', 0)->get();
    //    $data = '<option value="">--select--</option>';
    //    foreach($districts as $district){
    //         $data .= '<option value="'.$district->id.'">'.$district->title.'</option>';
    //     }
    //    echo $data;
    // }

    public function store(Request $request)
    {
        $request->validate([
            'district'=>'required',
            'Subdistrict'=>'required',
        ]);

        SubDistrict::insert([
            'district_id'=>$request->district,
            'title'=>$request->Subdistrict,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('subdistrict.index')->with(Toastr::success('SubDistrict added successfully!','Success'));
    }

    public function edit($id)
    {
        $districts = District::where('status', 1)->get();
        $subdistricts = SubDistrict::find($id);
        return view('Primary.subdistrict.edit', compact('subdistricts', 'districts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'district'=>'required',
            'Subdistrict'=>'required',
        ]);

        SubDistrict::find($id)->update([
            'district_id'=>$request->district,
            'title'=>$request->Subdistrict,
        ]);
        return redirect()->route('subdistrict.index')->with(Toastr::success('SubDistrict Updated successfully!','Success'));
    }


    public function destroy($id)
    {
        SubDistrict::find($id)->delete();
        return redirect()->route('subdistrict.index')->with(Toastr::success('SubDistrict Deleted successfully!','Success'));
    }

    public function status($id){
        $division = SubDistrict::find($id);
        if($division->status == 0){
            SubDistrict::find($id)->update([
                'status'=>1,
            ]);
            return redirect()->route('subdistrict.index')->with(Toastr::success('SubDistrict activate successfully!','Success'));
        }
        else{
            SubDistrict::find($id)->update([
                'status'=>0,
            ]);
            return redirect()->route('subdistrict.index')->with(Toastr::success('SubDistrict inactivate successfully!','Success'));
        }

    }
}
