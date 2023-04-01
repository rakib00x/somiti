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
                        <div class="element-wrapper">
                            <center>
                                <a href="{{ route('loan-application.create') }}" class="btn btn-sm btn-success">{{__('Add Loan Application')}}</a>
                                <button onclick="printContent('printArea')" type="button" class="btn btn-danger mx-auto">
                                    <i class="fa fa-print"></i>
                                    <span>{{__('Print')}}</span>
                                </button>
                            </center>
                            <h6 class="element-header">{{__('Loan Application List')}}</h6>
                            <div class="element-box-tp" id="printArea">
                                <!--------------------START - Table with actions-------------------->
                                <div class="table-responsive" id="printContent">
                                    <table class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('Member namesss')}}</th>
                                                <th>{{__('Loan Amount')}}</th>
                                                <th>{{__('Acount type')}}</th>
                                                <th>{{__('Members age:')}}</th>
                                                <th>{{__('Current address')}}</th>
                                                <th>{{__('Status')}}</th>
                                                <th>{{__('Action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-sm">
                                            @foreach ($loan_application as $application)
                                                <tr class="text-center">
                                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $application->member_name }}</td>
                                                    <td class="align-middle">{{ $application->expect_loan_amount }}</td>
                                                    <td class="align-middle">
                                                        {{ $application->acount_type }}
                                                    </td>
                                                    <td class="align-middle">{{ $application->member_age }}</td>
                                                    <td class="align-middle">{{ $application->current_address }}</td>
                                                    <td class="align-middle">
                                                        @if ($application->status == true)
                                                            <p class="btn btn-success btn-sm disabled">{{__('Active')}}</p>
                                                        @else
                                                            <p class="btn btn-danger btn-sm disabled">{{__('Pending')}}</p>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">
                                                        <a class="btn btn-sm btn-info text-white text-decoration-none mx-0" href="{{ route('loan-application.show', $application->id) }}" onclick="return confirm('Are you sure? you want to edit {{ $application->member_name }}?')">
                                                            <i class="fas fa-expand"></i>
                                                        </a>
                                                        @role('admin|manager')
                                                            <a class="btn btn-sm btn-danger text-white text-decoration-none mx-0" href="#" onclick="applicationDelete(this);" data-id="{{ $application->id }}" data-name="{{ $application->member_name }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            <form id="delete-form-{{ $application->id }}" action="{{ route('loan-application.destroy', $application->id) }}" method="POST" class="d-none">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            @elserole("field-officer")
                                                        @endrole
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
    <script>
        function applicationDelete(elem) {
            event.preventDefault();
            if (confirm('Are you sure? You want to delete ( ' + elem.dataset.name + ' )?')) {
                document.getElementById('delete-form-' + elem.dataset.id).submit();
            }
        }
    </script>
@endsection
