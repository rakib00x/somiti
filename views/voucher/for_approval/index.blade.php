@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box-tp">
                            {{ $loan_application }}
                            <!--------------------START - Table with actions-------------------->
                            <form method="POST" action="" accept-charset="UTF-8">
                                <input name="_token" type="hidden" value="">
                                <div class="table-responsive">
                                    <table id="dataTable1" class="table table-bordered table-v2 table-striped table-sm">
                                            <tr>
                                                <th>SL</th>
                                                <th>Branch Name</th>
                                                <th>Voucher ID</th>
                                                <th>Date</th>
                                                <th>Category</th>
                                                <th>Amount</th>
                                                <th>Expense By</th>
                                                <th>Note</th>
                                                <th>Attachment</th>
                                                <th>Action</th>
                                                <th><input id="checkAll" type="checkbox"></th>
                                            </tr>
                                            {{-- @foreach ($loan_application as $loan_applications)
                                                <tr>
                                                    <th>{{ $loop->indx+1 }}</th>

                                                </tr>
                                            @endforeach --}}
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="display-type"></div>
@endsection
