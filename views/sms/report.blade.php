@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="element-header text-center">SMS Transmission Report</h6>
                        <div class="element-box">
                            <form method="get" action="" accept-charset="UTF-8"
                                class="form-inline justify-content-center">
                                <div class="form-element control-rounded text-center">
                                    <label for="dateRange"
                                        style="display: inline-block; width: auto; vertical-align: middle;">Date
                                        Range</label>
                                    <label for="start" class="sr-only toy start">Start Date</label>
                                    <input class="form-control rounded toy text-center" placeholder="Select Filter"
                                        name="start_date" type="date" value="" id="start">
                                    <label for="end" class="sr-only toy">End Date</label>
                                    <input class="form-control rounded toy text-center" placeholder="Select Filter"
                                        name="end_date" type="date" value="" id="end">
                                    <label for="member" class="sr-only toy">Member Account</label>
                                    <input class="form-control rounded toy text-center" placeholder="Member Account"
                                        name="account" type="text" id="member">
                                    <input class="btn btn-primary" type="submit" value="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="table-responsive">
                                <table id="dataTable1" class="table table-striped table-lightfont dataTable" role="grid"
                                    aria-describedby="dataTable1_info" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Date</th>
                                            <th>Mobile</th>
                                            <th>Text</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($histories as $history)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $history->created_at }}</td>
                                                <td>{{ $history->mobile }}</td>
                                                <td>{{ $history->message }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="text-right">
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="display-type"></div>
@endsection
