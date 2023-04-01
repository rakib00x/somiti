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
                            <h6 class="element-header text-center">Director Information</h6>
                            <!--------------------START - Table with actions-------------------->
                            <div class="table-responsive">
                                <table class="table table-bordered table-v2 table-striped" id="">
                                    <thead>
                                        <tr>
                                            <th>Director Name</th>
                                            <th>Designation</th>
                                            <th>Mobile</th>
                                            <th>Profession</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>{{$director_view->name}}</td>
                                            <td>{{$director_view->designation}}</td>
                                            <td>{{$director_view->mobile}}</td>
                                            <td>{{$director_view->profession}}</td>
                                            <td>{{$director_view->address}}</td>
                                            <td class="text-center">
                                                @if ($director_view->active == true)
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
                            <h6 class="element-header text-center">Director Transaction History</h6>
                            <!--------------------START - Table with actions-------------------->
                            <div class="table-responsive">
                                <table class="table table-bordered table-v2 table-striped" id="transaction">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Deposit Amount</th>
                                            <th>WithDraw Amount</th>
                                            <th>Director Balance</th>
                                            <th>Branch</th>
                                            <th>Details</th>
                                            <th>Attachment</th>
                                            <th>Transaction BY</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($directorTransactionLists as $directorTransactionList)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $directorTransactionList->created_at->format('Y.m.d') }}</td>
                                            <td>
                                                @if ($directorTransactionList->type == 'Deposit')
                                                    {{ $directorTransactionList->amount }} TK
                                                @else
                                                {{ '---' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($directorTransactionList->type == 'Withdraw')
                                                    {{ $directorTransactionList->amount }} TK
                                                @else
                                                {{ '---' }}
                                                @endif
                                            </td>
                                            <td>{{ $directorTransactionList->director_balance }} TK</td>
                                            <td>{{ $directorTransactionList->branch }}</td>
                                            <td>{{ $directorTransactionList->notes }}</td>
                                            <td>
                                                @if ($directorTransactionList->type == 'Deposit')
                                                    <img src="{{ asset('storage/uploads/director/deposit/' . $directorTransactionList->attachment) }}" width="120px" alt="">
                                                @else
                                                <img src="{{ asset('storage/uploads/director/withdraw/' . $directorTransactionList->attachment) }}" width="120px" alt="">
                                                @endif
                                            </td>
                                            <td>{{ auth()->user()->name ?? 'N/A' }}</td>
                                            <td>
                                                <a href="{{ route('directorTransactionList.delete',$directorTransactionList->id ) }}" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
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
    <script>
        $(document).ready(function() {
            $('#transaction').DataTable();
        });
    </script>
@endsection
