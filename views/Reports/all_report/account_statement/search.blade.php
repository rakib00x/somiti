@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <form method="POST" action=""
                                accept-charset="UTF-8" class="form-inline justify-content-center"><input name="_token"
                                    type="hidden" value="">
                                <div class="form-element control-rounded text-center">
                                    <label for="account" class="sr-only">Account Number</label>
                                    <input class="form-control rounded" placeholder="Account No" autofocus name="account"
                                        type="number" id="account">
                                    <input class="form-control" id="dateRange" required name="date" type="radio"
                                        value="1">
                                    <label for="dateRange"
                                        style="display: inline-block; width: auto; vertical-align: middle;">Date
                                        Range</label>
                                    <label for="start" class="sr-only toy">Start</label>
                                    <input class="form-control rounded toy text-center" placeholder="Select Filter" required
                                        readonly name="start" type="date" value="2022-11-19" id="start">
                                    <label for="end" class="sr-only toy required">End</label>
                                    <input class="form-control rounded toy text-center" placeholder="Select Filter" required
                                        readonly name="end" type="date" value="2022-11-19" id="end">
                                    <label for="type" class="sr-only">Type</label>
                                    <select class="form-control rounded" id="type" name="type">
                                        <option selected="selected" value="">All Types</option>
                                        <option value="general">General Savings</option>
                                        <option value="fdr">FDR Account</option>
                                        <option value="dps">DPS Savings</option>
                                        <option value="loan">Loan investment</option>
                                        <option value="share">Share Account</option>
                                    </select>
                                    <label for="transaction" class="sr-only">Transaction Type</label>
                                    <select class="form-control rounded" id="transaction" name="transaction">
                                        <option selected="selected" value="">All Transaction Types</option>
                                        <option value="deposit">Deposit</option>
                                        <option value="withdraw">Withdraw</option>
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
