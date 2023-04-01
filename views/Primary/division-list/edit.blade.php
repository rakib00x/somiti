@extends('layouts.frontend.app', ['pageTitle' => 'Edit Division'])
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="element-box" style="display: visible" id="add_form">
                <h3 class="card-header text-center py-4 bg-success rounded text-white text-uppercase">Edit Division</h3>
                <form method="POST" action="{{ route('division-list.update',$divisions->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mx-auto mt-3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input class="form-control" placeholder="Division name" required autofocus name="name"
                                            type="text" id="name" value="{{ $divisions->title }}">
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
