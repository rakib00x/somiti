@extends('layouts.frontend.app', ['pageTitle' => 'Bank Transaction List'])
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
                            <h6 class="element-header text-center">Bank Information</h6>
                            <!--------------------START - Table with actions-------------------->
                            <div class="table-responsive">
                                <table class="table table-bordered table-v2 table-striped" id="">
                                    <thead>
                                        <tr>
                                            <th>Bank Name</th>
                                            <th>Branch Name</th>
                                            <th>Account</th>
                                            <th>Bank / Fund Balance</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>{{$banks->name}}</td>
                                            <td>{{$banks->branch}}</td>
                                            <td>{{$banks->account}}</td>
                                            <td>{{$banks->balance}}</td>
                                            <td class="text-center">
                                                @if ($banks->active == 1)
                                                    <p class="lead my-0 badge badge-success">Active</p>
                                                @else
                                                    <p class="lead my-0 badge badge-danger">Inactive</p>
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

                            <h3 class="text-center">Bank Transaction History</h3>
                            <!--------------------START - Table with actions-------------------->
                            <div class="table-responsive">
                                <table id="dataTable1" class="table table-bordered table-v2 table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Deposit Amount</th>
                                            <th>WithDraw Amount</th>
                                            <th>Bank Balance</th>
                                            <th>Branch</th>
                                            <th>Details</th>
                                            <th>Attachment</th>
                                            <th>Transaction BY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaction_lists as $transaction_list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $transaction_list->created_at->format('Y.m.d') }}</td>
                                            <td>
                                                @if ($transaction_list->type == 'Deposit')
                                                    {{ $transaction_list->amount }} TK
                                                @else
                                                {{ '---' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($transaction_list->type == 'Withdraw')
                                                    {{ $transaction_list->amount }} TK
                                                @else
                                                {{ '---' }}
                                                @endif
                                            </td>
                                            <td>{{ $transaction_list->bank_balance }} TK</td>
                                            <td>{{ $transaction_list->branch }}</td>
                                            <td>{{ $transaction_list->notes }}</td>
                                            <td>
                                                @if ($transaction_list->type == 'Deposit')
                                                    <img src="{{ asset('storage/uploads/Bank/deposit/' . $transaction_list->attachment) }}" width="120px" alt="">
                                                @else
                                                <img src="{{ asset('storage/uploads/Bank/withdraw/' . $transaction_list->attachment) }}" width="120px" alt="">
                                                @endif
                                            </td>
                                            <td>{{ auth()->user()->name ?? 'N/A' }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    {{-- <tfoot>
                                        <tr style="font-weight: bold !important;" class="text-right">
                                            <td colspan="3" class="text-right">Total:</td>
                                            <td colspan="">1,015,560</td>
                                            <td colspan="">955,560</td>
                                            <td colspan="5"></td>
                                        </tr>
                                    </tfoot> --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
