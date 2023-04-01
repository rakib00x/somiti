@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <h6 class="element-header">Cash ClosingList
                                <a href="{{ route('voucher.cash_closing.index') }}"><i class="fa fa-plus-circle"></i></a>
                            </h6>
                            <div class="element-box-tp">
                                <!--------------------START - Table with actions-------------------->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-v2 table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Branch Name</th>
                                                <th>Date</th>
                                                <th>Prev Day</th>
                                                <th>Today</th>
                                                <th>Money Receiver</th>
                                                <th>Process by</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>1</td>
                                                <td></td>
                                                <td>24-12-2021</td>
                                                <td class="text-right">4,311</td>
                                                <td class="text-right">17,900</td>
                                                <td>yy</td>
                                                <td>Mahfuz Akand</td>
                                                <td>
                                                </td>
                                                <td>
                                                    <a href="" title="Print"
                                                        target="_blank"><i class="fa fa-print"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="display-type"></div>
@endsection
