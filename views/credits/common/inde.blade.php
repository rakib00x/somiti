@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="row border">
                                <div class="col-sm-9 border" style="background: #DDC1F5">
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
                                                <td>Guarantor</td>
                                                <td colspan="0"><a href=""
                                                        target="_blank">1</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center" style="background: #D5D543 ">
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





                <form method="POST" action="" accept-charset="UTF-8"
                    id="formValidate" note="Are you sure about all information and amount are OK?"><input name="_token"
                        type="hidden" value="">
                    <input name="preventDuplicate" type="hidden" value="636cbd153b7ce">


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="element-box">
                                <div class="row">
                                    <div class="col-sm"></div>
                                    <div class="col-sm-3 text-center">
                                        <label for="previous_date" class="form-label">Select date (optional)</label>
                                        <input type="date" name="previous_date" class="form-control text-center"
                                            max="2022-11-10">
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- <div class="col-sm-2"></div> -->
                        <div class="col-sm-12">
                            <h6 class="element-header text-center" style="margin-bottom: 16px;">General Savings</h6>
                            <div class="element-box text-center text-md-left">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">

                                            <div class="col-sm-4">
                                                <input class="form-control text-center amount" step="any"
                                                    placeholder="Input amount" min="1" autofocus
                                                    name="general[63146f8cdbce4]" type="number">
                                            </div>


                                            <div class="col-sm-2 mt-2">
                                                <label for="general[63146f8cdbce4]"
                                                    class="btn btn-primary col-form-label col-sm-12">Balance :128,453
                                                    ৳</label>
                                            </div>
                                            <div class="col-sm-4 mt-2">
                                                <label for="general[63146f8cdbce4]"
                                                    class="btn btn-primary col-form-label col-sm-12">Target :100 ৳</label>
                                            </div>

                                            <div class="col-sm-2 mt-2">
                                                <a href=""
                                                    class="btn btn-danger  col-sm-12 text-center">Book Check</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>


                        <!-- <div class="col-sm-2"></div> -->
                        <div class="col-sm-12">
                            <h6 class="element-header text-center" style="margin-bottom: 16px;">Installment Collection</h6>
                            <div class="element-box text-center text-md-left">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">

                                            <div class="col-sm-4 mt-3">
                                                <input class="form-control text-center amount" step="any"
                                                    placeholder="Input amount" min="1" autofocus
                                                    name="invest[632c5b3da59f8][installment]" type="number">
                                            </div>

                                            <div class="col-sm-2 mt-3">
                                                <label for="invest[632c5b3da59f8]"
                                                    class="btn btn-primary col-form-label col-sm-12">Leger No: </label>
                                            </div>



                                            <div class="col-sm-2 mt-3">
                                                <label for="invest[632c5b3da59f8]"
                                                    class="btn btn-primary col-form-label col-sm-12">Installment:
                                                    11,000</label>
                                            </div>

                                            <div class="col-sm-1 mt-3">
                                                <label for="invest[632c5b3da59f8]"
                                                    class="btn btn-primary col-form-label col-sm-12">Paid: 29,490</label>
                                            </div>

                                            <div class="col-sm-1 mt-3">
                                                <label for="invest[632c5b3da59f8]"
                                                    class="btn btn-primary col-form-label col-sm-12">Due: 80,510</label>
                                            </div>

                                            <div class="col-sm-2 mt-3">
                                                <a href=""
                                                    class="btn btn-danger  col-sm-12 text-center">Book Check</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>



                        <!-- <div class="col-sm-2"></div> -->
                        <div class="col-sm-12">
                            <h6 class="element-header text-center" style="margin-bottom: 16px;">CC Loan Collection</h6>
                            <div class="element-box text-center text-md-left">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="form-group row">
                                            <div class="col-sm-4 mt-3">
                                                <input class="form-control text-center amount" step="any"
                                                    placeholder="Input amount" min="1"
                                                    name="install[63147166765f0][profit]" type="number">
                                            </div>

                                            <div class="col-sm-2 mt-3">
                                                <label for="install[63147166765f0]"
                                                    class="btn btn-primary col-form-label col-sm-12">AC Age: 67Days</label>
                                            </div>

                                            <div class="col-sm-2 mt-3">
                                                <label for="install[63147166765f0]"
                                                    class="btn btn-primary col-form-label col-sm-12">Current Interest:
                                                    2%</label>
                                            </div>
                                            <div class="col-sm-2 mt-3">
                                                <label for="install[63147166765f0]"
                                                    class="btn btn-primary col-form-label col-sm-12">Main Balance:
                                                    20,000</label>
                                            </div>

                                            <div class="col-sm-2 mt-3">
                                                <a href="" target="blank"
                                                    class="btn btn-danger  col-sm-12 text-center">Book Check</a>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-4 mt-3">
                                                <input class="form-control text-center amount" step="any"
                                                    placeholder="Input amount" min="1"
                                                    name="install[6366867ed32ab][profit]" type="number">
                                            </div>

                                            <div class="col-sm-2 mt-3">
                                                <label for="install[6366867ed32ab]"
                                                    class="btn btn-primary col-form-label col-sm-12">AC Age: 41Days</label>
                                            </div>

                                            <div class="col-sm-2 mt-3">
                                                <label for="install[6366867ed32ab]"
                                                    class="btn btn-primary col-form-label col-sm-12">Current Interest:
                                                    10%</label>
                                            </div>
                                            <div class="col-sm-2 mt-3">
                                                <label for="install[6366867ed32ab]"
                                                    class="btn btn-primary col-form-label col-sm-12">Main Balance:
                                                    5,000</label>
                                            </div>

                                            <div class="col-sm-2 mt-3">
                                                <a href="" target="blank"
                                                    class="btn btn-danger  col-sm-12 text-center">Book Check</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>

                        <div class="col-md-12" style="float: none; margin: 0 auto;">
                            <div class="element-box text-center text-md-left">
                                <div class="form-group">
                                    <input type="text" class="form-control text-center" name="note"
                                        placeholder="Please enter your note" />
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12">

                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-4 text-center mt-3">
                                            <button id="total" class="btn btn-danger btn-lg btn-block" disabled
                                                type="button">Total Collected: </button>
                                        </div>
                                        <div class="col-sm-4"></div>

                                        <div class="col-sm-4 text-center mt-3">

                                            <input class="btn btn-success btn-lg btn-block btn_submit" type="submit"
                                                value="Submit">
                                            <button class="btn btn-success btn-lg btn-block btn_modal d-none"
                                                data-toggle="modal" data-target="#paymentModal" style="margin: 0"
                                                type="button">Pay Now</button>
                                            <div aria-hidden="true" aria-labelledby="exampleModalLabel"
                                                class="modal fade" id="paymentModal" role="dialog" tabindex="-1">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" style="width: 100%">Pay with bKash
                                                            </h5>
                                                            <button aria-label="Close" class="close"
                                                                data-dismiss="modal" type="button">
                                                                <span aria-hidden="true"> &times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="bkash-header">
                                                                Merchant number
                                                            </div>
                                                            <div class="bkash-number">
                                                                <span>X</span>
                                                                <span>X</span>
                                                                <span>X</span>
                                                                <span>X</span>
                                                                <span>X</span>
                                                                <span>X</span>
                                                                <span>X</span>
                                                                <span>X</span>
                                                                <span>X</span>
                                                                <span>X</span>
                                                                <span>X</span>
                                                            </div>
                                                            <div class="bkash-qrcode">
                                                                <div>
                                                                    <?xml version="1.0" encoding="UTF-8"?>
                                                                    <svg xmlns="" version="1.1"
                                                                        width="200" height="200"
                                                                        viewBox="0 0 200 200">
                                                                        <rect x="0" y="0"
                                                                            width="200" height="200"
                                                                            fill="#ffffff" />
                                                                        <g transform="scale(9.524)">
                                                                            <g transform="translate(0,0)">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M8 0L8 1L9 1L9 0ZM10 0L10 2L8 2L8 5L9 5L9 6L8 6L8 7L9 7L9 6L10 6L10 7L11 7L11 8L8 8L8 10L9 10L9 12L8 12L8 11L7 11L7 10L6 10L6 9L7 9L7 8L6 8L6 9L5 9L5 10L4 10L4 11L1 11L1 12L0 12L0 13L4 13L4 11L5 11L5 12L6 12L6 13L8 13L8 14L9 14L9 15L10 15L10 16L9 16L9 17L8 17L8 21L12 21L12 20L11 20L11 19L13 19L13 20L14 20L14 21L15 21L15 20L16 20L16 19L15 19L15 17L18 17L18 19L19 19L19 18L20 18L20 15L17 15L17 13L18 13L18 11L19 11L19 13L20 13L20 14L21 14L21 8L20 8L20 10L18 10L18 9L19 9L19 8L16 8L16 9L15 9L15 10L14 10L14 11L15 11L15 12L14 12L14 13L13 13L13 12L11 12L11 11L12 11L12 10L13 10L13 9L14 9L14 8L13 8L13 5L12 5L12 4L13 4L13 3L12 3L12 1L13 1L13 0ZM10 2L10 4L9 4L9 5L11 5L11 4L12 4L12 3L11 3L11 2ZM11 6L11 7L12 7L12 6ZM0 8L0 10L1 10L1 9L2 9L2 10L3 10L3 9L4 9L4 8ZM10 9L10 11L11 11L11 10L12 10L12 9ZM5 10L5 11L6 11L6 12L7 12L7 11L6 11L6 10ZM15 10L15 11L16 11L16 12L15 12L15 14L16 14L16 13L17 13L17 11L18 11L18 10ZM9 12L9 13L10 13L10 15L11 15L11 16L10 16L10 17L11 17L11 18L10 18L10 19L9 19L9 20L10 20L10 19L11 19L11 18L12 18L12 16L13 16L13 18L14 18L14 17L15 17L15 15L14 15L14 16L13 16L13 14L12 14L12 15L11 15L11 13L10 13L10 12ZM20 19L20 20L21 20L21 19ZM18 20L18 21L19 21L19 20ZM0 0L0 7L7 7L7 0ZM1 1L1 6L6 6L6 1ZM2 2L2 5L5 5L5 2ZM14 0L14 7L21 7L21 0ZM15 1L15 6L20 6L20 1ZM16 2L16 5L19 5L19 2ZM0 14L0 21L7 21L7 14ZM1 15L1 20L6 20L6 15ZM2 16L2 19L5 19L5 16Z"
                                                                                    fill="#000000" />
                                                                            </g>
                                                                        </g>
                                                                    </svg>

                                                                </div>
                                                            </div>
                                                            <div class="bkash-footer">
                                                                <table>
                                                                    <tr>
                                                                        <td>Actual amount :</td>
                                                                        <td id="bkash_amount"></td>
                                                                        <td rowspan="3" class="partnership">
                                                                            <img src=""
                                                                                alt="">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Charge amount :</td>
                                                                        <td id="bkash_charge"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Payable amount :</td>
                                                                        <td id="bkash_payable"></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="row text-center" style="width: 100%">
                                                                <div class="col d-none d-md-block">
                                                                    <button class="btn btn-secondary" data-dismiss="modal"
                                                                        type="button">Revise again</button>
                                                                </div>
                                                                <div class="col">
                                                                    <button type="submit"
                                                                        class="btn btn-success">Submit</button>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-2"></div>

                            </div>

                        </div>

                    </div>
                </form>



            </div>
        </div>
    </div>
 <div class="display-type"></div>
@endsection
