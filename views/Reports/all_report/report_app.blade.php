<!DOCTYPE html>
<html>

<head>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Blue Star Shomithi' }} | ব্লু স্টার সঞ্চয় ও ঋণ দান সমবায় সমিতি</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Somitykeeper" name="author">
    <meta content="CoinCrow is a microcredit system" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="{{ asset('images/logo.png') }}" rel="shortcut icon">
    <link href="{{ asset('images/logo.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('images/logo.png') }}" rel="shortcut icon">
    <link href="{{ asset('images/logo.png') }}" rel="apple-touch-icon">
    {{-- <link href="{{asset('css/fastFont.css')}}" rel="stylesheet"> --}}

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/perfect-scrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/maince5a.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery.dataTables.min.css') }}">

    @stack('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    <style>
        .table.table-v2 thead tr th {
            /* background: none; */
            background: blue !important;
            color: white !important;
        }

        additive-symbols: .toast-top-right {
            margin-top: 50px;
        }

        .label {
            color: black;
        }

        .heading_title {
            font-size: 25px;
            text-transform: uppercase;
            font-weight: 700;
            padding: 12px;
            text-align: center;
        }

        label {
            font-weight: 600 !important;
        }

        .form-control {
            border: 2px solid black;
        }

        .select2-container--default .select2-selection--single,
        .select2-container--default .select2-selection--multiple {
            border-color: #060708;
        }

        /*----action button small size-----*/
        .action_btn {
            padding: 1px 6px 2px 6px !important;
            font-size: 13px !important;
        }

        /*---company name*/
        .bangla_font2 {
            font-size: 27px;
            font-weight: 700;
        }

        .account_list {
            font-size: 18px;
            font-weight: 600;
        }

        .company_address {
            font-size: 19px;
            font-weight: 600;
            color: #334152;
        }




        @font-face {
            font-family: 'Kalpurush';
            url('/fox/css/fonts/Kalpurush.woff') format('woff'),
            /* Modern Browsers */
            url('/fox/css/fonts/Kalpurush.ttf') format('truetype'),
            /* Safari, Android, iOS */
            /*url('webfont.svg#svgFontName') format('svg'); */
            /* Legacy iOS */
        }

        /* Hide HTML5 Up and Down arrows. */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        .required:after {
            content: " *";
            color: red;
        }
    </style>
    <style>
        .label {
            font-size: 14px !important;
        }

        .pt-user-name {
            font-weight: bolder;
        }

        .AmountHead {
            width: 100%;
            height: 100%;
            padding: 5px;
            background: rgb(147, 6, 6);
            color: white !important;
            border-bottom: 2px solid black;
        }

        .TitleH {
            padding: 0 !important;
            margin: 0;
            border: 1px solid black;
        }

        .Amount {
            padding: 20px 0px;
            font-size: 40px !important;
            font-weight: bold !important;
            color: #1DCC70;
        }

        .marquee {
            color: black;
            border-top: 1px solid black;
        }

        .fa {
            font-size: 20px;
        }

        /* .Icon{
    background: black;
    margin: 0 !important;
    padding: 0 !important;
} */

        @media (max-width: 930px) {
            a.el-tablo .label {
                -webkit-transition: none;
                transition: none;
                height: 90px;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        }

        @media (min-width: 931px) and (max-width: 1300px) {
            a.el-tablo .label {
                -webkit-transition: none;
                transition: none;
                height: 70px;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        }

        a.element-box.el-tablo:hover,
        a.element-box.el-tablo:active,
        a.element-box.el-tablo:focus {
            background: transparent !important;
            color: #1DCC70 !important;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #printArea,
            #printArea * {
                visibility: visible;
            }

            .nonePrintArea {
                display: none;
            }


            #printArea {
                position: absolute;
                left: 0;
                top: 0;
            }

            .dataTables_info {
                display: none;
            }

            #example1_paginate,
            #example1_length,
            #example1_filter {
                display: none;
            }

            #actionth,
            .row-actions,
            .pagination {
                display: none;
            }
        }
    </style>
    @stack('stylesheet')
</head>

<body class="menu-position-top full-screen">
    <div class="solid-bg-all">
        <div class="layout-w">
            {{-- content goes here --}}

            <div class="content-box">

                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/logo.png') }}" height="110" width="100">
                    </div>
                    <div class="col-md-6 text-center">
                        {{-- <p>বিসমিল্লাহির রহমানির রহিম</p> --}}
                        <h3 class="">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h3>
                        <p class="">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                        
                        <hr class="border border-dark w-50 mt-0">
                    </div>

                    <div class="col-sm-3 text-right" style="width: 10%">

                        <p style="position:relative;bottom:0;">

                        </p>




                        <input id="backbtn" type="button" value="Go Back" onclick="history.back(-1)">


                        <input id="printbtn" type="button" value="Print" onclick="window.print();">

                    </div>

                </div>

                @yield('content')
                {{-- content goes here --}}




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
                        onclick="history.back(-1)">
                </div>
            </div>



        </div>
    </div>




    <script src="{{ asset('js/popper.min.js') }}"></script>

    @stack('javascripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/validator.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script src="{{ asset('js/mindmup-editabletable.js') }}"></script>

    <script src="{{ asset('js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/util.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script src="{{ asset('js/button.js') }}"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script src="{{ asset('js/collapse.js') }}"></script>
    <script src="{{ asset('js/dropdown.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="{{ asset('js/tab.js') }}"></script>
    <script src="{{ asset('js/tooltip.js') }}"></script>
    <script src="{{ asset('js/popover.js') }}"></script>
    <script src="{{ asset('js/demo_customizerce5a.js') }}"></script>
    <script src="{{ asset('js/maince5a.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.dataTables.min.js') }}"></script>




</body>

</html>
