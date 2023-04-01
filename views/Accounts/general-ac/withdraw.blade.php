@extends('layouts.frontend.app')

@push('stylesheet')
    <style>
        .mainAmount {
            font-style: normal;
            font-size: 36px;
            font-weight: bold;
            color: green;
            padding: 0 12px !important;
        }
    </style>
@endpush

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="row border">
                                <div class="col-sm-9 border">
                                    <table class="table table-sm table-striped ">
                                        <tbody>
                                            <tr>
                                                <td>{{ __('Account') }}</td>
                                                <td>{{ $member->account }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Area') }}</td>
                                                <td colspan="4">{{ $member->area->name }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Name') }}</td>
                                                <td colspan="4">{{ $member->m_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Address') }}</td>
                                                <td colspan="4">{{ $member->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Phone') }}</td>
                                                <td>{{ $member->m_mobile }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center">
                                    <img id="photoF" src="{{ asset($member->photo) }}"
                                        style="max-height: 180px; max-width: 300px;" class="text-center">
                                    <img id="signatureF" src="{{ asset('storage/uploads/members/' . $member->signature) }}"
                                        style="max-height: 180px; max-width: 300px; display: none;" class="text-center">
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
                        <h6 class="element-header">
                            <form method="POST" action="{{ route('general-ac.withdraw', $member->account) }}"
                                accept-charset="UTF-8" note="Are you agree for withdraw desire amount?">
                                @csrf
                                <input type="hidden" name="account" value="{{ $member->account }}">

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="date_fix"></label>
                                            <label for="date" id="datefix"
                                                class="col-form-label col-sm-4">{{ __('Date') }}</label>
                                            <div class="col-sm-8">
                                                <div class="input-group date">
                                                    <input type="date" name="date" id="datefield" class="form-control text-center"
                                                        value="{{ date('Y-m-d') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="balance"
                                                class="col-form-label col-sm-4">{{ __('Generel A/C Balance') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" step="any"
                                                    placeholder="Something error. Please refresh page" disabled=""
                                                    name="balance" type="number" value="{{ $member->ac_balance }}"
                                                    id="balance">
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <label for="regular_savings"
                                                class="col-form-label col-sm-4">{{ __('Loan Due') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" step="any"
                                                    placeholder="Something error. Please refresh page" disabled=""
                                                    name="regular_savings" type="number"
                                                    value="{{ $member->loans->sum('loan_amount') }}" id="regular_savings">
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <label for="withdraw"
                                                class="col-form-label col-sm-4"><strong>{{ __('Todays withdraw') }}</strong></label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center mainAmount" step="any"
                                                    required="" autofocus="" name="withdraw" type="number"
                                                    id="withdraw" max="{{ $member->ac_balance }}" min="10">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="get_profit"
                                                class="col-form-label col-sm-4">{{ __('') }}Profit (% or
                                                flat)</label>
                                            <div class="col-sm-4">
                                                <div class="input-group">
                                                    <input class="form-control text-center" placeholder="Percentage"
                                                        name="profit_percent" type="number" value=""
                                                        id="profit_percent" step="any">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group">
                                                    <input class="form-control text-center" placeholder="Amount"
                                                        name="profit_amount" type="number" value=""
                                                        id="profit_amount" step="any">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">{{ __('TK') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="withdraw_total"
                                                class="col-form-label col-sm-4">{{ __('') }}Total&nbsp;Withdraw</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" id="withdraw_total"
                                                    step="any" placeholder="Amount for Withdraw" required=""
                                                    autofocus="" readonly="" name="withdraw_total" type="number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="note"
                                                class="col-form-label col-sm-4">{{ __('Details') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Withdraw notes"
                                                    name="note" type="text" id="note">
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
                                            <div class="col-sm-12">
                                                <input class="btn btn-primary" style="width: 100%" type="submit"
                                                    value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3"></div>
                                </div>
                            </form>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#withdraw").bind("keyup change", function() {
            var withdraw = parseInt($("#withdraw").val());
            var amount = parseInt($("#profit_amount").val());
            $("#withdraw_total").val(withdraw + amount);
        });
        $("#profit_percent").bind("keyup change", function() {
            var balance = parseInt($("#balance").val());
            var withdraw = parseInt($("#withdraw").val());
            var profit_percent = parseInt($("#profit_percent").val());

            var amount = parseInt(balance * profit_percent * .01);
            $("#profit_amount").val(amount);
            $("#withdraw_total").val(withdraw + amount);
        });
        $("#profit_amount").bind("keyup change", function() {
            var profit_percent = $("#profit_percent").val('');

            var withdraw = parseInt($("#withdraw").val());
            var amount = parseInt($("#profit_amount").val());
            $("#withdraw_total").val(withdraw + amount);
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
