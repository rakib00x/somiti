@extends('layouts.frontend.app', ['pageTitle' => 'Edit Village'])
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="element-box" style="display: visible" id="add_form">
                <h3 class="card-header text-center py-4 bg-success rounded text-white text-uppercase">New Village</h3>
                <form method="POST" action="{{ route('village.update',$village->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mx-auto mt-3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="post_office">Post Office</label>
                                        <select name="post_office" id="post_office" class="form-control">
                                            <option value="">--Select Post Office--</option>
                                            @foreach ($postoffices as $postoffice)
                                            <option value="{{ $postoffice->id }}"{{$postoffice->id == $village->id ?'selected':'' }}>{{ $postoffice->title }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">New Village</label>
                                        <input class="form-control" placeholder="Village name"  autofocus name="name" type="text" id="name" value="{{ $village->title }}">
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


