@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <h6 class="element-header text-center">{{__('Report Search For Voucher')}}</h6>
                    <div class="element-box">
                        <form method="POST" action="{{ route('report.voucher.index') }}" accept-charset="UTF-8" class="form-inline justify-content-center">
                            @csrf
                            <div class="form-element text-center">
                                <div class="form-group row">
                                    <div class="col-md-5">
                                        <label for="start_date" class="">{{__('Start Date')}}</label>
                                        <input class="form-control text-center" required autofocus name="start_date" type="date" id="start_date">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="start_date" class="">{{__('End Date')}}</label>
                                        <input class="form-control text-center" required autofocus name="end_date" type="date" id="end_date">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="start_date" class="">&nbsp;</label>
                                        <input class="btn btn-success" type="submit" value="Search">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
