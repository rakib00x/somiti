<?php

namespace App\Http\Controllers\Admin\Primary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Primary\Outloan;
use App\Models\Primary\OutLoanHistory;
use Brian2694\Toastr\Facades\Toastr;
class OutloanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search){
            $loans = Outloan::where('name', $request->search)
            ->Orwhere('company', $request->search)
            ->latest()
            ->paginate(10);
        }
        else{

            $loans = Outloan::latest()
            ->paginate(10);
        }
        return view('Primary.outloan.index', compact('loans'));
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
        // return $request->all();
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
            'company' => 'required',
            'profession' => 'required',
            'address' => 'required',
            'active' => 'required',
        ]);
        $add_loan = new Outloan();
        $add_loan->name = $request->name;
        $add_loan->mobile = $request->mobile;
        $add_loan->company = $request->company;
        $add_loan->profession = $request->profession;
        $add_loan->address = $request->address;
        $add_loan->active = $request->active;

        $add_loan->save();
        return redirect()->back()->with(Toastr::success('Outloan added successfully!', 'Added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view_loan = Outloan::find($id);
        $outloan_transactions = OutLoanHistory::where('outloan_id', $id)->latest()->get();
        return view('Primary.outloan.view', compact('view_loan', 'outloan_transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_loan = Outloan::find($id);
        return view('Primary.outloan.edit', compact('edit_loan'));
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
        // return $request->all();
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
            'company' => 'required',
            'profession' => 'required',
            'address' => 'required',
            'active' => 'required',
        ]);
        $edit_loan = Outloan::find($id);
        $edit_loan->name = $request->name;
        $edit_loan->mobile = $request->mobile;
        $edit_loan->company = $request->company;
        $edit_loan->profession = $request->profession;
        $edit_loan->address = $request->address;
        $edit_loan->active = $request->active;

        $edit_loan->save();
        return redirect()->route('outloan.index')->with(Toastr::success('Outloan updated!', 'Updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteLoan = Outloan::find($id);
        $deleteLoan->delete();
        return redirect()->back()->with(Toastr::warning('Outloan deleted!', 'Deleted'));
    }

    public function active($id)
    {
        $active = Outloan::find($id);
        $active->active = "1";
        $active->save();
        return redirect()->back()->with(Toastr::info('Outloan activate!', 'Activate'));
    }

    public function inactive($id)
    {
        $inactive = Outloan::find($id);
        $inactive->active = "0";
        $inactive->save();
        return redirect()->back()->with(Toastr::info('Outloan inactivate!', 'Inactivate'));
    }

    public function outloan_transaction_delete($id){
        if(OutLoanHistory::where('id', $id)->where('type', 'getoutloan')->first()){
            $oldImage = OutLoanHistory::find($id)->attachment;
            $file_path = public_path() . '/storage/uploads/outloan/getoutloan/' . $oldImage;
            if($oldImage && $file_path){
                 unlink($file_path);
            }

        }
        else{
            $oldImage = OutLoanHistory::find($id)->attachment;
            $file_path = public_path() . '/storage/uploads/outloan/returnoutloan/' . $oldImage;
            if($oldImage && $file_path){
                 unlink($file_path);
            }
        }

        $ads = OutLoanHistory::findOrFail($id);
        $ads->delete();
        return back()->with(Toastr::success('Outloan Transaction Deleted success!', 'Success'));
    }
}
