@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <h3 class="heading_title">Withdraw Application Form</h3>
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
                                                    @if ($member->m_father || $member->m_mother)
                                                        {{ $member->m_father }} /
                                                        {{ $member->m_mother }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td colspan="4">
                                                    {{ $member->address }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mobile</td>
                                                <td>
                                                    <a href="#{{ $member->m_mobile }}">
                                                        {{ $member->m_mobile }}
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center" style="background: #D5D543 ">
                                    <img id="photoF" src="" style="max-height:180px; max-width:300px;"
                                        class="text-center">
                                    <img id="signatureF" src=""
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
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="element-header text-center" style="margin-bottom: 16px;">Withdraw Request</h6>
                        <div class="element-box">
                            <form method="POST" action="{{ route('withdraw.application.store') }}">
                                @csrf
                                <input type="hidden" name="account_id" value="{{ $member->account }}">
                                <input type="hidden" name="id" value="{{ $account->id }}">
                                @if ($type == 'fdr')
                                    <input type="hidden" name="previous_profit_rate" value="{{ $account->percent }}">
                                @endif
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="balance" class="col-form-label col-sm-4">Balance</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="balance" class="form-control text-center"
                                                    readonly="" value="{{ $main_balance }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="balance" class="col-form-label col-sm-4">Account Type</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="account_type" class="form-control text-center"
                                                    readonly="" value="{{ $type }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="note" class="col-form-label col-sm-4">Expected Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="WR notes"
                                                    name="expected_date" type="date" required value="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="deposit" class="col-form-label col-sm-4">Withdrawal Amount</label>
                                            <div class="col-sm-8">
                                                <input type="number" name="withdraw_amount" class="form-control text-center" required min="1" max="{{ $main_balance }}">
                                            </div>
                                        </div>

                                        @if ($type == 'fdr')
                                            <div class="form-group row">
                                                <label for="deposit" class="col-form-label col-sm-4">New Profit Rate %</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="new_profit_rate" class="form-control text-center" required min="0" value="{{ $account->percent }}">
                                                </div>
                                            </div>
                                        @endif

                                        <div class="form-group row">
                                            <label for="note" class="col-form-label col-sm-4">Note</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="WR notes"
                                                    name="member_note" type="text">
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-sm-6"></div>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <input class="btn btn-primary btn-block" type="submit" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="display-type"></div>
@endsection
