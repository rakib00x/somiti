@extends('layouts.frontend.app', ['pageTitle' => 'Edit branch'])
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="element-box" style="display: visible" id="add_form">
                <h3 class="card-header text-center py-4 bg-success rounded text-white text-uppercase">{{__('Edit Branch')}}</h3>
                <form method="POST" action="{{ route('branch-list.update') }} " accept-charset="UTF-8"
                    note="Do you want to create new branch with following information?">
                    @csrf
                    {{-- <input name="_token" type="hidden" value="4vpKH4KaXgiGypL51ErLVCwC0sYAIkyC4PllG1qZ"> --}}
                    <div class="row">
                        <div class="col-md-6 mx-auto mt-3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Branch name')}}</label>
                                        <input class="form-control" placeholder="Branch name" required
                                            type="" id="name" name="name" value="{{ $branchs->name }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="address">{{__('Address')}}</label>
                                        <input class="form-control" placeholder="Address" required name="address"
                                            type="text" id="address" value="{{ $branchs->address }}">
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{ $branchs->id }}">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="hotline">{{__('Hotline Number')}}</label>
                                        <input class="form-control" placeholder="Hotline" name="hotline" type="tel"
                                            id="hotline" pattern="01[3-9]\d{8}" value="{{ $branchs->hotline }}">
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
