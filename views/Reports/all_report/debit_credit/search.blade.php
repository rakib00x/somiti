@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-box">
                        <form method="POST" action="{{ route('report.debit-credit.index') }}"
                            accept-charset="UTF-8" target="blank" class="form-inline justify-content-center">
                            @csrf
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
                              
                                <label for="start_date" class="sr-only toy start required">Start</label>
                                <input class="form-control rounded toy text-center" placeholder="Select Filter" required
                                    name="start_date" type="date" id="start_date">
                                <label for="end_date" class="sr-only toy">End</label>
                                <input class="form-control rounded toy text-center" placeholder="Select Filter" required
                                    name="end_date" type="date" id="end_date">
                                <label for="account" class="sr-only toy">Member</label>
                                <input class="form-control rounded toy text-center" placeholder="Account No"
                                    name="account" type="number" id="account">
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
