@extends('layouts.frontend.app')
@section('content')
    <body class="menu-position-top with-content-panel">

    <div class="all-wrapper" id="printArea">
        <div class="layout-w">
            <div class="content-box" >
                <div class="row d-none d-sm-block " style="padding: 15px 0;">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3" style="width: 20%">
                                <img style="display: block; margin: auto; padding-left: 15px;" alt="LOGO"
                                    src="{{ asset('images/logo.png') }}" height="60">
                            </div>

                            <div class="col-sm-6 text-center" style="width: 60%">
                                <div style="font-weight: bolder; font-size: 24px; line-height: 24px">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ
                                </div>
                                {{-- <div>বেকারত্ব আর দারিদ্রের দুর্বিপাকে কর্মমুখী করবো মোরা জগৎটাকে</div> --}}
                                <div style="font-size: 14px">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</div>
                                <div style="font-size: 12px">
                                    <i class="fa fa-phone"></i>  01911904312, 01701298350
                                    <i class="fa fa-envelope"></i> bluestar261k@gmail.com
                                    <i class="fa fa-globe"></i>bluestarsomithi.com
                                </div>
                            </div>
                            <div class="col-sm-3 text-right" style="width: 10%">

                                <input id="backbtn" type="button" value="Go Back" onclick="history.back(-1)" />



                                <input id="printbtn" type="button" value="Print" onclick="window.print();">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="style-seven row d-none d-sm-block">
                
                <div class="row">
                    <div style="width: 100%;">
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="element-header text-center" style="font-family: Arial, Helvetica, sans-serif">
                                    

                                    <?php 
                                        $start_date = date_create($start_date);
                                        $end_date = date_create($end_date);
                                        echo 'Admission Register '.date_format($start_date,"d M Y").' to '.date_format($end_date,"d M Y");
                                    ?>
                                    
                                </h6>

                                <!--------------------START - Table with actions-------------------->
                                <div class="table-responsive">


                                    <table class="table table-bordered table-v2 table-striped table-sm">
                                        <thead class="text-center">
                                            <tr>
                                                <th>SL</th>
                                                <th>Account No</th>
                                                <th>Member Name</th>
                                                <th>Area</th>
                                                <th>Address</th>
                                                <th>Mobile</th>
                                                <th>Father / Mother</th>
                                                <th>Joining Date</th>
                                                <th>Admission Fee</th>
                                                <th>member.form_fee</th>

                                                <th>Process by</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($members as $member)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $member->account }}</td>
                                                <td>{{ $member->m_name }}</td>
                                                <td>{{ $member->area->name }}</td>
                                                <td>{{ $member->address }}</td>
                                                <td>{{ $member->m_mobile }}</td>
                                                <td>{{ $member->m_father }} {{ ($member->m_father && $member->m_mother)? '/':'' }} {{ $member->m_mother }}</td>
                                                <td>{{ $member->join? custom_date_format($member->join) : custom_date_format($member->created_at) }}</td>
                                                <td>{{ $member->admission_fee }}</td>
                                                <td>{{ $member->form_fee }}</td>
                                                <td>{{ $member->processed_by }}</td>

                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    {{-- <table class="col-sm-12">
                        <tbody>
                            <tr style="border: 0px; font-weight: bold">
                                <td><br><br>Prepared by</td>
                                <td class="text-center"><br><br>Verified by</td>
                                <td class="text-right"><br><br>Approved by</td>
                            </tr>

                        </tbody>
                    </table> --}}
                </div>
                <br>
                <br>

                <style type="text/css">
                    @media print {
                        #backbtn, #printbtn {
                            display: none;

                        }
                    }
                </style>

            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $("body").attr('background', false).css('background', false);
        })
    </script>
    </body>
@endsection
