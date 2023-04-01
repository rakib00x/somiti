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

                        <div class="element-box">


                            <form method="POST" action="{{ route('cc_closing.store') }}"
                                accept-charset="UTF-8" note="Are you sure about all information and amount are OK?">
                                @csrf

                                <input type="hidden" name="cc_loan_id" value="{{ $cc_loan->id }}">
                                <input type="hidden" name="account_id" value="{{ $member->account }}">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="closing_date" class="col-form-label col-sm-4">Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="No need to select date for Today" name="closing_date"
                                                    type="date" id="closing_date">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="start_date" class="col-form-label col-sm-4">Distribute Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="No need to select date for Today" disabled=""
                                                    name="start_date" type="date" value="{{ $cc_loan->created_at->format('Y-m-d') }}" id="start_date">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="amount" class="col-form-label col-sm-4">Invest Amount</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Loan amount (given)"
                                                    disabled="" name="amount" type="number" value="{{ $cc_loan->loan_amount }}"
                                                    id="amount">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4">Profit Generated</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control text-center" name="get_profit"
                                                    value="{{ $cc_loan->profit_amount }}" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4">Profit Due</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control text-center" id="profit_due"
                                                    name="profit_due" value="{{ $cc_loan->due_cc_loan_profit_amount }}" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="end_date" class="col-form-label col-sm-4">Expire Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="No need to select date for Today" disabled=""
                                                    name="end_date" type="date" value="{{ $cc_loan->expire_date  }}" id="end_date">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="monthly_profit"
                                                class="col-form-label col-sm-4">Installment</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Installment Amount"
                                                    readonly="" name="monthly_profit" type="number" value="{{ $cc_loan->installment_amount }}"
                                                    id="monthly_profit">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="profit" class="col-form-label col-sm-4"> Discount</label>

                                            <div class="col-sm-8">
                                                <input id="installment_discount_value" class="form-control text-center"
                                                    placeholder="Discount Amount"  name="discount_value"
                                                    type="number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="note" class="col-form-label col-sm-4">Note</label>
                                            <div class="col-sm-8">
                                                <textarea name="note" value="" class="form-control text-center" placeholder="Note Of Installment."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="paid_profit" class="col-form-label col-sm-4">Profit Paid</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Installment Amount"
                                                    readonly="" name="paid_profit" type="number" value="{{ $cc_loan->cc_loan_paid_profit }}"
                                                    id="paid_profit">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fine" class="col-form-label col-sm-4">Fine</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="Total need to pay back" name="fine" type="number"
                                                     id="fine">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 readonly">Total Return</label>
                                            <div class="col-sm-8">
                                                <input type="text"
                                                    class="form-control text-center mainAmount "
                                                    id="installment_total_return" name="total_return" value="{{ $cc_loan->total_return }}">
                                              
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <input class="btn btn-primary btn-lg w-50" id="submit" type="submit"
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
        document.getElementById('closing_date').valueAsDate = new Date();
    </script>
@endsection
