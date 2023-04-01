@extends('layouts.frontend.app')
<style>
    .main {
        max-width: 505px;
        margin: auto;
        margin-top: 50px;
    }

    .card1 {
        background-image: url({{ asset('images/main.png') }});
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 252px;
        height: 400px;
        float: left;
        border-radius: 5px;
        box-sizing: border-box;
        box-shadow: 3px 2px 3px 2px rgba(182, 177, 177, 0.31);
    }

    .card2 {
        background-image: url({{ asset('images/blue_back1.png') }});
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 252px;
        height: 400px;
        float: right;
        border-radius: 5px;
        box-sizing: border-box;
        box-shadow: 3px 2px 3px 2px rgba(182, 177, 177, 0.31);
    }

    .img img {
        height: 110px;
        width: 110px;
        border-radius: 57px;
        margin: 63px 0px 2px 74px;
    }

    .name {
        margin: 17px 0px 0px 0px;

    }

    .name h2 {
        font-size: 22px;
        color: black;
        font-weight: 600;
        background: white;
        text-align: center;
        padding: 10px 0px 10px 0px;
    }

    .m_id p {
        margin: 14px 0px 0px 0px;
        text-align: center;
        font-size: 13px;
        font-weight: 400;
        font-family: Verdana;
    }

    .qrcode img {
        height: 90px;
        width: 90px;
        margin: 16px 0px 2px 81px;
    }

    .office_name h2 {
        font-size: 17px;
        color: white;
        font-weight: 400;
        text-align: center;
        padding: 31px 0px 0px 0px;
    }

    .hr {
        border: 1px solid white;
        width: 87%;
    }

    .Id_logo img {
        height: 111px;
        width: 103px;
        margin: 35px 0px 2px 81px;
    }

    .contact_number h3 {
        font-size: 15px;
        font-weight: 600;
        display: inline-block;
        padding: 50px 0px 0px 14px;
        color: black;

    }

    .contact_number span {
        float: right;
        font-size: 15px;
        font-weight: 600;
        display: inline-block;
        padding: 47px 17px 0px 0px;
        color: black;

    }

    .card_address p {
        font-size: 12px;
        text-align: center;
        padding-top: 11px;
    }

    .arrow_button {
        margin-bottom: 33px;
        margin-left: 203px;
    }

    .arrow_button a {
        background: white;
        padding: 2px 7px 4px 7px;
        border-radius: 3px;
        color: #5f06ff;
        border: 1px solid #5f06ff;

    }

    .arrow_button a:hover {
        background: #5f06ff;
        padding: 2px 7px 4px 7px;
        border-radius: 3px;
        color: white;

    }

    .print_button {
        background: white;
        padding: 2px 12px 4px 16px;
        border-radius: 3px;
        color: #5f06ff;
        border: 1px solid #5f06ff;
        text-decoration: none;
    }

    .print_button:hover {
        background: #5f06ff;
        padding: 2px 12px 4px 16px;
        border-radius: 3px;
        color: white;
        text-decoration: none;
    }
</style>
@section('content')
    <div class="main">
        <div class="arrow_button">
            <a href="{{ route('members.index') }}"><i class="fas fa-arrow-left"></i></a>
            {{-- <a class="print_button" href=""><i class="fas fa-print"></i> Print </a> --}}
            <input class="btn btn-primary" id="printpagebutton" type="button" value="Print" onclick="printpage()" />
        </div>

        <div class="card1">
            <div class="img">
                <img src="{{ asset($member->photo) }}" alt="">
            </div>

            <div class="name">
                <h2>{{ $member->m_name }}</h2>
            </div>

            <div class="m_id">
                <p>Member Id : {{ $member->account }}</p>
            </div>

            <div class="qrcode">
                <img src="{{ asset($member->photo) }}" alt="">
            </div>
        </div>
        <div class="card2">

            <div class="office_name">
                <h2>ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h2>
            </div>

            <hr class="hr">

            <div class="Id_logo">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </div>

            <div class="contact_number">
                <h3><i class="fas fa-phone-alt"></i>{{ $member->m_mobile }}</h3>
                <span><i class="fas fa-phone-alt"></i>{{ $member->m_mobile }}</span>
            </div>

            <div class="card_address">
                <p>৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
            </div>

        </div>
        <br>
        <br>
        <br>
        <div class="text-center mt-5" >Powered By ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</div>
    </div>
    </div>

    <script>
        function printpage() {
            //Get the print button and put it into a variable
            var printButton = document.getElementById("printpagebutton");
            //Set the print button visibility to 'hidden'
            printButton.style.visibility = 'hidden';
            //Print the page content
            window.print()
            printButton.style.visibility = 'visible';
        }
    </script>
    <div id="options">

    </div>
@endsection
