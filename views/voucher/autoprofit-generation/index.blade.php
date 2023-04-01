@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="element-header text-center text-success">You are ready to go</h6>
                        <h6 class="element-header text-center">Yearly Profit Distribution Form &nbsp;&nbsp;&nbsp;&nbsp;<a
                                class="text-danger" href=""><u>Help Guide</u></a>
                        </h6>

                        <div class="element-box">
                            <form method="GET" action=""
                                accept-charset="UTF-8" class="form-inline justify-content-center">

                                <div class="form-element control-rounded text-center">


                                    <label for="year" class="sr-only">Year</label>
                                    <select class="form-control rounded" required id="year" name="year">
                                        <option value="">Select year</option>
                                        <option value="2022" selected="selected">2021-2022</option>
                                        <option value="2021">2020-2021</option>
                                        <option value="2020">2019-2020</option>
                                    </select>

                                    <label for="branch_id" class="sr-only">Branch</label>
                                    <select class="form-control rounded" required id="branch_id" name="branch_id">
                                        <option selected="selected" value="">Select branch</option>
                                        <option value="1">Main Branch</option>
                                    </select>

                                    <label for="area_id" class="sr-only">Area</label>
                                    <select class="form-control rounded" required id="area_id" name="area_id">
                                        <option selected="selected" value="">Please Select</option>
                                    </select>

                                    <label for="profit" class="sr-only">Area</label>
                                    <input class="form-control rounded text-center" placeholder="Profit" required
                                        name="profit" type="text" id="profit">

                                    <label for="pay_type" class="sr-only">Type</label>
                                    <select class="form-control rounded" required id="pay_type" name="pay_type">
                                        <option value="percent">Percentage</option>
                                        <option value="taka">Taka</option>
                                    </select>

                                    <label for="vat" class="sr-only">VAT/Charge</label>
                                    <input class="form-control rounded text-center" placeholder="VAT/Charge (%)" required
                                        name="vat" type="text" value="0" id="vat">

                                    <label for="profit_type" class="sr-only">Profit Type</label>
                                    <select class="form-control rounded" required id="profit_type" name="profit_type">
                                        <option value="general">General</option>
                                        <option value="dps">DPS</option>
                                        <option value="share">Share</option>
                                    </select>

                                    <br><br>

                                    <button type="submit" class="btn btn-primary btn-lg">Sheet Generate</button>
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
