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
                                                <td>Account</td>
                                                <td>1</td>
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
                                                <td colspan="4">Uttara Sector 5</td>
                                            </tr>

                                            <tr>
                                                <td>Name</td>

                                                <td colspan="4">মোঃ আরিফ হোসেন</td>
                                            </tr>
                                            <tr>
                                                <td>Parents</td>
                                                <td>
                                                    মোঃ আব্দুর আউয়াল /
                                                    মোছাঃ লাভলী আক্তার
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Wife</td>
                                                <td colspan="4">No Data Found</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td colspan="4">ভবানীপুর, বড়বিলা বাজার, ফুলবাড়িয়া, ময়মনসিংহ</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile</td>
                                                <td>
                                                    <a href="tel:01613477581">
                                                        01613477581
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
                                <div class="col-sm-3 text-center" style="background: #4284c371 ">
                                    <img id="photoF" src=""
                                        style="max-height:180px; max-width:300px;" class="text-center">
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
                            <form method="POST" action=""
                                accept-charset="UTF-8" note="Are you sure about all information and amount are OK?"><input
                                    name="_token" type="hidden" value="z1XyFJh45Z2TxsL4Y4bgfFhZCRUusXiBwYzJazHV">
                                <input name="investment" type="hidden" value="1">
                                <input name="member" type="hidden" value="1">
                                <input name="preventDuplicate" type="hidden" value="63575ba2f25c0">
                                <div class="row">
                                    <div class="col-sm-6">

                                        <div class="form-group row">
                                            <label for="amount" class="col-form-label col-sm-4">Invest Amount</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Loan amount (given)"
                                                    disabled name="amount" type="number" value="20000" id="amount">
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
                                                    type="text" value="800" id="get_profit">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="profit_due" class="col-sm-4">Profit Due</label>
                                            <div class="col-sm-8">
                                                <input id="profit_due" class="form-control text-center" readonly
                                                    name="profit_due" type="text" value="-22480">
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
                                                    readonly name="monthly_profit" type="number" value="400"
                                                    id="monthly_profit">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="passed_sequence" class="col-form-label col-sm-4">Passed
                                                Sequence</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Installment amount"
                                                    readonly name="passed_sequence" type="number" value="2"
                                                    id="passed_sequence">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="paid_profit" class="col-form-label col-sm-4">Profit Paid</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Installment amount"
                                                    readonly name="paid_profit" type="number" value="23280"
                                                    id="paid_profit">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="todays_profit" class="col-form-label col-sm-4">Todays
                                                Profit</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center mainAmount" id="todays_profit"
                                                    placeholder="Total need to pay back" required name="todays_profit"
                                                    type="number" value="0">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="penalty" class="col-form-label col-sm-4">Penalty</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Input penalty amount"
                                                    name="penalty" type="number" value="0" id="penalty">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="balance_return" class="col-form-label col-sm-4">Main Balance
                                                Return</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center mainAmount" min="0"
                                                    max="20000" name="balance_return" type="number"
                                                    id="balance_return">
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
@endsection
