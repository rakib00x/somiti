<?php

namespace App\Http\Controllers\Admin\Primary;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Postoffice;
use App\Models\Accounts\SubDistrict;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostofficeController extends Controller
{

    public function index(Request $request)
    {
        if($request->search){
            $postoffices = Postoffice::where('title', $request->search)
            ->paginate(10);
        }
        else{

            $postoffices = Postoffice::paginate(10);
        }
        return view('Primary.post-office-list.index',compact('postoffices'));
    }


    public function create()
    {
        $subdistricts = SubDistrict::where('status', 1)->get();
        return view('Primary.post-office-list.create',compact('subdistricts'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'sub_district'=>'required',
            'name'=>'required',
        ]);
        Postoffice::insert([
            'sub_district_id'=>$request->sub_district,
            'title'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('postoffice.index')->with(Toastr::success('Post Office added successfully!','Success'));
    }

    public function edit($id)
    {
        $subdistricts = SubDistrict::where('status', 1)->get();
        $postOffice = Postoffice::findOrFail($id);

        return view ('Primary.post-office-list.edit',compact('subdistricts','postOffice'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'sub_district'=>'required',
            'name'=>'required',
        ]);
        Postoffice::find($id)->update([
            'sub_district_id'=>$request->sub_district,
            'title'=>$request->name,
        ]);
        return redirect()->route('postoffice.index')->with(Toastr::success('Post Office Updated successfully!','Success'));
    }

    public function destroy($id)
    {
        Postoffice::findOrFail($id)->delete();
        return redirect()->route('postoffice.index')->with(Toastr::success('Post Office Deleted successfully!','Success'));
    }

    public function status($id){
        $division = Postoffice::find($id);
        if($division->status == 0){
            Postoffice::find($id)->update([
                'status'=>1,
            ]);
            return redirect()->route('postoffice.index')->with(Toastr::success('Postoffice activate successfully!','Success'));
        }
        else{
            Postoffice::find($id)->update([
                'status'=>0,
            ]);
            return redirect()->route('postoffice.index')->with(Toastr::success('Postoffice inactivate successfully!','Success'));
        }
        }
}
