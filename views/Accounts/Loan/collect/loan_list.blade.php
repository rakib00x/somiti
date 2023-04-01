@extends('layouts.frontend.app')
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
<script>
    function printContent(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var printStyle = document.getElementById("styleForPrinting").outerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printStyle + printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="row border">
                                <div class="col-sm-9 border" style="background: #DDC1F5">
                                    <table class="table table-sm table-striped ">
                                        <tbody>
                                            <tr>
                                                <td>{{__('Account')}}</td>
                                                <td>{{ $member->account }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{__('Area')}}</td>
                                                <td colspan="4">{{ $member->area->name }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{__('Name')}}</td>

                                                <td colspan="4">{{ $member->m_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Address')}}</td>
                                                <td colspan="4">{{ $member->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Phone')}}</td>
                                                <td>{{ $member->m_mobile }}</td>
                                            </tr>

                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center">
                                    <img id="photoF" src="{{ asset($member->photo) }}" style="max-height:180px; max-width:300px;" class="text-center">
                                    <img id="signatureF" src="{{ asset('storage/members/' . $member->signature) }}" style="max-height:180px; max-width:300px; display: none;" class="text-center">
                                </div>
                                <script>
                                    $("#photoF").dblclick(function() {
                                        $("#photoF").hide().delay(5000).fadeIn();
                                        $("#signatureF").show().delay(4500).fadeOut();
                                    });
                                </script>
                                <button onclick="printContent('printArea')" type="button" class="btn btn-danger mx-auto">
                                    <i class="fa fa-print"></i>
                                    <span>Print</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="printArea">
                    <div class="table-responsive" id="printContent">
                        <table id="" class="table table-bordered table-v2 table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <!-- <th>Code</th> -->
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Acc')}}</th>
                                    <th>{{__('Area')}}</th>
                                    <th>{{__('Scheme')}}</th>
                                    <th>{{__('Duration')}}</th>
                                    <th>{{__('Inst.')}}</th>
                                    <th>{{__('Inst. Amt.')}}</th>
                                    <th>{{__('Ledg.')}}</th>
                                    <th>{{__('Product')}}</th>
                                    <th>{{__('')}}</th>
                                    <th>{{__('Total')}}</th>
                                    <th>{{__('Paid')}}</th>
                                    <th>{{__('Due')}}</th>
                                    <th>{{__('Status')}}</th>
                                    {{-- <th>Type</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($member->loans as $loan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <!-- <td>616bf640902c3</td> -->
                                        <td>{{ $loan->member->m_name }}</td>
                                        <td>{{ $loan->account_id }}</td>
                                        <td>{{ $loan->member->area->name }}</td>
                                        <td>{{ Str::ucfirst($loan->scheme) }}</td>
                                        <td>{{ date('d M Y', strtotime($loan->date)) }} - {{ date('d M Y', strtotime($loan->expire_date)) }}</td>
                                        <td>{{ $loan->installment_count }}/{{ $loan->installment }}</td>
                                        <td>{{ $loan->installment_amount }}</td>
                                        <td>{{ $loan->ledger_no }}</td>
                                        <td>{{ $loan->product ? $loan->product : '-' }}</td>
                                        <td>{{ $loan->loan_amount }}</td>
                                        <td>{{ $loan->total_amount }}</td>
                                        <td>{{ $loan->total_paid }}</td>
                                        <td>{{ $loan->due_amount }}</td>
                                        <!-- <td>Running</td> -->
                                        <td>
                                            @if ($loan->status == '1')
                                                <span class="text-info font-weight-bold small">{{__('Open')}}</span>
                                            @elseif ($loan->status = '2')
                                                <span class="text-success font-weight-bold small">{{__('Running')}}</span>
                                            @elseif ($loan->status = '3')
                                                <span class="text-success font-weight-bold small">{{__('Complete')}}</span>
                                            @else
                                                {{-- if: $savings->status == 0 --}}
                                                <span class="text-danger font-weight-bold small">{{__('Closed')}}</span>
                                            @endif
                                        </td>
                                        {{-- <td></td> --}}
                                        <td class="row-actions">
                                            <a href="{{ route('loan.collect.create', $loan->id) }}" title="Collection" style="color: green"><i class="fa fa-plus-circle"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="17"> {{__('No loan issued yet')}} </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            {{-- <tfoot>
                            <tr style="font-weight: bold">
                                <td colspan="10" class="text-right"> Total:</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td colspan="3"></td>
                            </tr>
                        </tfoot> --}}
                        </table>
                    </div>
                </div>


            </div>
        </div>
    @endsection
