@extends('layouts.frontend.app', ['pageTitle' => 'CC Inst. Collection'])
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="row border">
                                <div class="col-sm-9 border" style="background: #ddc1f553">
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

                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center" style="background: #4284c371 ">
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
                        <h6 class="element-header text-center" style="margin-bottom: 16px;">CC Profit Installment Collection
                            Form</h6>
                        <div class="element-box">
                            <form method="POST" action="{{ route('ccinst.collection.store') }}" accept-charset="UTF-8"
                                note="Are you sure about all information and amount are OK?">
                                @csrf

                                <input type="hidden" name="account_id" value="{{ $member->account }}">
                                <input type="hidden" name="cc_loan_id" value="{{ $cc_loan->id }}">
                                <div class="row">
                                    <div class="col-sm-6">

                                        <div class="form-group row">
                                            <label for="date" class="col-form-label col-sm-4">Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" name="date" id="installment_date"
                                                    class="form-control text-center">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="main_balance" class="col-form-label col-sm-4">Invest Amount</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Loan amount (given)"
                                                    readonly name="main_balance" type="number"
                                                    value="{{ $cc_loan->loan_amount }}" id="main_balance">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                                    <div class="col-sm-8">
                                                    <input class="form-control text-center" placeholder="Installment sequence" disabled name="get_profite" type="number" value="800">
                                                    </div>
                                                    </div> -->
                                        <div class="form-group row">
                                            <label for="get_profit" class="col-sm-4">Profit Generated</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" readonly name="get_profit"
                                                    type="text" value="{{ $cc_loan->profit_amount }}" id="get_profit">
                                            </div>


                                        </div>
                                        <div class="form-group row">
                                            <label for="profit_due" class="col-sm-4">Profit Due</label>
                                            <div class="col-sm-8">
                                                <input id="profit_due" class="form-control text-center" readonly
                                                    name="profit_due" type="text"
                                                    value="{{ $cc_loan->due_cc_loan_profit_amount }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="note" class="col-form-label col-sm-4">Note</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control text-center" placeholder="Note Of Installment." rows="1" name="note"
                                                    cols="50" id="note"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="monthly_profit" class="col-form-label col-sm-4">Installment</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Installment amount"
                                                    readonly name="monthly_profit" type="number"
                                                    value="{{ $cc_loan->profit_amount }}" id="monthly_profit">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="passed_sequence" class="col-form-label col-sm-4">Passed
                                                Sequence</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Installment amount"
                                                    readonly name="passed_sequence" type="number"
                                                    value="{{ $cc_loan->cc_loan_installment_no }}" id="passed_sequence">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="paid_profit" class="col-form-label col-sm-4">Profit Paid</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Installment amount"
                                                    readonly name="paid_profit" type="number"
                                                    value="{{ $cc_loan->cc_loan_paid_profit }}" id="paid_profit">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="todays_profit" class="col-form-label col-sm-4">Todays
                                                Profit</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" id="todays_profit"
                                                    placeholder="Total need to pay back"
                                                    max="{{ $cc_loan->due_cc_loan_profit_amount }}" name="todays_profit"
                                                    type="number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="penalty" class="col-form-label col-sm-4">Penalty</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Input penalty amount"
                                                    name="penalty" type="number"
                                                    value="{{ $months_passed > 0 ? $months_passed * $cc_loan->panalty_amount : '' }}"
                                                    id="penalty">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="main_balance_return" class="col-form-label col-sm-4">Main Balance
                                                Return</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center mainAmount" min="0"
                                                    max="{{ $cc_loan->loan_amount }}" name="main_balance_return"
                                                    type="number" id="main_balance_return">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <input class="btn btn-primary btn-lg btn-block" id="submit" type="submit"
                                            value="Submit">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="display-type"></div>


    <script>
        document.getElementById('installment_date').valueAsDate = new Date();
    </script>
@endsection
