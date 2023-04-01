@extends('layouts.frontend.app', ['pageTitle' => 'Add new Village'])
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="element-box" style="display: visible" id="add_form">
                <h3 class="card-header text-center py-4 bg-success rounded text-white text-uppercase">New Village</h3>
                <form method="POST" action="{{ route('village.store') }} ">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mx-auto mt-3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="sub_district">Post Office</label>
                                        <select name="post_office" id="sub_district" class="form-control">
                                            <option value="">--Select Post Office--</option>
                                            @foreach ($postOffices as $postOffice)
                                            <option value="{{ $postOffice->id }}">{{ $postOffice->title }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">New Village</label>
                                        <input class="form-control" placeholder="Village name"  autofocus name="name" type="text" id="name">
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


