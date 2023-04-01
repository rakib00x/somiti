@extends('layouts.frontend.app')
@section('content')

<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-box">
                        <div class="row border">
                            <div class="col-sm-9 border" style="background: #8142b924">
                                <table class="table table-sm table-striped ">
                                    <tbody>
                                        <tr>
                                            <td>Account</td>
                                            <td>65</td>
                                        </tr>

                                        <tr>
                                            <td>Passbook</td>
                                            <td>
                                                N/A
                                                (<small></small>)
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Area</td>
                                            <td colspan="4">Uttara Sector 5</td>
                                        </tr>

                                        <tr>
                                            <td>Name</td>

                                            <td colspan="4">JBA</td>
                                        </tr>
                                        <tr>
                                            <td>Parents</td>
                                            <td colspan="4">No Data Found</td>
                                        </tr>
                                        <tr>
                                            <td>Wife</td>
                                            <td colspan="4">No Data Found</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td colspan="4">, , , </td>
                                        </tr>
                                        <tr>
                                            <td>Mobile</td>
                                            <td>
                                                <a href="tel:">

                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Member Type</td>
                                            <td>monthly</td>
                                        </tr>

                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-3 text-center" style="background: #dcb0873d ">
                                <img id="photoF" src="http://demo.oslbd.org/demo/Profile/default.png"
                                    style="max-height:180px; max-width:300px;" class="text-center">
                                <img id="signatureF" src="http://demo.oslbd.org/demo/Signature/default.png"
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
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <td>SL</td>
                                            <td>Unique Identity</td>
                                            <td>Start Date</td>
                                            <td>Expire Date</td>
                                            <td>Schema Name</td>
                                            <td>Installment Amount</td>
                                            <td>Installment</td>
                                            <td>Sequence</td>
                                            <td>Paid</td>
                                            <td>Status</td>
                                            <td>Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>632c63a7101ff</td>
                                            <td>22 Sep 2022</td>
                                            <td>16 Oct 2022</td>
                                            <td>1year DPS</td>
                                            <td class="text-right">1,000</td>
                                            <td class="text-right">12</td>
                                            <td class="text-right">30 Days</td>
                                            <td class="text-right">1,000</td>
                                            <td>running</td>
                                            <td>
                                                <a href=""><i class="fa fa-money"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>632cad093342a</td>
                                            <td>23 Sep 2022</td>
                                            <td>16 Oct 2022</td>
                                            <td>2 year dps</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">36</td>
                                            <td class="text-right">30 Days</td>
                                            <td class="text-right">0</td>
                                            <td>running</td>
                                            <td>
                                                <a href=""><i class="fa fa-money"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



