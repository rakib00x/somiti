@extends('layouts.frontend.app')
<style>
    .table.table-v2 thead tr th {
        background-color: rgb(88, 112, 239) !important;
    }
</style>
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <h6 class="heading_title">Share Transaction History</h6>
                        <div class="element-box-tp">
                            <a href="{{ route('new.transaction', $trn_id) }}">
                                <button class="btn btn-dark btn-sm"><i class="fa fa-plus"></i>Add New Transaction</button>
                            </a>

                            
                            <div class="table-responsive mt-3">
                                <table id="dataTable1" class="table table-bordered table-v2 table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Date Time</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Main Balance</th>
                                            <th>Entry Date</th>
                                            <th>Note</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions_lists as $key=>$transactions_list)


                                        
                                            <tr class="text-center">
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $transactions_list->date }}</td>
                                                <td>{{ $transactions_list->transaction_type }}</td>
                                                <td class="text-right">{{ $transactions_list->amount }}</td>
                                                <td class="text-right">{{ $transactions_list->current_balance }}</td>
                                                <td>{{ $transactions_list->created_at }}</td>
                                                <td class="text-left">{{ $transactions_list->details }}</td>
                                                <td>
                                                    <div style="font-size: 18px;">
                                                        <!-- Button trigger modal -->
                                                        {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                                                            <i class="os-icon os-icon-ui-49"></i>
                                                        </button> --}}
                                                        <a href="{{ route('shareTransactionlist.delete',$transactions_list->id ) }}" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                                    </div>
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

  <!-- Modal -->
  {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Share Account Transaction</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ route('transactions_list.update') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="note" class="col-form-label">Date</label>
                        <input class="form-control" name="date" type="date" id="date">
                    </div>

                    <div class="form-group">
                        <label for="details" class="col-form-label">Details</label>
                        <textarea name="details" id="details" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
  </div> --}}


@endsection





