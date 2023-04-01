@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-8 offset-2">
                        <div class="element-box">
                            <h1 class="text-center font-weight-light mb-4">{{__('')}}Deposit to Current Account</h1>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-4 justify-content-center d-flex border">
                                            <table class="table table-sm table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>{{__('Account')}}</td>
                                                        <td>:</td>
                                                        <td>{{$CurrentAccount->account_id}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('Area')}}</td>
                                                        <td>:</td>
                                                        <td>{{$CurrentAccount->members->area->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('Name')}}</td>
                                                        <td>:</td>
                                                        <td>{{$CurrentAccount->members->m_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('Address')}}</td>
                                                        <td>:</td>
                                                        <td>{{ $CurrentAccount->members->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('Phone')}}</td>
                                                        <td>:</td>
                                                        <td>{{$CurrentAccount->members->m_mobile}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-8 border">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="POST" action="{{ route('current-account.store') }}" accept-charset="UTF-8" note="Close FDR account by withdraw (Saving amount + Profit)">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-6">
                                                                        <label for="date" class="col-form-label">{{__('Date')}}</label>
                                                                        <input class="form-control text-center" placeholder="FDR opening date" name="date" type="date" value="{{ date('Y-m-d') }}" id="datefield">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="account" class="col-form-label">{{__('Target Amount')}}</label>
                                                                        <input class="form-control text-center" placeholder="FDR opening account" readonly  value="{{ $CurrentAccount->amount }}" id="amount">

                                                                        <input class="form-control text-center" placeholder="FDR opening account" readonly name="account" type="hidden" value="{{ old('account', $CurrentAccount->account_id) }}" id="account">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-6">
                                                                        <label for="deposit_amount" class="col-form-label">{{__('Deposit Amount')}}</label>
                                                                        <input class="form-control text-center" placeholder="Deposit amount" name="deposit_amount" type="number" value="{{ old('deposit_amount') }}" id="deposit_amount">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="withdraw" class="col-form-label">&nbsp;</label>
                                                                        {{-- <input class="form-control text-center" placeholder="FDR opening withdraw" name="withdraw" type="withdraw" value="{{ old('withdraw') }}" id="withdraw"> --}}
                                                                        <input class="btn btn-success col-md-12" type="submit" value="Submit">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-sm-3 text-center" style="background: #D5D543 ">
                                    <img id="photoF" src="" style="max-height:180px; max-width:300px;" class="text-center">
                                    <img id="signatureF" src="" style="max-height:180px; max-width:300px; display: none;" class="text-center">
                                </div> --}}
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
            </div>
        </div>
    </div>

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
        });

        // future date disable
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
        dd = '0' + dd
        }
        if (mm < 10) {
        mm = '0' + mm
        }

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("datefield").setAttribute("max", today);
    </script>

@endsection
