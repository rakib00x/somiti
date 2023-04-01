@extends('layouts.frontend.app', ['pageTitle' => 'CC Inst. Closing'])
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">

            <div class="row">
                <div class="col-sm-12">
                    <div class="element-box">
                        <div class="row border">
                            <div class="col-sm-9 border" style="background: #ddc1f54c">
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
                            <div class="col-sm-3 text-center" style="background: #8e43d526 ">
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

                    <div class="element-box">


                        <form method="POST" action=""
                            accept-charset="UTF-8" note="Are you sure about all information and amount are OK?"><input
                                name="_token" type="hidden" value="z1XyFJh45Z2TxsL4Y4bgfFhZCRUusXiBwYzJazHV">
                            <input name="preventDuplicate" type="hidden" value="6357619b5de6c">
                            <input name="investment" type="hidden" value="1">
                            <input name="member" type="hidden" value="1">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="date" class="col-form-label col-sm-4">Date</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center"
                                                placeholder="No need to select date for Today" name="date"
                                                type="date" value="2022-10-25" id="date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="start_date" class="col-form-label col-sm-4">Distribute Date</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center"
                                                placeholder="No need to select date for Today" disabled
                                                name="start_date" type="date" value="2022-09-04" id="start_date">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="amount" class="col-form-label col-sm-4">Invest Amount</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Loan amount (given)"
                                                disabled name="amount" type="number" value="20000" id="amount">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4">Profit Generated</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control text-center" name="get_profit"
                                                value="800" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4">Profit Due</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control text-center" id="profit_due"
                                                name="profit_due" value="-22480" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="end_date" class="col-form-label col-sm-4">Expire Date</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center"
                                                placeholder="No need to select date for Today" disabled name="end_date"
                                                type="date" value="1970-01-01" id="end_date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="monthly_profit"
                                            class="col-form-label col-sm-4">Installment</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Installment Amount"
                                                readonly name="monthly_profit" type="number" value="400"
                                                id="monthly_profit">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="profit" class="col-form-label col-sm-4"> Discount</label>

                                        <div class="col-sm-8">
                                            <input id="installment_discount_value" class="form-control text-center"
                                                placeholder="Discount Amount" required name="discount_value"
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
                                                readonly name="paid_profit" type="number" value="23280"
                                                id="paid_profit">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fine" class="col-form-label col-sm-4">Fine</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center"
                                                placeholder="Total need to pay back" name="fine" type="number"
                                                value="0" id="fine">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 readonly">Total Return</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control text-center mainAmount 'readonly'"
                                                id="installment_total_return"name="total_return"value="20000">
                                            <input type="hidden" id="installment_total_return_main"
                                                name="total_return_main" value="-2480">
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
@endsection
