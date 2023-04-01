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
                                            <td>{{ $member->account }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{__('Area')}}</td>
                                            <td colspan="4">{{ $member->area->name }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{__('Name')}}</td>
                                            <td colspan="4">{{ $member->m_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('Address')}}</td>
                                            <td colspan="4">{{ $member->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('Phone')}}</td>
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
                    <h6 class="element-header text-center">
                        <form method="POST"
                            action="{{ route('general.account.store', $member->id) }}" accept-charset="UTF-8" note="Are you agree for deposit desire amount?">
                            @csrf
                            <input type="hidden" name="account" value="{{ $member->account }}">

                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="date" id="datefix" class="col-form-label col-sm-4">{{__('Date')}}</label>
                                        <div class="col-sm-8">
                                            <div class="input-group date">
                                                <input type="date" name="date" id="datefield" class="form-control text-center" value="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="target_amount" class="col-form-label col-sm-4">{{__('Target Amount')}}</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" name="target_amount" id="target_amount" class="form-control text-center" placeholder="Target Amount">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="account_type" class="col-form-label col-sm-4">{{__('Account Type')}}</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <select name="account_type" id="account_type" class="form-control text-center">
                                                    <option value="">-Select-</option>
                                                    <option value="daily">Daily</option>
                                                    <option value="weekly">Weekly</option>
                                                    <option value="monthly">Monthly</option>
                                                    <option value="yearly">Yearly</option>
                                                </select>
                                            </div>
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
