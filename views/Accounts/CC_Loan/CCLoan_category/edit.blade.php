@extends('layouts.frontend.app', ['pageTitle' => 'Edit Relation'])
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="element-box" style="display: visible" id="add_form">
                <h3 class="card-header text-center py-4 bg-success rounded text-white text-uppercase">Edit ccloancategory</h3>
                <form method="POST" action="{{ route('ccloancategory.update',$ccloancategory->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mx-auto mt-3">
                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="division_id">Name</label>
                                        <input class="form-control" placeholder="ccloancategory name"  name="name"
                                            type="text" id="name" value="{{ $ccloancategory->title }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <legend style="margin-bottom: 10px;"><span></span></legend>

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <input class="btn btn-primary" type="submit" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
