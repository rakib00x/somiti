@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="element-header text-center" style="padding-bottom: 20px"> Withdraw Request
                        </h6>
                        <div class="element-box">
                            <a href="{{ route('loan.withdraw.index') }}">
                                <button class="btn btn-info btn-sm rounded"><i style="font-size:11px; margin-right:4px;" class="fas fa-arrow-left"></i>{{ __('Back') }}</button>
                            </a>
                            <form method="POST" action="{{ route('withdraw.search.post') }}" class="form-inline justify-content-center">
                                @csrf
                                <div class="form-element control-rounded text-center">
                                    <input class="form-control rounded text-center" placeholder="Input AC Number" name="account_id" type="text" id="account_id">
                                    <select name="type" class="form-control rounded text-center" required="">
                                        <option value="general">General</option>
                                        <option value="current">Current</option>
                                        <option value="dps">DPS</option>
                                        <option value="fdr">Fixed Deposit</option>
                                        <option value="share">Share</option>
                                    </select>
                                    <input class="btn btn-primary" type="submit" value="Search">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="display-type"></div>
@endsection
