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
                                    <label for="area" class="sr-only">Select Area</label>
                                    <select class="form-control rounded" multiple name="area[]">
                                        <option selected="selected" value="">All Areas</option>
                                        <option value="1">Uttara Sector 5</option>
                                        <option value="2">Dhanmondi Area</option>
                                        <option value="3">Mohakhali Area</option>
                                        <option value="7">SHAPLA</option>
                                        <option value="8">KOMOLA</option>
                                    </select>

                                    <label for="start" class="sr-only toy">Start</label>
                                    <input class="form-control rounded toy text-center" placeholder="Select Filter" required
                                        name="start" type="date" value="2022-11-19" id="start">

                                    <label for="Trangection" class="sr-only toy"></label>
                                    <select name="ac_type" class="form-control rounded">
                                        <option value="all">All Ac Type</option>
                                        <option value="saving">Saving</option>
                                        <option value="dps">DPS</option>
                                        <option value="installment">Investment</option>
                                        <option value="share">Share</option>
                                        <option value="fdr">Fixed Deposit</option>
                                        <option value="cc_loan">CC Loan</option>
                                    </select>
                                    <label for="Trangection" class="sr-only toy"></label>
                                    <select name="transection" class="form-control rounded">
                                        <option value="">Select Transections</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                        <option value="all">All</option>
                                    </select>
                                    <label for="Trangection" class="sr-only toy"></label>
                                    <select name="status" class="form-control rounded">
                                        <option value="">All</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">In Active</option>
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
