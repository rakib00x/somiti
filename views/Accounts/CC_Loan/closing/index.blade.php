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
                                    <table id="dataTable" class="table table-bordered table-v2 table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
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
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">

                                            @foreach ($member->cc_loans()->latest()->get() as $loan)
                                                <tr>
                                                    <td >
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
                                                        0
                                                    </td>
                                                    <td class="text-right">0</td>
                                                    <td>{{ $loan->category->title }}</td>
                                                    <td>{{ $loan->member->area->name }}</td>
                                                    <td class=" text-sm">
                                                        @if ($loan->status == 2)
                                                            Active|Unpaid
                                                        @elseif ($loan->status == 3)
                                                            Closed|Paid
                                                        @else
                                                            Rejected
                                                        @endif
                                                    </td>

                                                    <td class="row-actions">

                                                        @role('admin|manager')
                                                            @if ($loan->status == 2)
                                                            <a href="{{ route('cc_closing.create', ['account' => $member->account, 'loan'=> $loan->id]) }}">
                                                                <i class="fas fa-hand-lizard"></i>
                                                            </a> 
                                                            @endif
                                                        @endrole

                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                        {{-- <tfoot>
                                            <tr class="text-right">
                                                <td colspan="5">Total:</td>
                                                <td><small>Avg </small>{{ $avg_profit }} %</td>
                                                <td>{{ $total_opening_balance }}</td>
                                                <td>00000</td>
                                                <td>{{ $total_generated_profit }}</td>
                                                <td>48,580</td>
                                                <td></td>

                                                <td colspan="3"></td>
                                            </tr>
                                        </tfoot> --}}
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
    </div>
    </div>
    <div class="display-type"></div>
    </div>
@endsection
