@extends('layouts.frontend.app')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>User Collection | app name</title>
        <meta charset="utf-8">
        <meta content="ie=edge" http-equiv="x-ua-compatible">
        <meta content="template language" name="keywords">
        <meta content="Somitykeeper" name="author">
        <meta content="CoinCrow is a microcredit system" name="description">
        <meta content="width=device-width, initial-scale=1" name="viewport">

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
        <style type="text/css">
            @media print {
                @page {
                    size: landscape
                }
            }
        </style>
    </head>

    <body class="menu-position-top with-content-panel">

        <div class="all-wrapper">
            <div class="layout-w">
                <div class="content-box">
                    <link rel="stylesheet"
                        href="">

                    <div class="row d-none d-sm-block " style="padding: 15px 0;">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-3" style="width: 20%">
                                    <img style="display: block; margin: auto; padding-left: 15px;" alt="LOGO"
                                        src="" height="60">



                                </div>

                                <div class="col-sm-6 text-center" style="width: 60%">
                                    <div style="font-weight: bolder; font-size: 24px; line-height: 24px">সমিতি কিপার সঞ্চয় ও
                                        ঋণ দান সমবায় সমিতি
                                    </div>
                                    <div>বেকারত্ব আর দারিদ্রের দুর্বিপাকে কর্মমুখী করবো মোরা জগৎটাকে</div>
                                    <div style="font-size: 14px">House 3, Road 9/B, Sector 5, Uttara, Dhaka</div>
                                    <div style="font-size: 12px">
                                        <i class="fa fa-phone"></i> 01689655055 , 01670849008
                                        <i class="fa fa-envelope"></i> softwarebazar17@gmail.com
                                        <i class="fa fa-globe"></i> www.somitykeeper.com
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
                        <p style="font-weight: bold; font-size: 15px;">সমিতি কিপার সঞ্চয় ও ঋণ দান সমবায় সমিতি
                            <br> <small>House 3, Road 9/B, Sector 5, Uttara, Dhaka
                                <br> 01689655055 , 01670849008 </small>
                        </p>
                    </div>
                    <div class="row">
                        <div style="width: 100%;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h6 class="element-header text-center">
                                        Debit Credit Sheet
                                        : {{ custom_date_format($start_date) }} to {{ custom_date_format($end_date) }}
                                    </h6>
                                    <div class="table-responsive">
                                        <table class=" table-bordered table-striped table-lightfont dataTable"
                                            role="grid" aria-describedby="dataTable1_info" style="width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Branch</th>
                                                    <th>Account No</th>
                                                    <th>Member Name</th>
                                                    <th>Transaction Type</th>


                                                    <th>{{ $type == 'cash_in'? 'Cash In': 'Cash Out' }}</th>

                                                    <th>Process by</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($general_account_transactions as $general_account_transaction)
                                                   <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $general_account_transaction->created_at }}</td>
                                                    <td>Main Branch</td>
                                                    <td>{{ $general_account_transaction->account }}</td>
                                                    <td>{{ $general_account_transaction->member->m_name }}</td>
                                                    <td>General Account Transaction</td>
                                                    <td>{{ $type == 'cash_in'? $general_account_transaction->deposit: $general_account_transaction->withdraw  }}</td>
                                                    <td>Admin</td>
                                                   </tr>
                                                @endforeach

                                                @foreach ($dps_account_transactions as $dps_account_transaction)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{ $dps_account_transaction->created_at }}</td>
                                                        <td>Main Branch</td>
                                                        <td>{{ $member->account }}</td>
                                                        <td>{{ $member->m_name }}</td>
                                                        <td>DPS Account Transaction</td>
                                                        <td>{{ $type == 'cash_in'? $dps_account_transaction->deposit: $dps_account_transaction->withdraw  }}</td>
                                                        <td>Admin</td>
                                                    </tr>

                                                @endforeach
                                            </tbody>
                                            {{-- <tfoot class="text-right">
                                                <tr style="font-weight: bold">
                                                    <td colspan="6" class="text-right" style="font-weight: bold">Total:
                                                    </td>


                                                    <td style="font-weight: bold" class="text-right">0</td>

                                                    <td></td>
                                                </tr>
                                            </tfoot> --}}
                                        </table>
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

        <script type="text/javascript">
            $("form").submit(function(event) {
                if ($(this).attr('note') !== '' && $(this).attr('note') !== 'undefined' && $(this).attr('note')) {
                    if (!confirm($(this).attr('note'))) {
                        event.preventDefault();
                    }
                }
            });
        </script>
        <script>
            jQuery(document).ready(function($) {
                // Disable scroll when focused on a number input.
                $('form').on('focus', 'input[type=number]', function(e) {
                    $(this).on('wheel', function(e) {
                        e.preventDefault();
                    });
                });
                // Restore scroll on number inputs.
                $('form').on('blur', 'input[type=number]', function(e) {
                    $(this).off('wheel');
                });
                // Disable up and down keys.
                $('form').on('keydown', 'input[type=number]', function(e) {
                    if (e.which == 38 || e.which == 40)
                        e.preventDefault();
                });

                $("#myButton5").click(function(e) {
                    $(this).addClass("clicked");
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("body").attr('background', false).css('background', false);
            })
        </script>
    </body>

    </html>
@endsection
