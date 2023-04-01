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
                                <div class="col-sm-9 border">
                                    <table class="table table-sm table-striped ">
                                        <tbody>
                                            <tr>
                                                <td>{{__('Account')}}</td>
                                                <td>:</td>
                                                <td>{{ $member->account }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Area')}}</td>
                                                <td>:</td>
                                                <td colspan="4">{{ $member->area->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Name')}}</td>
                                                <td>:</td>
                                                <td colspan="4">{{ $member->m_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Address')}}</td>
                                                <td>:</td>
                                                <td colspan="4">{{ $member->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Phone')}}</td>
                                                <td>:</td>
                                                <td>{{ $member->m_mobile }}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center" style="background: #D5D543 ">
                                    <img id="photoF" src="{{ asset($member->photo) }}" style="max-height:180px; max-width:300px;" class="text-center">
                                    <img id="signatureF" src="" style="max-height:180px; max-width:300px; display: none;" class="text-center">
                                </div>
                                <script>
                                    $("#photoF").dblclick(function() {
                                        $("#photoF").hide().delay(5000).fadeIn();
                                        $("#signatureF").show().delay(4500).fadeOut();
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-box">
                    <button onclick="printContent('printArea')" type="button" class="btn btn-danger mx-auto">
                        <i class="fa fa-print"></i>
                        <span>Print</span>
                    </button>
                    <div class="row" style="font-size: 13px;">
                        <div class="col-sm-12">
                            <div class="element-wrapper">
                                <div class="element-box-tp" id="printArea">


                                    <div class="table-responsive" id="printContent">
                                        <table id="" class="table table-bordered table-v2 table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{__('Start Date')}}</th>
                                                    <th>{{__('End Date')}}</th>
                                                    <th>{{__('Member')}}</th>
                                                    <th>{{__('Account')}}</th>
                                                    <th>{{__('Scheme')}}</th>
                                                    <th>{{__('Type')}}</th>
                                                    <th>{{__('Amount')}}</th>
                                                    <th>{{__('Profit Get')}}</th>
                                                    <th>{{__('Profit Paid')}}</th>
                                                    <th>{{__('Receivable Profit')}}</th>
                                                    <th>{{__('Action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($member->fdr as $fdr)
                                                    <tr>
                                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                                        <td class="align-middle">{{ $fdr->starting_date }}</td>
                                                        <td class="align-middle">{{ $fdr->ending_date }}</td>
                                                        <td class="align-middle">{{ $fdr->member->m_name }}</td>
                                                        <td class="align-middle">{{ $fdr->account }}</td>
                                                        <td class="align-middle">{{ $fdr->scheme->name }}</td>
                                                        <td class="align-middle">{{ $fdr->member->area_id }}</td>
                                                        <td class="align-middle">{{ $fdr->amount }}</td>
                                                        <td class="align-middle">{{ $fdr->profit()->sum('profit') }}</td>
                                                        <td class="align-middle">{{ $fdr->total_withdraw }}</td>
                                                        <td class="align-middle">{{ $fdr->receiveable }}</td>
                                                        <td class="align-middle">
                                                            <a href="{{ route('fdr-withdraw.show', $fdr->id) }}" class="btn btn-sm btn-success p-1">Withdraw</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#profit").val($("#amount").val() * $("#percent").val() / 100);
        });
        $("#amount, #percent").bind("keyup change", function() {
            $("#profit").val($("#amount").val() * $("#percent").val() / 100);
        });
        $("#profit").bind("keyup change", function() {
            $("#percent").val($("#profit").val() / $("#amount").val() * 100);
        });
    </script>
@endsection
