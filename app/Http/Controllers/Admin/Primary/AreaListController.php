<?php

namespace App\Http\Controllers\Admin\Primary;

use App\Http\Controllers\Controller;
use App\Models\Primary\Area;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Primary\BranchList;
use App\Models\Primary\Staffs;
use Brian2694\Toastr\Facades\Toastr;

class AreaListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {

        if($request->search){
            $allArea = Area::where('name', $request->search)
            ->orderBy('branch_id')
            ->orderBy('name')
            ->with('branch')
            ->paginate(10);
        }
       else{
            $allArea = Area::orderBy('branch_id')->orderBy('name')->with('branch')->paginate(10);
       }
        return view('Primary.area-list.index', compact('allArea'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $branches = BranchList::all();
        $staffs = Staffs::where('user_role', '3')->get();
        return view('Primary.area-list.create', compact('branches', 'staffs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'area_code' => 'required',
            'branch_id' => 'required',
            // 'associate_id' => 'required',
        ]);

        $area = new Area();
        $area->name = $request->name;
        $area->area_code = $request->area_code;
        $area->branch_id = $request->branch_id;
        // $area->associate_id = $request->associate_id;
        $area->save();

        return redirect()->route('area-list.index')->with(Toastr::success('Area added successfully!', 'Added'));
    }

    public function edit($id)
    {
        $branches = BranchList::all();
        $staffs = Staffs::where('user_role', '3')->get();
        $areas = Area::find($id);
        return view('Primary.area-list.edit', compact('branches', 'staffs', 'areas'));
    }

    public function update(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required',
            'area_code' => 'required',
            'branch_id' => 'required',
            // 'associate_id' => 'required',
        ]);
        Area::find($request->id)->update([
            'name' => $request->name,
            'area_code' => $request->area_code,
            'branch_id' => $request->branch_id,
            // 'associate_id' => $request->associate_id,
        ]);
        return redirect()->route('area-list.index')->with(Toastr::success('Area Updated successfully!', 'Added'));
    }
    public function delete($id)
    {
        $area = Area::find($id);
        $area->delete();

        return redirect()->route('area-list.index')
            ->with(Toastr::success('Area deleted successfully', 'Added'));
    }

    public function get_area_by_branch(Request $request)
    {
        if ($request->branch_id) {
            $select_id = $request->select_id;
            $areas = Area::where('branch_id', $request->branch_id)->get();
            return view('Primary.area-list.select', compact('areas', 'select_id'));
        }
        return $request;
    }
}
