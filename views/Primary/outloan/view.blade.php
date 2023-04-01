@extends('layouts.frontend.app')
<style>
    .table.table-v2 thead tr th {
        /* background: none; */
        background: rgb(88, 112, 239) !important;
    }
</style>
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <h6 class="element-header text-center">OutLoan Account</h6>
                            <!--------------------START - Table with actions-------------------->
                            <div class="table-responsive">
                                <table class="table table-bordered table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>Mobile</th>
                                            <th>Profession</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>{{ $view_loan->name }}</td>
                                            <td>{{ $view_loan->company }}</td>
                                            <td>{{ $view_loan->mobile }}</td>
                                            <td>{{ $view_loan->profession }}</td>
                                            <td>{{ $view_loan->address }}</td>
                                            <td class="text-center">
                                                @if ($view_loan->active == true)
                                                    <span class="badge badge-success btn">Active</span>
                                                @else
                                                    <span class="badge badge-danger btn">Inactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <h6 class="element-header text-center">OutLoan Account Transaction History</h6>
                            <!--------------------START - Table with actions-------------------->
                            <div class="table-responsive">
                                <table class="table table-bordered table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Branch</th>
                                            <th>Get Out Loan (TK) </th>
                                            <th>Return Out Loan (TK)</th>
                                            <th>Balance (TK)</th>
                                            <th>Interest (TK)</th>
                                            <th>Notes</th>
                                            <th>Attachment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($outloan_transactions as $outloan_transaction)
                                            <tr class="text-center">
                                                <td>{{  $loop->iteration }}</td>
                                                <td>{{ $outloan_transaction->created_at->format('Y.m.d') }}</td>
                                                <td>{{ $outloan_transaction->branch }}</td>
                                                <td>
                                                    @if ($outloan_transaction->type == 'getoutloan')
                                                        {{ $outloan_transaction->amount }}
                                                    @else
                                                        {{ '---' }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($outloan_transaction->type == 'returnoutloan')
                                                        {{ $outloan_transaction->amount }}
                                                    @else
                                                        {{ '---' }}
                                                    @endif
                                                </td>
                                                <td>{{ $outloan_transaction->current_balance }}</td>
                                                <td>{{ $outloan_transaction->interest }}</td>
                                                <td>{{ $outloan_transaction->details }}</td>
                                                <td>
                                                    @if ($outloan_transaction->type == 'getoutloan')
                                                        <img src="{{ asset('storage/uploads/outloan/getoutloan/' . $outloan_transaction->attachment) }}" width="120px" alt="">
                                                    @else
                                                        <img src="{{ asset('storage/uploads/outloan/returnoutloan/' . $outloan_transaction->attachment) }}" width="120px" alt="">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('outloan_transaction.delete', $outloan_transaction->id) }}" class="btn btn-sm btn-danger text-white mx-0"><i class="fa fa-trash"></i></a>
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
@endsection
