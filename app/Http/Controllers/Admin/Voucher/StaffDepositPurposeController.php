<?php

namespace App\Http\Controllers\Admin\Voucher;

use App\Http\Controllers\Controller;
use App\Models\StaffDepositPurpose;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class StaffDepositPurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purposes = StaffDepositPurpose::all();

        return view('voucher.staff-deposit-purpose-list.index', compact('purposes'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:staff_deposit_purposes,title'
        ], [
            'title.unique' => 'The purpose has already been taken.',
            'title.required' => 'The purpose is required.'
        ]);

        StaffDepositPurpose::create([
            'title' => $request->title
        ]);
        return response()->json([
            'status' => 'success',
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $purpose = StaffDepositPurpose::find($id);
        return view('voucher.staff-deposit-purpose-list.edit', compact('purpose'));
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
            'title' => 'required|unique:staff_deposit_purposes,title,'.$id,
        ], [
            'title.unique' => 'The purpose has already been taken.',
            'title.required' => 'The purpose is required.'
        ]);
        StaffDepositPurpose::findOrFail($id)->update([
            'title' => $request->title,
        ]);
        return redirect()->route('staff-deposit-purpose.index')->with(Toastr::success('Purpose Updated successfully!', 'Success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purpose = StaffDepositPurpose::findOrFail($id);
        $purpose->delete();
        return redirect()->route('staff-deposit-purpose.index')->with(Toastr::success('Purpose Deleted successfully!', 'Success'));
    }
}

