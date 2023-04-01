<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share Certificate</title>

    <link media="all" type="text/css" rel="stylesheet"  href="{{ asset('assets/frontend/css/font-awesome.min.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
</head>
<style>
    body {
        background: white;
    }

    page[size="A4"][layout="landscape"] {
        width: 29.7cm;
        height: 21cm;
    }

    @media print {

        body,
        page {
            margin-bottom: 0px;
            box-shadow: none;
        }

        @page {
            size: landscape
        }
    }

    page {

        background: url({{ asset('assets/frontend/images/share_certificate_bg.png') }});
        background-size: cover;
        background-repeat: no-repeat;
        display: block;
        margin: 0 auto;
        border: 1px solid white;
        /* margin-bottom: 0.5cm; */
    }

    page[size="A4"][layout="landscape"] {
        width: 29.7cm;
        height: 21cm;
    }

    @media print {

        body,
        page {
            margin-bottom: 0px;
            box-shadow: 0;
        }
    }

    /**
    * Print stylesheet for yourwebsite.com
    * @version                  1.0
    * @lastmodified        16.06.2016
    */
    @media print {

        /* Setting content width, unsetting floats and margins */
        /* Attention: the classes and IDs vary from theme to theme. Thus, set own classes here */
        #content,
        #page {
            width: 100%;
            margin: 0;
            float: none;
        }

        /** Setting margins */
        @page {
            margin: 2cm
        }

        /* Or: */
        @page :left {
            margin: 1cm;
        }

        @page :right {
            margin: 1cm;
        }

        /* The first page of a print can be manipulated as well */
        @page :first {
            margin: 1cm 2cm;
        }

        .non-printable {
            display: none !important;
        }
    }

    .margin {
        margin-top: 80px;
    }

    .heading {
        margin: auto;
        width: 900px;
        height: 150px;
    }

    .logo {
        text-align: center;
        float: left;
        height: 100%;
        width: 200px;
    }

    .logo img {
        border-radius: 10px;
        height: 120px;
        width: 120px;
    }

    .txt {
        text-align: center;
        float: left;
        height: 100%;
        width: 500px;
    }

    .txt h1 {
        padding-top: 50px;
    }

    .qr {
        text-align: center;
        float: left;
        height: 100%;
        width: 200px;
        margin-bottom: 10px;
    }

    .qr img {
        border-radius: 10px;
        height: 140px;
        width: 140px;
    }

    .table {
        font-family: arial, sans-serif;
        width: 100%;
        align-items: center;
        margin-left: 10%;
        margin-top: 0px;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 80%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        /* width: 50%; */
        padding: 8px 30px !important;

    }

    .th {
        width: 20px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    strong {
        font-size: large;
        color: green;
    }

    .inform {
        text-align: justify;
        width: 900px;
    }

    .inform p {
        text-align: justify;
        font-size: 16px;
    }

    .footar p {
        font-size: 20px;
    }
</style>

<body>
    <page size="A4" id="page" layout="landscape">
        <div class="heading">
            <div class="margin"></div>
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>
            <div class="txt">
                <h3>ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h3>
                <p style="font-size: 16px">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা</p>
                <p style="font-size: 0; ">|</p>
                <h4><span
                        style="padding: 10px 20px; border-radius: 50px; border: 2px solid black; background-color: white">শেয়ার
                        সার্টিফিকেট</span>
                </h4>
            </div>
            <div class="qr">
                <?xml version="1.0" encoding="UTF-8"?>
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="120" height="120"
                    viewBox="0 0 120 120">
                    <rect x="0" y="0" width="120" height="120" fill="#ffffff" />
                    <g transform="scale(4.138)">
                        <g transform="translate(0,0)">
                            <path fill-rule="evenodd"
                                d="M9 0L9 1L8 1L8 2L9 2L9 3L8 3L8 4L9 4L9 5L8 5L8 7L9 7L9 8L6 8L6 9L5 9L5 8L0 8L0 11L1 11L1 12L2 12L2 11L3 11L3 12L4 12L4 13L5 13L5 15L4 15L4 17L5 17L5 19L4 19L4 18L3 18L3 16L2 16L2 15L3 15L3 14L1 14L1 16L0 16L0 21L1 21L1 18L2 18L2 20L3 20L3 21L5 21L5 19L7 19L7 20L6 20L6 21L8 21L8 23L9 23L9 21L10 21L10 22L12 22L12 23L11 23L11 24L10 24L10 25L9 25L9 24L8 24L8 29L10 29L10 28L9 28L9 26L10 26L10 27L11 27L11 26L12 26L12 27L13 27L13 25L14 25L14 26L15 26L15 27L14 27L14 28L13 28L13 29L14 29L14 28L15 28L15 29L16 29L16 28L15 28L15 27L17 27L17 26L18 26L18 27L20 27L20 28L19 28L19 29L20 29L20 28L21 28L21 29L25 29L25 28L26 28L26 29L27 29L27 28L28 28L28 26L29 26L29 25L28 25L28 26L27 26L27 28L26 28L26 27L25 27L25 26L26 26L26 25L27 25L27 24L26 24L26 23L27 23L27 22L29 22L29 20L28 20L28 19L27 19L27 16L28 16L28 15L27 15L27 12L28 12L28 11L27 11L27 12L25 12L25 13L24 13L24 14L23 14L23 13L22 13L22 14L21 14L21 12L20 12L20 11L19 11L19 10L22 10L22 12L24 12L24 11L23 11L23 10L25 10L25 9L26 9L26 8L25 8L25 9L24 9L24 8L23 8L23 9L22 9L22 8L21 8L21 5L20 5L20 3L21 3L21 0L18 0L18 1L17 1L17 0L16 0L16 1L15 1L15 2L14 2L14 3L12 3L12 4L11 4L11 1L12 1L12 2L13 2L13 1L12 1L12 0L11 0L11 1L10 1L10 0ZM16 1L16 3L15 3L15 5L14 5L14 4L12 4L12 5L11 5L11 4L10 4L10 3L9 3L9 4L10 4L10 5L9 5L9 7L10 7L10 8L9 8L9 10L8 10L8 9L6 9L6 10L7 10L7 11L6 11L6 12L5 12L5 13L6 13L6 14L7 14L7 15L6 15L6 16L7 16L7 17L6 17L6 18L7 18L7 19L9 19L9 20L8 20L8 21L9 21L9 20L11 20L11 21L12 21L12 22L14 22L14 23L12 23L12 24L11 24L11 25L13 25L13 24L14 24L14 25L15 25L15 26L16 26L16 25L17 25L17 24L18 24L18 25L19 25L19 26L20 26L20 27L21 27L21 26L25 26L25 25L26 25L26 24L25 24L25 25L20 25L20 23L19 23L19 22L20 22L20 21L19 21L19 19L22 19L22 20L23 20L23 19L22 19L22 18L19 18L19 19L18 19L18 18L16 18L16 17L17 17L17 16L18 16L18 17L19 17L19 16L18 16L18 15L20 15L20 14L19 14L19 13L20 13L20 12L18 12L18 11L17 11L17 12L16 12L16 11L15 11L15 12L14 12L14 10L16 10L16 9L12 9L12 8L11 8L11 7L12 7L12 6L13 6L13 8L18 8L18 9L17 9L17 10L19 10L19 9L21 9L21 8L19 8L19 7L20 7L20 5L18 5L18 4L19 4L19 2L20 2L20 1L19 1L19 2L17 2L17 1ZM17 3L17 4L16 4L16 5L15 5L15 6L14 6L14 5L13 5L13 6L14 6L14 7L15 7L15 6L16 6L16 7L17 7L17 4L18 4L18 3ZM10 6L10 7L11 7L11 6ZM18 6L18 7L19 7L19 6ZM27 8L27 9L28 9L28 10L29 10L29 9L28 9L28 8ZM3 9L3 10L4 10L4 11L5 11L5 9ZM10 9L10 10L9 10L9 11L7 11L7 12L6 12L6 13L7 13L7 14L8 14L8 15L7 15L7 16L9 16L9 15L11 15L11 14L12 14L12 16L11 16L11 17L9 17L9 18L10 18L10 19L11 19L11 20L12 20L12 21L14 21L14 22L15 22L15 23L14 23L14 24L15 24L15 25L16 25L16 23L18 23L18 24L19 24L19 23L18 23L18 22L19 22L19 21L18 21L18 20L17 20L17 19L16 19L16 18L15 18L15 17L16 17L16 16L17 16L17 14L14 14L14 12L13 12L13 11L11 11L11 12L12 12L12 13L11 13L11 14L10 14L10 10L12 10L12 9ZM1 10L1 11L2 11L2 10ZM17 12L17 13L18 13L18 12ZM12 13L12 14L13 14L13 13ZM25 13L25 14L24 14L24 16L22 16L22 15L23 15L23 14L22 14L22 15L21 15L21 16L20 16L20 17L26 17L26 16L27 16L27 15L26 15L26 13ZM28 13L28 14L29 14L29 13ZM13 15L13 16L12 16L12 17L13 17L13 18L14 18L14 17L15 17L15 16L14 16L14 15ZM1 16L1 17L2 17L2 16ZM13 16L13 17L14 17L14 16ZM7 17L7 18L8 18L8 17ZM28 17L28 18L29 18L29 17ZM11 18L11 19L12 19L12 20L14 20L14 21L15 21L15 22L16 22L16 21L15 21L15 19L12 19L12 18ZM3 19L3 20L4 20L4 19ZM24 19L24 20L25 20L25 21L26 21L26 20L27 20L27 19ZM17 21L17 22L18 22L18 21ZM21 21L21 24L24 24L24 21ZM22 22L22 23L23 23L23 22ZM22 27L22 28L23 28L23 27ZM17 28L17 29L18 29L18 28ZM0 0L0 7L7 7L7 0ZM1 1L1 6L6 6L6 1ZM2 2L2 5L5 5L5 2ZM22 0L22 7L29 7L29 0ZM23 1L23 6L28 6L28 1ZM24 2L24 5L27 5L27 2ZM0 22L0 29L7 29L7 22ZM1 23L1 28L6 28L6 23ZM2 24L2 27L5 27L5 24Z"
                                fill="#000000" />
                        </g>
                    </g>
                </svg>

            </div>
        </div>
        <div class="table">
            <table>
                <tr>
                    <!--table heading-->
                    <th style="padding-left: 30px;">নাম</th>
                    <!--table Data -->
                    <td style="padding-left: 30px;"> {{ $share_account->m_name }}</td>
                </tr>

                <tr>
                    <th style="padding-left: 30px;"> হিসাব নাম্বার</th>
                    <!--table Data -->
                    <td style="padding-left: 30px;">{{ $share_account->account }}</td>
                </tr>
                <tr>
                    <th style="padding-left: 30px;">শেয়ার সংখ্যা</th>
                    <!--table Data -->
                    <td style="padding-left: 30px;">১০০ টাকা হারে (
                        {{ $share_account->share/100 }} টি )
                    </td>
                </tr>
                <tr>
                    <th style="padding-left: 30px;">শেয়ারের পরিমান</th>
                    <!--table Data -->
                    <td style="padding-left: 30px;"><strong> {{ $share_account->share }} টাকা</strong></td>
                </tr>
                <tr>
                    <th style="padding-left: 30px;"> প্রদানের তারিখ</th>
                    <!--table Data -->
                    <td style="padding-left: 30px;">সর্বশেষ আপডেট
                        : {{ $share_account->updated_at->format('Y-m-d') }}
                        | ইস্যু : {{ $share_account->updated_at->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <th style="padding-left: 30px; width: 30%;">নমিনির নাম</th>
                    <!--table Data -->
                    <td style="padding-left: 30px;"> {{ $share_account->n_name }}</td>
                </tr>
            </table>
            <div class="inform" style="padding-top: 10px">
                <p style="line-height: 1.8; padding:0 5px;">এই সার্টিফিকেট দ্বারা প্রতীয়মান হচ্ছে যে,
                    <b> ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি </b> তে <b>
                        {{ $share_account->m_name }} </b> এর উপরোক্ত তথ্য অনুযায়ী শেয়ার রয়েছে। উনি প্রতিষ্ঠানের নিয়ম
                    অনুযায়ী উক্ত শেয়ার হস্তান্তর করতে পারবেন এবং বছরান্তে পলিসি অনুযায়ী লভ্যাংশ প্রাপ্ত হবেন। শেয়ার
                    হোল্ডারের মৃত্যুতে তার নমীনি শেয়ার এর মালিক হবেন। আমরা উনার উজ্জ্বল ভবিষ্যৎ কামনা করছি।
                </p>
            </div>
            <div class="footar" style="width: 900px; text-align: center; margin-top: 60px;">
                <p
                    style="width: 50%; float: left; margin: 0 auto; text-decoration: overline; text-underline-offset: 2em;">
                    প্রতিষ্ঠান</p>
                <p style="width: 50%; float: left; margin: 0 auto; text-decoration: overline;">শেয়ার হোল্ডার</p>
            </div>
        </div>

    </page>
    <div class="row non-printable" style="width: 1000px; margin-left: auto; margin-right: auto">
        <div class="col text-left">
            <a href=""
                style="background-color: greenyellow; color: greenyellow"
                class="btn btn-outline-success btn-sm">Template 1</a>

        </div>
        <div class="col text-right">
            <a href="" class="btn btn-outline-success btn-sm"><i
                    class='fa fa-arrow-left'></i></a>

            <button class="btn btn-outline-primary btn-sm" id="btnSave" type="button"><i class='fa fa-photo'></i>
                Screen Shot</button>
            <button class="btn btn-outline-primary btn-sm" id="printbtn" onclick="window.print();" type="button"><i
                    class='fa fa-print'></i> Print</button>
        </div>
    </div>

    <script>
        // to canvas
        $('#btnSave').click(function(e) {
            html2canvas(page).then(function(canvas) {
                // canvas width
                var canvasWidth = canvas.width;
                // canvas height
                var canvasHeight = canvas.height;
                // convert canvas to image
                // $('.toPic').click(function(e) {
                //var img = Canvas2Image.convertToImage(canvas, canvasWidth, canvasHeight);
                //alert(img);
                // save
                // $('#save').click(function(e) {
                let type = $('#sel').val(); // image type
                let w = $('#imgW').val(); // image width
                let h = $('#imgH').val(); // image height
                let f = $('#imgFileName').val(); // file name
                w = canvasWidth;
                h = canvasHeight;
                // save as image
                Canvas2Image.saveAsImage(canvas, w, h, type, f);
                // });
                // });
            });
        });
    </script>

</body>

</html>
