@extends('layouts.frontend.app', ['pageTitle' => 'Add new District'])
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="element-box" style="display: visible" id="add_form">
                <h3 class="card-header text-center py-4 bg-success rounded text-white text-uppercase">New District</h3>
                <form method="POST" action="{{ route('district.store') }} ">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mx-auto mt-3">
                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="division_id">Division</label>
                                        <select name="division" id="division_id" class="form-control">
                                            <option value="">--Select Division--</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">District</label>
                                        <input class="form-control" placeholder="District name"  autofocus name="name"
                                            type="" id="name">
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
