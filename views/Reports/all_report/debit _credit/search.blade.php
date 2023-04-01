@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-box">
                        <form method="POST" action=""
                            accept-charset="UTF-8" target="blank" class="form-inline justify-content-center"><input
                                name="_token" type="hidden" value="">
                            <div class="form-element control-rounded text-center">
                                <label for="user" class="sr-only">Branch</label>
                                <select class="form-control rounded" name="branch_id">
                                    <option value="">All branch</option>
                                    <option value="1">Main Branch</option>
                                </select>
                                <label for="type" class="sr-only">Transaction&nbsp;Type</label>
                                <select class="form-control rounded toy" name="type">
                                    <option value="cash_out">Debit (Cash-Out)</option>
                                    <option value="cash_in">Credit (Cash-In)</option>
                                </select>
                                <input class="form-control" id="dateRange" required checked="checked" name="date"
                                    type="radio" value="1">
                                <label for="dateRange"
                                    style="display: inline-block; width: auto; vertical-align: middle;">Date
                                    Range</label>
                                <label for="start" class="sr-only toy start required">Start</label>
                                <input class="form-control rounded toy text-center" placeholder="Select Filter" required
                                    name="start" type="date" value="2022-11-19" id="start">
                                <label for="end" class="sr-only toy">End</label>
                                <input class="form-control rounded toy text-center" placeholder="Select Filter" required
                                    name="end" type="date" value="2022-11-19" id="end">
                                <label for="member" class="sr-only toy">Member</label>
                                <input class="form-control rounded toy text-center" placeholder="Account No"
                                    name="member" type="number" id="member">
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
