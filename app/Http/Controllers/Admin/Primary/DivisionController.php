<?php

namespace App\Http\Controllers\Admin\Primary;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Division;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::all();
        return view('Primary.division-list.index', compact('divisions'));
    }

    public function create()
    {
        return view('Primary.division-list.create');
    }

    public function store(Request $request)
    {
        Division::insert([
            'title' => $request->name,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('division-list.index')->with(Toastr::success('Division added successfully!', 'Success'));
    }

    public function edit($id)
    {
        $divisions = Division::find($id);
        return view('Primary.division-list.edit', compact('divisions'));
    }

    public function update(Request $request, $id)
    {
        Division::find($id)->update([
            'title' => $request->name,
        ]);
        return redirect()->route('division-list.index')->with(Toastr::success('Division Updated successfully!', 'Success'));
    }

    public function destroy($id)
    {
        $division = Division::find($id);
        if (count($division->district)) {
            return redirect()->back()->with(Toastr::warning('District available!', 'Warning'));
        }
        $division->delete();
        return redirect()->route('division-list.index')->with(Toastr::success('Division Deleted successfully!', 'Success'));
    }

    public function status($id)
    {
        $division = Division::find($id);
        if ($division->status == 0) {
            Division::find($id)->update([
                'status' => 1,
            ]);
            return redirect()->route('division-list.index')->with(Toastr::success('Division activate successfully!', 'Success'));
        } else {
            Division::find($id)->update([
                'status' => 0,
            ]);
            return redirect()->route('division-list.index')->with(Toastr::success('Division inactivate successfully!', 'Success'));
        }
    }
}
