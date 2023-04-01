@extends('Reports.all_report.report_app')
@section('content')
    <div class="row">
        <div style="width: 100%;">
            <div class="row ">
                <br>
                <div class="col-sm-12" style="margin-top: 15px;">
                    <p class="element-header text-center">
                        Receive &amp; Payment Report of
                        {{ custom_date_format($reports['start_date']) }}
                        to {{ custom_date_format($reports['end_date']) }}

                    </p>

                    <hr style=" color:black;">
                </div>
                <div class="col-sm-12 d-flex justify-content-center">
                    <div class="col-sm-10">
                        <!--------------------START - Table with actions-------------------->
                        <div class="table-responsive">

                            <table class="table ">
                                <thead class="text-center">
                                    <tr>
                                        <td width="60%" class="font-weight-bold">Opening Balance</td>
                                        <td width="20%" class="font-weight-bold">Receive</td>
                                        <td width="20%" class="font-weight-bold">Payment</td>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td class="text-left">Cash</td>
                                        <td class="text-right">{{ $reports['opening_balance'] }}</td>
                                        <td class="text-right"></td>
                                    </tr>
                                </tbody>
                            </table>



                            <table class="table ">
                                <thead class="text-center">
                                    <tr>
                                        <td width="60%" class="font-weight-bold">Voucher Expenses</td>

                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                    {{-- first part  --}}
                                    <tr>
                                        <td class="text-left font-weight-bold">Expenses</td>
                                        <td width="20%" class="text-right"></td>
                                        <td width="20%" class="text-right"></td>
                                    </tr>

                                    @foreach ($reports['expenses'] as $expense)
                                        <tr>
                                            <td class="text-left">{{ $expense['category'] }}</td>
                                            <td class="text-right"></td>
                                            <td class="text-right">{{ $expense['amount'] }}</td>
                                        </tr>
                                    @endforeach




                                    <tr>
                                        <td class=" text-right">Total</td>
                                        <td></td>
                                        <td class="text-right total">{{ $reports['total_expense'] }}</td>
                                    </tr>

                                    {{-- incomes --}}

                                    <tr>
                                        <td class="text-left font-weight-bold">Incomes</td>
                                        <td width="20%" class="text-right"></td>
                                        <td width="20%" class="text-right"></td>
                                    </tr>

                                    @foreach ($reports['incomes'] as $income)
                                        <tr>
                                            <td class="text-left">{{ $income['category'] }}</td>
                                            <td class="text-right"></td>
                                            <td class="text-right">{{ $income['amount'] }}</td>
                                        </tr>
                                    @endforeach




                                    <tr>
                                        <td class=" text-right">Total</td>
                                        <td></td>
                                        <td class="text-right total">{{ $reports['total_income'] }}</td>
                                    </tr>




                                    {{-- second part --}}

                                    <tr>
                                        <td class="text-left font-weight-bold">Accounts Payable</td>
                                        <td width="20%" class="text-right"></td>
                                        <td width="20%" class="text-right"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">All FDR Deposits</td>
                                        <td class="text-right">{{ $reports['fdr_deposit_amount'] }}</td>
                                        <td class="text-right"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">All DPS Deposits</td>
                                        <td class="text-right">{{ $reports['dps_deposit_amount'] }}</td>
                                        <td class="text-right"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">All General Account Deposits</td>
                                        <td class="text-right">{{ $reports['general_account_deposit'] }}</td>
                                        <td class="text-right"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">All General Account Withdraws</td>
                                        <td class="text-right"></td>
                                        <td class="text-right">{{ $reports['general_account_withdraw'] }}</td>
                                    </tr>

                                    <tr>
                                        <td class=" text-right">Total </td>
                                        <td class=" text-right total">{{ $reports['all_deposits'] }}</td>
                                        <td class="text-right total"></td>
                                    </tr>

                                    {{-- third part --}}


                                    <tr>
                                        <td class="text-left font-weight-bold">Accounts Receivable</td>
                                        <td width="20%" class="text-right"></td>
                                        <td width="20%" class="text-right"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">১, এককালিন সঞ্চয় জমা</td>
                                        <td class="text-right">৩২৫.৩৪</td>
                                        <td class="text-right"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">৩, মোবাইল বিল প্রদান</td>
                                        <td class="text-right"></td>
                                        <td class="text-right">৩২৫.৩৪</td>
                                    </tr>
                                </tbody>



                            </table>


                            <table class="table ">
                                <thead class="text-center">
                                    <tr>
                                        <td width="60%">সমাপনী তহবিল</td>
                                        <td width="20%">ব্যাংক উত্তোলন </td>
                                        <td width="20%">ব্যাংকে জমা</td>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td class="text-left">ব্যাংক স্থিতি</td>
                                        <td class="text-right"></td>
                                        <td class="text-right"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">ক্যাশ</td>
                                        <td class="text-right"></td>
                                        <td class="text-right">1,858.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" style="border: none">সর্বমোট </td>
                                        <td class="text-right">1,858.00</td>
                                        <td class="text-right">1,858.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        thead tr,
        .total {
            background-color: rgb(201, 206, 224)
        }

        .table td {
            border: 1px solid black
        }
    </style>
@endsection
