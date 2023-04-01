@extends('layouts.frontend.app', ['pageTitle' => 'Bank Withdraw List'])
<style media="print" id="styleForPrinting">
    #printContent {
        padding-top: 2in !important;
        padding-bottom: 2in !important;
        font-size: 20pt !important;
    }

    @media print {
        .dataTables_info {
            display: none;
        }

        #example1_paginate,
        #example1_length,
        #example1_filter {
            display: none;
        }

        #actionth,
        .row-actions,
        .pagination {
            display: none;
        }
    }

</style>
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">


                            <div class="element-box-tp" id="printArea">
                                <!--------------------START - Table with actions-------------------->

                                <div class="row">
                                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('images/logo.png') }}" height="110" width="100">
                                    </div>
                                    <div class="col-md-6 text-center">
                                        {{-- <p>বিসমিল্লাহির রহমানির রহিম</p> --}}
                                        <h1 class="bangla_font2">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h1>
                                        <p class="">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                                        <h1 class="mb-0 bangla_font2">উত্তোলন লিস্ট</h1>
                                        <hr class="border border-dark w-75 mt-0">
                                    </div>
                                    <div class="col-md-3 d-flex align-items-end">
                                        <table class="table table-sm table-borderless mt-5 mb-0 small">
                                            <tr class="text-right details">
                                                <td class="align-middle">মাসের নামঃ -</td>
                                                <td class="input-group-sm px-0 text-center" style="width: 60% !important;">
                                                    <input type="text"
                                                        class="form-control shadow-none rounded-0 mx-0 float-right">
                                                </td>
                                            </tr>
                                            <tr class="text-right details">
                                                <td class="align-middle">তারিখঃ -</td>
                                                <td class="input-group-sm px-0 text-center" style="width: 60% !important;">
                                                    <input type="text"
                                                        class="form-control shadow-none rounded-0 mx-0 float-right">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>


                                <div class="text-center d-print-none" >
                                    <a href="{{ route('bank.withdraw') }}" class="btn btn-success">{{__('Add New Withdraw')}}</a>

                                </div>

                                <div class="table-responsive" id="printContent">
                                    <table class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Account Number</th>
                                                <th>Bank Branch Name</th>
                                                <th>Withdraw Amount</th>
                                                <th>Withdrawal Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($allArea as $area)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $area->branch->name }}</td>
                                                    <td>{{ $area->name }}</td>
                                                    <td>{{ $area->associate ? $area->associate->name : '' }}</td>
                                                    <td>{{ $area->members()->count() }}</td>

                                                    <td class="row-actions">
                                                        <div class="row text-center" style="display: block">
                                                            <a href="{{ route('area-list.edit',$area->id) }}" title="Area"><i class="os-icon os-icon-grid-10"></i></a>
                                                            @role('admin|manager')
                                                                <a href="javascript:;" data-route="{{ route('area-list.delete', $area->id) }}" data-action='delete'>
                                                                    <i class="os-icon os-icon-ui-15" title="Delete"></i>
                                                                </a>
                                                                @elserole("field-officer")
                                                            @endrole
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach --}}

                                        </tbody>
                                    </table>
                                </div>

                                {{-- <div class="mt-3">
                                    {{ $allArea->links() }}
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
