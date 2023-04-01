@extends('layouts.frontend.app')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Filtered Bank transactions | app name</title>
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
                                    <div style="font-weight: bolder; font-size: 24px; line-height: 24px">সমিতি কিপার সঞ্চয় ও ঋণ দান সমবায় সমিতি
                                    </div>
                                    <div style="font-size: 14px">House 3, Road 9/B, Sector 5, Uttara, Dhaka</div>
                                    <div style="font-size: 12px">
                                        <i class="fa fa-phone"></i>৮৩৯/৩৯, লোয়ার যশোর রোড, নতুন রাস্তা, দৌলতপুর
                                        <i class="fa fa-envelope"></i> 01911904312, 01701298350
                                        <i class="fa fa-globe"></i>bluestar261k@gmail.com
                                        <i class="fa fa-globe"></i>bluestarsomithi.com
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
                                    <div class="element-box-tp">
                                        <div class="element-header text-center">Bank Name: <strong>Duch Bangla Bank
                                                Limited</strong></div>
                                        <div class="element-header text-center">Report for only Main Branch</div>
                                        <div class="row">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td colspan="8" class="text-center">Bank Transaction Report</td>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <td>Date</td>
                                                        <td>Bank Name</td>
                                                        <td>Account Number</td>
                                                        <td>Branch</td>
                                                        <td>Deposit</td>
                                                        <td>Withdraw</td>
                                                        <td>Bank / Fund Balance</td>
                                                        <td>Details</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr style="font-weight: bold" class="text-center">
                                                        <td colspan="4" class="text-right">Total:</td>
                                                        <td class="text-right">0</td>
                                                        <td class="text-right">0</td>
                                                        <td class="text-right">0</td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
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
    </body>
    </html>
@endsection
