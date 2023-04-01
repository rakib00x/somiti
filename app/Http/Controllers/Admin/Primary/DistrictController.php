<?php

namespace App\Http\Controllers\Admin\Primary;

use App\Http\Controllers\Controller;
use App\Models\Accounts\District;
use App\Models\Accounts\Division;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        if($request->search){
            $districts = District::where('title', $request->search)
            ->paginate(10);
        }
        else{
            $districts = District::paginate(10);
        }

        return view('Primary.district.index', compact('districts'));
    }

    public function create()
    {
        $divisions = Division::where('status', 1)->get();
        return view('Primary.district.create', compact('divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'division' => 'required',
            'name' => 'required',
        ]);

        District::insert([
            'division_id' => $request->division,
            'title' => $request->name,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('district.index')->with(Toastr::success('District added successfully!', 'Success'));
    }

    public function edit($id)
    {
        $divisions = Division::where('status', 1)->get();
        $districts = District::find($id);
        return view('Primary.district.edit', compact('districts', 'divisions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'division' => 'required',
            'name' => 'required',
        ]);

        District::find($id)->update([
            'title' => $request->name,
        ]);
        return redirect()->route('district.index')->with(Toastr::success('District Updated successfully!', 'Success'));
    }

    public function destroy($id)
    {
        $districts = District::find($id);
        if (count($districts->subDistrict)) {
            return redirect()->back()->with(Toastr::warning('Subdistrict available!', 'Warning'));
        }
        $districts->delete();
        return redirect()->route('district.index')->with(Toastr::success('District Deleted successfully!', 'Success'));
    }

    public function status($id)
    {
        $division = District::find($id);
        if ($division->status == 0) {
            District::find($id)->update([
                'status' => 1,
            ]);
            return redirect()->route('district.index')->with(Toastr::success('District activate successfully!', 'Success'));
        } else {
            District::find($id)->update([
                'status' => 0,
            ]);
            return redirect()->route('district.index')->with(Toastr::success('District inactivate successfully!', 'Success'));
        }
    }
}
