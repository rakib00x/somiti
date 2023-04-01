@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <h6 class="element-header text-center">{{__('Report Search For FDR')}}</h6>
                    <div class="element-box">
                        <form method="POST" action="{{ route('report.fdr.search.post') }}" accept-charset="UTF-8" class="form-inline justify-content-center">
                            @csrf
                            <div class="form-element control-rounded text-center">
                                <label for="value" class="sr-only">{{__('Account Number')}}</label>
                                <input class="form-control rounded text-center" placeholder="Input AC Number" required autofocus name="account" type="number" id="value">
                                <input class="btn btn-success" type="submit" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
