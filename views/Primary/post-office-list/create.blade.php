@extends('layouts.frontend.app', ['pageTitle' => 'Add new Post Office'])
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="element-box" style="display: visible" id="add_form">
                <h3 class="card-header text-center py-4 bg-success rounded text-white text-uppercase">New Post Office</h3>
                <form method="POST" action="{{ route('postoffice.store') }} ">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mx-auto mt-3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="district">Sub District</label>
                                        <select name="sub_district" id="sub_district" class="form-control">
                                            <option value="">--Select Sub District--</option>
                                            @foreach ($subdistricts as $subdistrict)
                                            <option value="{{ $subdistrict->id }}">{{ $subdistrict->title }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input class="form-control" placeholder="Post Office name"  autofocus name="name" type="text" id="name">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>




                    <legend style="margin-bottom: 10px;"><span></span></legend>

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <input class="btn btn-primary" type="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection


