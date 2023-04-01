<!DOCTYPE html>
<html>

<head>
    <title>Share Transactions Statement | app name</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Somitykeeper" name="author">
    <meta content="CoinCrow is a microcredit system" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="{{ asset('assets/frontend/css/maince5p.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .label {
            color: black
        }
    </style>
    <style>
        @media print {
            @page {
                size: auto
            }
        }

        .color-red {
            color: red;
        }

        .table-bordered td {
            border: 1px solid black !important;

        }

        .table th,
        .table td {
            padding: 0px;
        }

        h6 {
            padding: 2px;
        }

        thead tr,
        tfoot tr {
            font-weight: bold;
        }

        table td {
            padding-left: 2px !important;
            padding-right: 2px !important;
        }

        @media only screen and (max-width: 720px) {
            table {
                font-size: 10px !important;
            }
        }

        @media only screen and (min-width: 721px) {
            table {
                font-size: 12px !important;
            }
        }
    </style>
</head>

<body class="menu-position-top with-content-panel">

    <div class="all-wrapper">
        <div class="layout-w">
            <div class="content-box">
                <link rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                <div class="row d-none d-sm-block " style="padding: 15px 0;">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3" style="width: 20%">
                                <img style="display: block; margin: auto; padding-left: 15px;" alt="LOGO"
                                    src="{{ asset('images/logo.png') }}" height="100">
                            </div>
                            <div class="col-sm-6 text-center" style="width: 60%">
                                <div style="font-weight: bolder; font-size: 24px; line-height: 24px">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ
                                </div>
                                <div>বেকারত্ব আর দারিদ্রের দুর্বিপাকে কর্মমুখী করবো মোরা জগৎটাকে</div>
                                <div style="font-size: 14px">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা</div>
                                <div style="font-size: 12px">
                                    <i class="fa fa-phone"></i> {{ $share_account->m_mobile }} , {{ $share_account->second_mobile }}
                                    <i class="fa fa-envelope"></i> {{ $share_account->email }}
                                    <i class="fa fa-globe"></i> {{ $share_account->email }}
                                </div>
                            </div>
                            <div class="col-sm-3 text-right" style="width: 10%">

                                <p style="position:relative;bottom:0;">

                                </p>

                                <style type="text/css">
                                    @media print {
                                        #backbtn {
                                            display: none;

                                        }
                                    }

                                    hr.style-eight {
                                        overflow: visible;
                                        /* For IE */
                                        padding: 0;
                                        border: none;
                                        border-top: medium double #333;
                                        color: #333;
                                        text-align: center;
                                    }

                                    hr.style-eight:after {
                                        content: "§";
                                        display: inline-block;
                                        position: relative;
                                        top: -0.7em;
                                        font-size: 1.5em;
                                        padding: 0 0.25em;
                                        background: white;
                                    }
                                </style>
                                <input id="backbtn" type="button" value="Go Back" onclick="history.back(-1)" />
                                <style type="text/css">
                                    @media print {
                                        #printbtn {
                                            display: none;
                                        }
                                    }
                                </style>
                                <input id="printbtn" type="button" value="Print" onclick="window.print();">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="style-seven row d-none d-sm-block">
                <div class="d-block d-sm-none text-center " style="padding: 0px;">
                    <p style="font-weight: bold; font-size: 15px;">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ
                        <br> <small>৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা
                        <br>{{ $share_account->m_mobile }} , {{ $share_account->second_mobile }}</small>
                    </p>
                </div>
                <div class="row">
                    <div style="width: 100%;">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-12">
                                <div class="element-box-tp">
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td colspan="4" class="text-center">Share Transactions Statement
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>Member Name</td>
                                                    <td>{{ $share_account->m_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td>Account No</td>
                                                    <td>{{ $share_account->account }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>Area</td>
                                                    <td>{{ $share_account->area->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">4</td>
                                                    <td>Opening Date</td>
                                                    <td>{{ $share_account->join }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">5</td>
                                                    <td>Balance</td>
                                                    <td>{{ $share_account->share }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">6</td>
                                                    <td>Status</td>
                                                    <td>
                                                       @if ($share_account->active == 1)
                                                            Active
                                                            @else
                                                            Inactive
                                                       @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">7</td>
                                                    <td>Last Transaction</td>
                                                    <td>
                                                        16-10-2022
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center">9</td>
                                                    <td>Updated At</td>
                                                    <td>{{ $share_account->updated_at }}</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>


                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="element-box-tp">
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <thead class="text-center">
                                                <th>SL</th>
                                                <th>Date</th>

                                                <th>Deposite</th>
                                                <th>Withdraw</th>
                                                <th>Balance</th>
                                                <th>Entry Date</th>
                                                <th>Note</th>
                                                <th>Received By</th>
                                            </thead>
                                            <tbody>
                                                <tr class="">
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">16-10-2022 11:53 AM</td>

                                                    <td class="text-right">0</td>
                                                    <td class="text-right">15,000</td>
                                                    <td class="text-right">5,600</td>
                                                    <td class="text-center">16-10-2022 11:53 AM</td>
                                                    <td>j</td>
                                                    <td class="text-center">Mahfuz Akand</td>
                                                </tr>
                                                <tr class="">
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">16-10-2022 12:00 AM</td>

                                                    <td class="text-right">10,500</td>
                                                    <td class="text-right">0</td>
                                                    <td class="text-right">20,600</td>
                                                    <td class="text-center">16-10-2022 11:52 AM</td>
                                                    <td>jjj</td>
                                                    <td class="text-center">Mahfuz Akand</td>
                                                </tr>
                                                <tr class="">
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">28-09-2022 11:59 AM</td>

                                                    <td class="text-right">100</td>
                                                    <td class="text-right">0</td>
                                                    <td class="text-right">10,100</td>
                                                    <td class="text-center">28-09-2022 11:59 AM</td>
                                                    <td></td>
                                                    <td class="text-center">Mahfuz Akand</td>
                                                </tr>
                                                <tr class="">
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">11-09-2022 10:49 AM</td>

                                                    <td class="text-right">10,000</td>
                                                    <td class="text-right">0</td>
                                                    <td class="text-right">10,000</td>
                                                    <td class="text-center">11-09-2022 10:49 AM</td>
                                                    <td></td>
                                                    <td class="text-center">Mahfuz Akand</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <td class="text-right" colspan="3"> Total: </td>
                                                <td class="text-right" style="font-weight: bold">20,600</td>
                                                <td class="text-right" style="font-weight: bold">15,000</td>
                                                <td colspan="5"></td>
                                            </tfoot>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <table class="col-sm-12">
                        <tbody>
                            <tr style="border: 0px; font-weight: bold">
                                <td><br><br>Prepared by</td>
                                <td class="text-center"><br><br>Verified by</td>
                                <td class="text-right"><br><br>Approved by</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <br>
                <br>

                <style type="text/css">
                    @media print {
                        #backbtn {
                            display: none;

                        }
                    }
                </style>

                <div class="d-block d-sm-none text-center border border-dark"
                    style="padding: 10px; background-color:bisque;">
                    <input id="backbtn" type="button" class="btn btn-primary btn-block" value="Go Back"
                        onclick="history.back(-1)" />
                </div>
            </div>
        </div>
    </div>
</body>

</html>
