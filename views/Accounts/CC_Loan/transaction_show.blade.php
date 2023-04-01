@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <h6 class="element-header text-center">CC Transactions</h6>
                            <div class="element-box">
                                <div class="table-responsive">
                                    <div id="dataTable1_wrapper"
                                        class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="dataTable1"
                                                    class="table table-bordered table-v2 table-striped table-sm dataTable no-footer"
                                                   >
                                                    <thead>
                                                        <tr role="row">
                                                            <th >SL</th>
                                                            <th >Date</th>
                                                            <th>Previous Profit</th>
                                                            <th >Profit Collection </th>
                                                            <th >Penalty</th>
                                                            <th >Profit Balance</th>
                                                            <th >Main balance return </th>
                                                            <th >Main Balance</th>
                                                            <th>Note</th>
                                                            <th >Entry Date</th>
                                                            <th >Received by</th>
                                                            <th >Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($cc_loan->installments as $installment)
                                                            
                                                        <tr>
                                                            <td class="text-center sorting_1">{{ $loop->iteration }}</td>
                                                            <td class="text-center">
                                                                <?php 
                                                                $date = date_create($installment->date);
                                                                echo date_format($date,"M d, Y");
                                                                ?>
                                                            </td>
                                                            <td class="text-right">{{ $installment->previous_profit }}</td>
                                                            <td class="text-right">{{ $installment->amount }}</td>
                                                            <td class="text-right">{{ $installment->penalty?? 0 }}</td>
                                                            <td class="text-right">{{ $installment->profit_balance }}</td>
                                                            <td class="text-right">{{ $installment->main_balance_return?? 0.00 }}</td>
                                                            <td class="text-right">{{ $installment->main_balance }}</td>
                                                            <td class="text-center"></td>
                                                            <td class="text-center">{{ custom_date_format($installment->created_at)}}</td>
                                                            <td class="text-center">{{ $installment->processed_by }}</td>
                                                            <td class="row-actions">
                                                               
                                                                @role('admin|manager')
                                                                <a class="btn btn-sm btn-danger text-white mx-0" href="#"
                                                                    onclick="transactionDelete(this);" data-id="{{ $installment->id }}" >
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                                <form id="delete-form-{{ $installment->id }}"
                                                                    action="{{ route('ccinst.collection.destroy', $installment->id) }}"
                                                                    method="POST" class="d-none">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
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
            </div>
        </div>
    </div>


    <script>
        function transactionDelete(elem) {
            event.preventDefault();
            if (confirm('Are you sure? You want to delete this Installment')) {
                document.getElementById('delete-form-' + elem.dataset.id).submit();
            }
        }
    </script>
@endsection
