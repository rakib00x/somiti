<!DOCTYPE html>

<html>

<head>
    <title>CC Report | app name</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Somitykeeper" name="author">
    <meta content="CoinCrow is a microcredit system" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="https://demo.oslbd.org/fox/favicon.png" rel="shortcut icon">
    <link href="https://demo.oslbd.org/fox/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://demo.oslbd.org/fox/css/fastFont.css" rel="stylesheet">
    <link href="https://demo.oslbd.org/fox/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="https://demo.oslbd.org/fox/bower_components/bootstrap-daterangepicker/daterangepicker.css"
        rel="stylesheet">
    <link href="https://demo.oslbd.org/fox/bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="https://demo.oslbd.org/fox/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"
        rel="stylesheet">
    <link href="https://demo.oslbd.org/fox/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="https://demo.oslbd.org/fox/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css"
        rel="stylesheet">
    <link href="https://demo.oslbd.org/fox/bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="https://demo.oslbd.org/fox/css/maince5p.css?version=4.4.1" rel="stylesheet">
    <link href="https://demo.oslbd.org/fox/icon_fonts_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://demo.oslbd.org/fox/bower_components/jquery/dist/jquery.min.js"></script>
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
        /* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

 
    </style>
</head>

<body class="menu-position-top with-content-panel">

    <div class="all-wrapper">
        <div class="layout-w">
            <div class="content-box">
                <div class="row d-none d-sm-block " style="padding: 15px 0;">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('images/logo.png') }}" height="110" width="100">
                            </div>
                            <div class="col-md-6 text-center">
                                {{-- <p>বিসমিল্লাহির রহমানির রহিম</p> --}}
                                <h3 class="">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h3>
                                <p class="">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                              
                              
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div style="width: 100%;">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <div class="element-box-tp">
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td colspan="4" class="text-center">CC Report</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>Member Name</td>
                                                    <td>{{ $cc_loan->member->m_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td>Account No</td>
                                                    <td>{{ $cc_loan->member->account }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>Area</td>
                                                    <td>{{ $cc_loan->member->area->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">4</td>
                                                    <td>Loan Type</td>
                                                    <td>
                                                        {{ $cc_loan->type == '1'? 'Fixed':'Monthly Profit' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">5</td>
                                                    <td>CC Date</td>
                                                    <td>{{ $cc_loan->date }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">6</td>
                                                    <td>Total Amount</td>
                                                    <td>{{ $cc_loan->opening_balance }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">7</td>
                                                    <td>
                                                        Profit Rate (%)
                                                    </td>
                                                    <td>
                                                        {{ $cc_loan->profit_rate }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">8</td>
                                                    <td>Generated Profit</td>
                                                    <td>{{ $cc_loan->total_profit_generated }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">9</td>
                                                    <td>Paid Profit</td>
                                                    <td>{{ $cc_loan->cc_loan_paid_profit }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">10</td>
                                                    <td>Due Profit</td>
                                                    <td>{{ $cc_loan->due_cc_loan_profit_amount }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">11</td>
                                                    <td>Status</td>
                                                    <td>
                                                        @if ($cc_loan->status == '2')
                                                            UnPaid
                                                        @else
                                                            Closed
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">12</td>
                                                    <td>Close Date</td>
                                                    <td>
                                                        N/A
                                                    </td>
                                                </tr>
                                           
                                     
                                                <tr>
                                                    <td class="text-center">15</td>
                                                    <td>Note</td>
                                                    <td>{{ $cc_loan->note }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">16</td>
                                                    <td>Process by</td>
                                                    <td>{{ $cc_loan->processed_by }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="element-box-tp">
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Date</th>
                                                    <th>Previous Profit</th>
                                                    <th>Profit Collection</th>
                                                    <th>Penalty</th>
                                                    <th>Profit Balance</th>
                                                    <th>Note</th>
                                                    <th>Received By</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($cc_loan->installments as $installment)
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">{{ $installment->date }}</td>
                                                    <td class="text-right">{{ $installment->previous_profit }}</td>
                                                    <td class="text-right">{{ $installment->amount }}</td>
                                                    <td class="text-right">{{ $installment->penalty?? 0 }}</td>
                                                    <td class="text-right">{{ $installment->profit_balance }}</td>
                                                    <td class="text-right">{{ $installment->note }}</td>
                                                    <td class="text-center">{{ $installment->processed_by }}</td>
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
      
                <br>
                <br>

                <style type="text/css">
                    @media print {
                        #backbtn {
                            display: none;

                        }
                    }
                </style>
            </div>
        </div>
    </div>
    <script src="https://demo.oslbd.org/fox/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/moment/moment.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/chart.js/dist/Chart.min.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>

    <script src="https://demo.oslbd.org/fox/bower_components/bootstrap-validator/dist/validator.min.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/dropzone/dist/dropzone.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/editable-table/mindmup-editabletable.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/tether/dist/js/tether.min.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/slick-carousel/slick/slick.min.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/bootstrap/js/dist/util.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/bootstrap/js/dist/alert.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/bootstrap/js/dist/button.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/bootstrap/js/dist/carousel.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/bootstrap/js/dist/collapse.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/bootstrap/js/dist/dropdown.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/bootstrap/js/dist/modal.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/bootstrap/js/dist/tab.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/bootstrap/js/dist/tooltip.js"></script>
    <script src="https://demo.oslbd.org/fox/bower_components/bootstrap/js/dist/popover.js"></script>
    <script src="https://demo.oslbd.org/fox/js/demo_customizerce5a.js?version=4.4.1"></script>
    <script src="https://demo.oslbd.org/fox/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://demo.oslbd.org/fox/js/maince5a.js?version=4.4.1"></script>




</body>

</html>
