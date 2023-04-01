@extends('layouts.frontend.app')

@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-box" style="margin-top: 20px">
                        <form method="GET" action="" accept-charset="UTF-8"
                            class="form-inline justify-content-center">
                            <div class="form-element control-rounded text-center">
                                <label for="area" class="sr-only required">Select Area</label>
                                <select class="form-control" required name="area[]">
                                    <option value="1">Khulna 1</option>
                                    <option value="2">Khulna 2</option>
                                    <option value="3">Khulna 3</option>
                                    <option value="7">Khulna 4</option>
                                    <option value="8">Khulna 5</option>
                                </select>
                                <label for="ac_type" class="sr-only">Type</label>
                                <select class="form-control text-center" name="ac_type[]">
                                    <option value="share">SHARE</option>
                                    <option value="general">GENERAL</option>
                                    <option value="dps">Monthly Savings </option>
                                    <option value="loan">LOAN</option>
                                    <option value="fdr">Fixed Deposit</option>
                                    <option value="cc">CC LOAN</option>
                                </select>
                                <label for="status" class="sr-only">Status</label>
                                <select class="form-control text-center" id="status" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="all">All</option>
                                </select>
                                <input class="btn btn-primary" type="submit" value="Send now">
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
