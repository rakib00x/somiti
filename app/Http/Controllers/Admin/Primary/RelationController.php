<?php

namespace App\Http\Controllers\Admin\Primary;

use App\Http\Controllers\Controller;
use App\Models\Relation;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function index(){
        $relations =Relation::all();
        return view('Primary.relation-list.index', compact('relations'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:relations,title',
        ], [
            'title.unique' => 'The relation has already been taken.',
            'title.required' => 'The relation is required.'
        ]);

        $relation = new Relation();
        $relation->title = $request->title;
        $relation->save();
        return response()->json([
            'status' => 'success',
        ]);
    }
    public function edit($id){
        $relation = Relation::find($id);
        return view('Primary.relation-list.edit', compact('relation'));
    }

    public function update(Request $request, $id){
       $request->validate([
        'name' => 'required',
    ], [
        'name.required' => 'The relation is required.'
    ]);
    Relation::findOrFail($id)->update([
        'title'=>$request->name,
    ]);
    return redirect()->route('relation.index')->with(Toastr::success('Relation Updated successfully!','Success'));

    }
    public function  destroy($id){
        $relation_id =Relation::findOrFail($id);
        $relation_id->delete();
        return redirect()->route('relation.index')->with(Toastr::success('Relation Deleted successfully!','Success'));
    }
}
