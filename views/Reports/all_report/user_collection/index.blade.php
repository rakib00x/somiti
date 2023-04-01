@extends('Reports.all_report.report_app')
@section('content')
    <div class="row">
        <div style="width: 100%;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-box">
                        <h6 class="element-header text-center">
                            User collection report from
                            {{ custom_date_format($report['start_date']) }} to {{ custom_date_format($report['end_date']) }}
                        </h6>
                        <div class="row table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <td colspan="6" class="text-center">Collection Report</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">SL</td>
                                        <td class="text-center">Type</td>
                                        <td class="text-center">Amount</td>
                                        <td class="text-center">Penalty</td>
                                        <td class="text-center">Count</td>
                                        <td class="text-center">User</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($report['collections'] as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->type }}</td>
                                            <td class="text-right">{{ sprintf('%.2f', $item->amount) }}</td>
                                            <td class="text-right">{{ sprintf('%.2f', $item->penalty) }}</td>
                                            <td class="text-right">{{ $item->count }}</td>
                                            <td class="text-right">{{ $item->user }}</td>
                                        </tr>
                                    @endforeach



                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" class="text-right">Total:</td>
                                        <td class="text-right">{{ sprintf('%.2f', $report['collections']->sum('amount')) }}
                                        </td>
                                        <td class="text-right">{{ sprintf('%.2f', $report['collections']->sum('penalty')) }}
                                        </td>
                                        <td class="text-right">{{ $report['collections']->sum('count') }}</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <h6 class="element-header text-center"></h6>
                        <div class="row table-responsive">
                            <table class="table table-bordered table-v2 table-striped table-sm">
                                <thead class="text-center">
                                    <tr>
                                        <th style="font-weight: bold">Admitted</th>
                                        <th style="font-weight: bold">Deactivated</th>
                                        <th style="font-weight: bold">Total Member</th>
                                        <th style="font-weight: bold">Total Share AC</th>
                                        <th style="font-weight: bold">Total Savings AC</th>
                                        <th style="font-weight: bold">Total Monthly Savings AC</th>
                                        <th style="font-weight: bold">Total Loan AC</th>
                                        <th style="font-weight: bold">Total FDR AC</th>
                                        <th style="font-weight: bold">Total CC AC</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td style="font-weight: bold; color: red">0</td>
                                        <td style="font-weight: bold; color: red">0</td>
                                        <td style="font-weight: bold; color: red">26</td>
                                        <td style="font-weight: bold; color: red">9</td>
                                        <td style="font-weight: bold; color: red">21</td>
                                        <td style="font-weight: bold; color: red">6</td>
                                        <td style="font-weight: bold; color: red">9</td>
                                        <td style="font-weight: bold; color: red">6</td>
                                        <td style="font-weight: bold; color: red">7</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>



                        <h6 class="element-header text-center"></h6>
                        <div class="row table-responsive">
                            <table class="table table-bordered table-v2 table-striped table-sm">
                                <thead>
                                    <tr>

                                        <td colspan="16" class="text-center">Installment Collection</td>

                                    </tr>
                                    <tr>
                                        <td class="text-center">SL</td>
                                        <td class="text-center">Date</td>
                                        <td class="text-center">Account No</td>
                                        <td class="text-center">Member Name</td>
                                        <td class="text-center">Amount</td>
                                        <td class="text-center">Principal</td>
                                        <td class="text-center">Profit</td>
                                        <td class="text-center">Penalty</td>
                                        <td class="text-center">Loan Amount</td>
                                        <td class="text-center">Total Paid</td>
                                        <td class="text-center">Total Due</td>
                                        <td class="text-center">Per Installment</td>
                                        <td class="text-center">Note</td>
                                        <td class="text-center">Entry Date</td>
                                        <td class="text-center">Process by</td>
                                        <td class="text-center">Area</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- this condition use for row color  -->

                                    <tr style="color: green">
                                        <td class="text-center">1</td>
                                        <td class="text-center">19-Nov-2022</td>
                                        <td class="text-center">2</td>
                                        <td>মোঃ ইউসুফ আরাফাত</td>
                                        <td class="text-right">800</td>
                                        <td class="text-right">667</td>
                                        <td class="text-right">133</td>
                                        <td class="text-right">5</td>
                                        <td class="text-right">6,000 </td>
                                        <td class="text-right">2,065 </td>
                                        <td class="text-right ">3,935 </td>

                                        <td class="text-right">273 </td>
                                        <td class="text-center"></td>
                                        <td class="text-center">19-Nov-2022</td>

                                        <td class="text-center ">Mahfuz Akand</td>
                                        <td class="text-center">Mohakhali Area</td>
                                    </tr>

                                    <!-- this condition use for row color  -->

                                    <tr style="color: red">
                                        <td class="text-center">2</td>
                                        <td class="text-center">19-Nov-2022</td>
                                        <td class="text-center">2</td>
                                        <td>মোঃ ইউসুফ আরাফাত</td>
                                        <td class="text-right">265</td>
                                        <td class="text-right">221</td>
                                        <td class="text-right">44</td>
                                        <td class="text-right">1</td>
                                        <td class="text-right">6,000 </td>
                                        <td class="text-right">2,065 </td>
                                        <td class="text-right ">3,935 </td>

                                        <td class="text-right">273 </td>
                                        <td class="text-center"></td>
                                        <td class="text-center">19-Nov-2022</td>

                                        <td class="text-center ">Mahfuz Akand</td>
                                        <td class="text-center">Mohakhali Area</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right">Total:</td>
                                        <td class="text-right">1,065</td>
                                        <td class="text-right">888</td>
                                        <td class="text-right">178</td>

                                        <td class="text-right">6</td>
                                        <td class="text-right">12,000</td>
                                        <td class="text-right">4,130</td>
                                        <td class="text-right">7,870</td>
                                        <td class="text-right">546</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <h6 class="element-header text-center"></h6>
                        <div class="row table-responsive">
                            <table class="table table-bordered table-v2 table-striped table-sm">
                                <thead>
                                    <tr>
                                        <td colspan="9" class="text-center">FDR Opening</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">SL</td>
                                        <td class="text-center">Date</td>
                                        <td class="text-center">Account No</td>
                                        <td class="text-center">Member Name</td>
                                        <td class="text-center">Amount</td>
                                        <td class="text-center">Entry Date</td>
                                        <td class="text-center">Process by</td>
                                        <td class="text-center">Scheme</td>
                                        <td class="text-center">Area</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">19-Nov-2022</td>
                                        <td class="text-center">2</td>
                                        <td class="text-left">মোঃ ইউসুফ আরাফাত</td>
                                        <td class="text-right">200,000</td>
                                        <td class="text-center">19-Nov-2022</td>
                                        <td class="text-center ">Mahfuz Akand</td>
                                        <td class="text-center">Monthly FDR</td>
                                        <td class="text-center">Mohakhali Area</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right">Total:</td>
                                        <td class="text-right">200,000</td>
                                        <td colspan="5"></td>


                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <h6 class="element-header text-center">Manager Collection</h6>
                        <div class="row table-responsive">
                            <table class="table table-bordered table-v2 table-striped table-sm">
                                <thead class="text-center">
                                    <tr>
                                        <th style="font-weight: bold">Share </th>
                                        <th style="font-weight: bold">GENERAL</th>
                                        <th style="font-weight: bold">DPS</th>
                                        <th style="font-weight: bold">Investment</th>
                                        <th style="font-weight: bold">CC installment</th>
                                        <th style="font-weight: bold">FDR Opening</th>
                                        <th style="font-weight: bold">Total amount</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td style="font-weight: bold; color: red">0</td>
                                        <td style="font-weight: bold; color: red">0</td>
                                        <td style="font-weight: bold; color: red">0</td>
                                        <td style="font-weight: bold; color: red">0</td>
                                        <td style="font-weight: bold; color: red">0</td>
                                        <td style="font-weight: bold; color: red">0</td>
                                        <td style="font-weight: bold; color: red">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
