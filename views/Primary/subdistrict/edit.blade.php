@extends('layouts.frontend.app', ['pageTitle' => 'Add new SubDistrict'])
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="element-box" style="display: visible" id="add_form">
                <h3 class="card-header text-center py-4 bg-success rounded text-white text-uppercase">New SubDistrict</h3>
                <form method="POST" action="{{ route('subdistrict.update',$subdistricts->id) }} ">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mx-auto mt-3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="district">District</label>
                                        <select name="district" id="district" class="form-control">
                                            <option value="">--Select Division--</option>
                                            @foreach ($districts as $district)
                                            <option value="{{ $district->id }}" {{ $district->id == $subdistricts->district_id ? 'selected' : '' }}>{{ $district->title }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">SubDistrict</label>
                                        <input class="form-control" placeholder="Sub District name"  autofocus name="Subdistrict"
                                            type="text" id="name" value="{{ $subdistricts->title }}">
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


