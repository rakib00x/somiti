@extends('layouts.frontend.app')

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
                                            <td>{{__('Account')}}</td>
                                            <td>{{ $generalac->account_id }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{__('Area')}}</td>
                                            <td colspan="4">{{ $generalac->members->area->name }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{__('Name')}}</td>
                                            <td colspan="4">{{ $generalac->members->m_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('Address')}}</td>
                                            <td colspan="4">{{ $generalac->members->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('Phone')}}</td>
                                            <td>{{ $generalac->members->m_mobile }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-3 text-center">
                                <img id="photoF" src="{{ asset($generalac->members->photo) }}"
                                    style="max-height: 180px; max-width: 300px;" class="text-center">
                                <img id="signatureF" src="{{ asset('storage/uploads/members/' . $generalac->members->signature) }}"
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
                    <h6 class="element-header text-center">
                        <form method="POST"
                            action="{{ route('general-ac.deposit', $generalac->account_id) }}" accept-charset="UTF-8" note="Are you agree for deposit desire amount?">
                            @csrf
                            <input type="hidden" name="account" value="{{ $generalac->account_id }}">

                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="date_fix"></label>
                                        <!-- <input type="date" name="date" id="date_fix" class="col-form-label col-sm-4"> -->
                                        <label for="date" id="datefix" class="col-form-label col-sm-4">{{__('Date')}}</label>
                                        <div class="col-sm-8">
                                            <div class="input-group date">
                                                <input type="date" name="date" id="datefield" class="form-control text-center" value="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="balance" class="col-form-label col-sm-4">{{__('General Ac Saving Balance')}}</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" step="any"
                                                placeholder="Something error. Please refresh page" disabled=""
                                                name="balance" type="number" value="{{ $generalac->members->ac_balance }}" id="balance">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="regular_savings" class="col-form-label col-sm-4">{{__('Regular
                                            Target')}}</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" step="any"
                                                placeholder="Something error. Please refresh page" disabled=""
                                                name="regular_savings" type="number" value="{{ $generalac->target_amount }}" id="regular_savings">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="deposit" class="col-form-label col-sm-4">{{__('Todays Deposit')}}</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center mainAmount" step="any" required=""
                                                autofocus="" name="deposit" type="number" id="deposit">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="note" class="col-form-label col-sm-4">{{__('Details')}}</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Deposit notes"
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
<script>
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
