@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="row border">
                                <div class="col-sm-9 border" style="background: #DDC1F5">
                                    <table class="table table-sm table-striped ">
                                        <tbody>
                                            <tr>
                                                <td>Account</td>
                                                <td>{{ $member->account }}</td>
                                            </tr>

                                            <tr>
                                                <td>Passbook</td>
                                                <td>
                                                    100 | 500
                                                    (<small>2022-10-16 | 2022-09-17</small>)
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Area</td>
                                                <td colspan="4">{{ $member->area->name }}</td>
                                            </tr>

                                            <tr>
                                                <td>Name</td>

                                                <td colspan="4">{{ $member->m_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Parents</td>
                                                <td>
                                                    {{ $member->m_father }} /
                                                    {{ $member->m_mother }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Wife</td>
                                                <td colspan="4">{{ $member->m_companion ?? 'No Data Found' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td colspan="4">{{ $member->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile</td>
                                                <td>
                                                    <a href="tel:{{ $member->m_mobile }}">
                                                        {{ $member->m_mobile }}
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Account Types</td>
                                                <td>
                                                    <table class="">
                                                        <tbody>
                                                            <tr>
                                                                <td>GA</td>
                                                                <td>LOAN</td>
                                                                <td>DPS</td>
                                                                <td>FDR</td>
                                                                <td>CC</td>
                                                                <td>CA</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    @if ($member->generalAccount()->count()> 0)
                                                                    <i class="fa fa-check text-success"></i>
                                                                    @else
                                                                    <i class="fa fa-times text-danger"></i>

                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($member->loans()->count()> 0)
                                                                    <i class="fa fa-check text-success"></i>
                                                                    @else
                                                                    <i class="fa fa-times text-danger"></i>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($member->dps()->count()> 0)
                                                                    <i class="fa fa-check text-success"></i>
                                                                    @else
                                                                    <i class="fa fa-times text-danger"></i>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($member->fdr()->count()> 0)
                                                                    <i class="fa fa-check text-success"></i>
                                                                    @else
                                                                    <i class="fa fa-times text-danger"></i>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($member->cc_loans()->count()> 0)
                                                                    <i class="fa fa-check text-success"></i>
                                                                    @else
                                                                    <i class="fa fa-times text-danger"></i>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($member->currentAccount()->count()> 0)
                                                                    <i class="fa fa-check text-success"></i>
                                                                    @else
                                                                    <i class="fa fa-times text-danger"></i>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                        
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center" style="background: #D5D543 ">
                                    <img id="photoF" src="{{ asset($member->m_photo) }}" style="max-height:180px; max-width:300px;"
                                        class="text-center">
                                    <img id="signatureF" src="{{ asset($member->m_signature) }}"
                                        style="max-height:180px; max-width:300px; display: none;" class="text-center">
                                </div>
                                <script>
                                    $("#photoF").dblclick(function() {
                                        $("#photoF").hide().delay(5000).fadeIn();
                                        $("#signatureF").show().delay(4500).fadeOut();
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container">


                    <div class="row">
                        <div class="col-sm">
                            <a class="element-box el-tablo" style="background: #1334eb" href="#">
                                <div class="label">Share Balance</div>
                                <div class="text-center custom">0 ৳</div>
                            </a>
                        </div>

                        <div class="col-sm">
                            <a class="element-box el-tablo" style="background: #005f10" href="#">
                                <div class="label">General Savings</div>
                                <div class="text-center custom">148,779 ৳</div>
                            </a>
                        </div>

                        <div class="col-sm">
                            <a class="element-box el-tablo" style="background: #b822fd" href="#">
                                <div class="label">Monthly Savings ( 0 Accounts )</div>
                                <div class="text-center custom"> 0 ৳ </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <a class="element-box el-tablo" style="background: rgb(240, 34, 34)" href="#">
                                <div class="label">Loan Due</div>
                                <div class="text-center custom"> 0 ৳</div>
                            </a>
                        </div>


                        <div class="col-sm">
                            <a class="element-box el-tablo" style="background: #503104" href="#">
                                <div class="label">FDR Balance</div>
                                <div class="text-center custom">150,000 ৳</div>
                            </a>
                        </div>

                        <div class="col-sm">
                            <a class="element-box el-tablo" style="background: #f123b4" href="#">
                                <div class="label">CC Loan</div>
                                <div class="text-center custom">35,000 ৳</div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="display-type"></div>

    <style>
        .element_custom{

            color:white;
            transition: .2s;
            border-radius: 10px;
            padding: 20px;
        }

        .element_custom:hover{
            transform: translate(0px, -5px) scale(1.03);
            cursor: pointer;
        }


    </style>
@endsection
