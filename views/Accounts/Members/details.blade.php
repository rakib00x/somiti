@extends('layouts.frontend.app')
@section('content')
    <style>
        .card{
            background-color: #1334eb;

        }

        .card-header h3{
            text-align: center;
            padding-bottom: 9px;
            border-bottom: 2px solid #f2f4f8;
            color: #f2f4f8;
            font-size: 15px;
            text-transform: uppercase;
            font-weight: 600;
        }
        .card-header .balance{
            font-size: 30px !important;
            font-weight: bold;
            color: aliceblue;
        }
    </style>


    <div class="all-wrapper">
        <div class="layout-w">
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
                                                            N/A
                                                            (<small></small>)
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
                                                            {{ $member->m_mother }} /
                                                            {{ $member->m_father }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Wife/Husband</td>
                                                        @if ($member->m_companion !=null)
                                                        <td>{{ $member->m_companion }}</td>
                                                        @else
                                                        <td>No data found</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td colspan="4">{{ $member->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile</td>
                                                        <td>
                                                            <a href="{{ $member->m_mobile }}">
                                                                {{ $member->m_mobile }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-3 text-center" style="background: #D5D543 ">
                                            <img id="photoF" src="{{ asset('storage/uploads/members/' . $member->m_photo) }}"
                                                style="max-height:180px; max-width:300px;" class="text-center">
                                            <img id="signatureF" src="{{ asset('storage/uploads/members/' . $member->m_photo) }}"
                                                style="max-height:180px; max-width:300px; display: none;"
                                                class="text-center">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Share Balance</h3>
                                        <h4 class="balance text-center">{{ $member->share ?? '0' }} ৳</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="card" style="background-color: #005f10;">
                                    <div class="card-header">
                                        <h3>General Savings</h3>
                                        <h4 class="balance text-center">{{ $member->ac_balance ?? '0' }} ৳</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="card" style="background-color: #b822fd;">
                                    <div class="card-header">
                                        <h3>Dps</h3>
                                        <h4 class="balance text-center"> {{ $member->current_dps_balance ?? '0' }} ৳</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="card" style="background-color: rgb(240, 34, 34);">
                                    <div class="card-header">
                                        <h3>Loan Due</h3>
                                        <h4 class="balance text-center">{{ $member->due_loan_amount }} ৳</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="card" style="background-color: #503104;">
                                    <div class="card-header">
                                        <h3> Fdr Balance</h3>
                                        <h4 class="balance text-center">{{ $member->fdr_balance->amount ?? '0' }} ৳</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="card" style="background-color: #f123b4;">
                                    <div class="card-header">
                                        <h3>cc loan</h3>
                                        <h4 class="balance text-center">0 ৳</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
