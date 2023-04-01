<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Http\Controllers\Controller;
use App\Models\Accounts\CcLoanCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CcLoanCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ccloan_categories = CcLoanCategory::all();
        return view('Accounts.CC_Loan.CCLoan_category.index', compact('ccloan_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title' => 'required|unique:cc_loan_categories,title',
        ], [
            'title.unique' => 'The cc_loan_categories has already been taken.',
            'title.required' => 'The cc_loan_categories is required.'
        ]);

        $relation = new CcLoanCategory();
        $relation->title = $request->title;
        $relation->save();
        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ccloancategory = CcLoanCategory::find($id);
        return view('Accounts.CC_Loan.CCLoan_category.edit', compact('ccloancategory'));
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
            'name' => 'required',
        ], [
            'name.required' => 'The ccloancategory is required.'
        ]);
        CcLoanCategory::findOrFail($id)->update([
            'title'=>$request->name,
        ]);
        return redirect()->route('ccloancategory.index')->with(Toastr::success('CC Loan Category Updated successfully!','Success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ccloancategory_id =CcLoanCategory::findOrFail($id);
        $ccloancategory_id->delete();
        return redirect()->route('ccloancategory.index')->with(Toastr::success('CC Loan Category Deleted successfully!','Success'));
    }
}
