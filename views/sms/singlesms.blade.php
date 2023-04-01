@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="element-header text-center">Send a Single SMS</h6>

                        <form method="POST" action="{{ route('sms.singlesms.send') }}" accept-charset="UTF-8" id="formValidate"
                            note="Are you sure?">
                            @csrf
                            <div class="row d-flex justify-content-center">
                                <div class="col-sm-6">
                                    <div class="element-box">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="mobile">Send to (Mobile Number)</label>
                                                    <input type="text" name="mobile" id="mobile" class="form-control"
                                                        placeholder="Mobile number  Ex: 01*********;"
                                                        autofocus="" pattern="01[3-9]\d{8}">
                                                    @error('mobile')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="message">Message body</label>
                                                    <textarea class="form-control" placeholder="" required name="message" cols="50" rows="10" id="message"></textarea>
                                                    @error('message')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <br>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12    text-center">
                                                <button class="btn btn-primary btn-block">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="display-type"></div>
@endsection
