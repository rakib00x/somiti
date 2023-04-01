@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <h6 class="element-header">CC Loans to This Member </h6>
                            <div class="row">
                            </div>
                            <br>
                            <div>
                                <div class="table-responsive">
                                    <table id="dataTable"
                                        class="table table-bordered table-v2 table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Account</th>
                                                <th>Member</th>
                                                <th>Start &amp; End Date</th>
                                                <th>Type</th>
                                                <th>Profit rate</th>
                                                <th>Opening Balance</th>
                                                <th>Balance</th>
                                                <th>Generated Profit</th>
                                                <th>Profit Paid</th>
                                                <th>Receivable Profit</th>
                                                <th>Category</th>
                                                <th>Area Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">

                                            @foreach ($cc_loans as $loan)
                                                <tr>
                                                    <td class="row-actions">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>{{ $loan->account_id }}</td>
                                                    <td class="text-left">{{ $loan->member->m_name }}</td>
                                                    <td style="font-size: smaller">
                                                        <?php 
                                                        $start_date = date_create($loan->start_date);
                                                        $expire_date = date_create($loan->expire_date);
                                                        echo date_format($start_date,"d M Y") . '-'. date_format($expire_date,"d M Y");
                                                    ?>
                                                    </td>
                                                    <td>
                                                        {{ $loan->type == '1'? 'Fixed' : "$loan->installment_sequence Days" }} 
                                                    </td>
                                                    <td class="text-right">{{ $loan->profit_rate }} %</td>
                                                    <td class="text-right">
                                                        {{ $loan->opening_balance }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $loan->loan_amount }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $loan->profit_amount }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $loan->cc_loan_paid_profit }}
                                                    </td>
                                                       
                                                    <td class="text-right">
                                                        {{ $loan->due_cc_loan_profit_amount}}
                                                    </td>
                                                    <td>{{ $loan->category->title }}</td>
                                                    <td>{{ $loan->member->area->name }}</td>

                                                    <td class="row-actions">

                                                        @role('admin|manager')
                                                            <a
                                                                href="{{ route('ccinst.collection.create', ['account' => $loan->member->account, 'loan' => $loan->id]) }}">
                                                                <i class="fas fa-hand-lizard"></i>
                                                            </a>
                                                        @endrole

                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                        <tfoot>
                                            <tr class="text-right">
                                                <td colspan="5">Total:</td>
                                                <td><small>Avg </small>{{  sprintf("%.2f", $cc_loans->avg('profit_rate')) }} %</td>
                                                <td>{{ sprintf("%.2f", $cc_loans->sum('opening_balance'))  }}</td>
                                                <td>{{  sprintf("%.2f", $cc_loans->sum('loan_amount')) }}</td>
                                                <td>{{  sprintf("%.2f", $cc_loans->sum('total_profit_generated')) }}</td>
                                                <td>{{  sprintf("%.2f", $cc_loans->sum('cc_loan_paid_profit')) }}</td>
                                                <td>{{  $cc_loans->sum('due_cc_loan_profit_amount') }}</td>
                                                <td></td>

                                                <td colspan="3"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="text-center">
                                    
                                    </div>
                                </div>
                                <!--------------------END - Table with actions-------------------->
                                <!--------------------START - Controls below table-------------------->

                                <!--------------------END - Controls below table-------------------->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="display-type"></div>
    </div>
@endsection
