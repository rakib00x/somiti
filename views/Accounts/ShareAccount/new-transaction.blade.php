@extends('layouts.frontend.app')
<style>
    .member_info tr td {
        color: white;
    }
</style>
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="row border">
                                <div class="col-sm-9 border" style="background: #7E69C8">
                                    <table class="table table-sm table-striped ">
                                        <tbody class="member_info">
                                            <tr>
                                                <td>Account</td>
                                                <td>{{ $share_account->account }}</td>
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
                                                <td colspan="4">{{ $share_account->area->name }}</td>
                                            </tr>

                                            <tr>
                                                <td>Name</td>

                                                <td colspan="4">{{ $share_account->m_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Parents</td>
                                                <td>
                                                    {{ $share_account->m_father ?? null }} /
                                                    {{ $share_account->m_mother ?? null }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td colspan="4">{{ $share_account->Village->title ?? null }},
                                                    {{ $share_account->PostOffice->title ?? null }},
                                                    {{ $share_account->SubDistrict->title ?? null }},
                                                    {{ $share_account->district->title ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile</td>
                                                <td>
                                                    <a>
                                                        {{ $share_account->m_mobile }}
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Member Type</td>
                                                <td>daily</td>
                                            </tr>

                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center" style="background: #4654A0 ">
                                    <img id="photoF" src="{{ asset($share_account->photo) }}"
                                        style="max-height:180px; max-width:300px;" class="text-center">
                                    <img id="signatureF" src="{{ asset($share_account->photo) }}"
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

                    <div class="col-sm-12">
                        <h6 class="element-header text-center" style="margin-bottom: 16px;">Share Transaction form</h6>
                        <div class="element-box">
                            <form method="POST" action="{{ route('transaction.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">
                                        <input type="hidden" name='share_account_id' value={{ $share_account->id }}>
                                        <div class="form-group row">
                                            <label for="date" class="col-form-label col-sm-4">Date</label>
                                            <div class="col-sm-8">
                                                <input type='date' id="date" name="date" class="form-control text-center" />
                                                @error('date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="balance" class="col-form-label col-sm-4">Share Balance</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" disabled type="text" name="share_balance" value="{{ $share_account->share }}  ({{ $share_account->share/100 }})">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="transaction_type" class="col-form-label col-sm-4">Transaction type</label>
                                            <div class="col-sm-8">
                                                <select class="form-control text-center" id="type"
                                                    name="transaction_type">
                                                    <option selected="selected" value="">Select transaction type
                                                    </option>
                                                    <option value="Purchase">Purchase Share</option>
                                                    <option value="Sale">Sale Share</option>
                                                </select>
                                                @error('transaction_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="amount" class="col-form-label col-sm-4">Amount</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center mainAmount" autofocus name="amount" type="number" id="amount">
                                                @error('amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="note" class="col-form-label col-sm-4">Details</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" name="details" type="text" id="note">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3"></div>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5"></div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-6 text-center">
                                                <input class="btn btn-primary btn-block" type="submit" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var input = document.getElementById("date");
        var today = new Date();
        var day = today.getDate();

        // Set month to string to add leading 0
        var mon = new String(today.getMonth()+1); //January is 0!
        var yr = today.getFullYear();

            if(mon.length < 2) { mon = "0" + mon; }

            var date = new String( yr + '-' + mon + '-' + day );

        input.disabled = false;
        input.setAttribute('max', date);
    </script>
@endsection




