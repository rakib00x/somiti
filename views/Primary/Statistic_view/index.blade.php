@extends('layouts.frontend.app', ['pageTitle' => 'Statistic Overview'])
<style>
    .statistic-block,
    .statistic-block-top {
        border: 1px solid;
        width: 100%;
        margin: 10px 0;
        background-color: white;
    }

    .statistic-block td,
    .statistic-block-top td {
        border: 1px solid;
        padding: 5px 10px;
    }

    .statistic-block tr:nth-child(2) {
        padding: 10px 10px;
        font-size: 30px;
        font-weight: bolder;
    }

    .statistic-block-top tr:nth-child(3) {
        padding: 10px 10px;
        font-size: 30px;
        font-weight: bolder;
    }

    .statistic-block-top tr:nth-child(3) {
        font-weight: bold;
    }

    .statistic-block-top tr:nth-child(4) td {
        padding: 0;
    }

    .statistic-block tr:first-child,
    .statistic-block-top tr:first-child {
        color: white;
        font-weight: bold;
    }

    .success td {
        border-color: #4dbd74;
        ;
    }

    .success tr:first-child {
        background: #4dbd74;
        ;
    }

    .primary td {
        border-color: #20a8d8;
    }

    .primary tr:first-child {
        background: #20a8d8;
    }

    .warning td {
        border-color: #930606;
    }

    .warning tr:first-child {
        background: #930606;
    }

    .danger td {
        border-color: #f86c6b;
    }

    .danger tr:first-child {
        background: #f86c6b;
    }

    .hotpink td {
        border-color: hotpink;
    }

    .hotpink tr:first-child {
        background: hotpink;
    }
</style>
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="">
                <div class="row">
                    <div class="col-sm">
                        <table class="text-center statistic-block-top success">
                            <tr>
                                <td colspan="4">Installment Target<a
                                        href=""
                                        style="color: inherit"> . . . <i class="fa fa-external-link-square"></i> </a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Today</td>
                                <td colspan="2">Overdue</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="count"
                                    title="This is your Installment target for today. That is, the schedule for each day was created when the Investment was opened. That ratio is the sum of the number of people you have to collect money from today.">
                                    0 </td>
                                <td colspan="2" class="count"
                                    title="This is your investment was recoverable as per today&#039;s schedule but is currently in arrears. You can see more details in the Installment Schedule report by clicking on the icon above.">
                                    0 </td>
                            </tr>
                            <tr>
                                <td colspan="2">Collected</td>
                                <td colspan="2">Due</td>
                            </tr>
                            <tr>

                                <td>1350</td>
                                <td style="color: red">

                                    0 % <i class="fa fa-arrow-down"></i>
                                </td>
                                <td title="(Actual receivable) 1350 - (today&#039;s paid) 1350">0</td>
                                <td style="color: #0a7cf8">100 % <i class="fa fa-arrow-up"></i></td>
                            </tr>
                        </table>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm">
                        <table class="text-center statistic-block primary">
                            <tr>
                                <td colspan="2">Savings Collection</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="count">0 </td>
                            </tr>
                            <tr>
                                <td>
                                    0
                                    <small>Transactions</small>
                                </td>

                                <td style="color: #0a7cf8">
                                    0
                                    %
                                    <i class="fa fa-arrow-up"></i>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm">
                        <table class="text-center statistic-block success">
                            <tr>
                                <td colspan="2">Installments Collection</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="count">3500 </td>
                            </tr>
                            <tr>
                                <td>
                                    2
                                    <small>Transactions</small>
                                </td>

                                <td style="color: #0a7cf8">
                                    0
                                    %
                                    <i class="fa fa-arrow-up"></i>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm">
                        <table class="text-center statistic-block warning">
                            <tr>
                                <td colspan="2">Monthly Savings Collection</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="count">0 </td>
                            </tr>
                            <tr>
                                <td>
                                    0
                                    <small>Transactions</small>
                                </td>

                                <td style="color: #0a7cf8">
                                    0
                                    %
                                    <i class="fa fa-arrow-up"></i>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm">
                        <table class="text-center statistic-block danger">
                            <tr>
                                <td colspan="2">Fixed Deposit Collection</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="count">0 </td>
                            </tr>
                            <tr>
                                <td>
                                    0
                                    <small>Transactions</small>
                                </td>

                                <td style="color: #0a7cf8">
                                    0
                                    %
                                    <i class="fa fa-arrow-up"></i>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm">
                        <table class="text-center statistic-block hotpink">
                            <tr>
                                <td colspan="2">Share Sale</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="count">0 </td>
                            </tr>
                            <tr>
                                <td>
                                    0
                                    <small>Transactions</small>
                                </td>

                                <td style="color: #0a7cf8">
                                    0
                                    %
                                    <i class="fa fa-arrow-up"></i>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <table class="text-center statistic-block primary">
                            <tr>
                                <td colspan="2">CC loan installment</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="count">0 </td>
                            </tr>
                            <tr>
                                <td>
                                    0
                                    <small>Transactions</small>
                                </td>

                                <td style="color: #0a7cf8">
                                    0
                                    %
                                    <i class="fa fa-arrow-up"></i>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm">
                        <table class="text-center statistic-block success">
                            <tr>
                                <td colspan="2">Admission Fee Collection</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="count">0 </td>
                            </tr>
                            <tr>
                                <td>
                                    0
                                    <small>Transactions</small>
                                </td>

                                <td style="color: #0a7cf8">
                                    0
                                    %
                                    <i class="fa fa-arrow-up"></i>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm">
                        <table class="text-center statistic-block warning">
                            <tr>
                                <td colspan="2">Installment Penalty (monthly)</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="count">50 </td>
                            </tr>
                            <tr>
                                <td>
                                    1
                                    <small>Transactions</small>
                                </td>

                                <td style="color: #0a7cf8">
                                    0
                                    %
                                    <i class="fa fa-arrow-up"></i>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm">
                        <table class="text-center statistic-block primary">
                            <tr>
                                <td colspan="2">Loan Distribute (monthly)</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="count">35000 </td>
                            </tr>
                            <tr>
                                <td>
                                    2
                                    <small>Transactions</small>
                                </td>

                                <td style="color: #0a7cf8">
                                    0
                                    %
                                    <i class="fa fa-arrow-up"></i>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm">
                        <table class="text-center statistic-block success">
                            <tr>
                                <td colspan="2">salary distribution</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="count">1001 </td>
                            </tr>
                            <tr>
                                <td>
                                    1
                                    <small>Transactions</small>
                                </td>

                                <td style="color: #0a7cf8">
                                    0
                                    %
                                    <i class="fa fa-arrow-up"></i>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>




        </div>
    </div>
</div>


<script>
    $("#statisticView").click(function() {
        $(".statisticView").attr('style', 'display: block !important');
        $(this).hide();
    })
</script>
@endsection

