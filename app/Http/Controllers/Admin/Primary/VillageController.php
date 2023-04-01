<?php

namespace App\Http\Controllers\Admin\Primary;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Postoffice;
use App\Models\Accounts\Villagelist;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;


class VillageController extends Controller
{

    public function index(Request $request)
    {
        if($request->search){
            $villages = Villagelist::where('title', $request->search)
            ->paginate(10);
        }
        else{

            $villages = Villagelist::paginate(10);
        }
        return view('Primary.village-list.index', compact('villages'));
    }


    public function create()
    {
        $postOffices = Postoffice::where('status', 1)->get();
        return view('Primary.village-list.create',compact('postOffices'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'post_office'=>'required',
            'name'=>'required',
        ]);
        Villagelist::insert([
            'postoffice_id'=>$request->post_office,
            'title'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('village.index')->with(Toastr::success('Village added successfully!','Success'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $postoffices = Postoffice::where('status', 1)->get();
        $village = Villagelist::findOrFail($id);

        return view('Primary.village-list.edit',compact('postoffices','village'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'post_office'=>'required',
            'name'=>'required',
        ]);
        Villagelist::find($id)->update([
            'postoffice_id'=>$request->post_office,
            'title'=>$request->name,
        ]);
        return redirect()->route('village.index')->with(Toastr::success('Village Update successfully!','Success'));
    }


    public function destroy($id)
    {
        Villagelist::findOrFail($id)->delete();
        return redirect()->route('village.index')->with(Toastr::success('Village Deleted successfully!','Success'));
    }

    public function status($id){
        echo 'sdjkskds';
    }
}
