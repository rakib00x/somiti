@extends('layouts.frontend.app')
@section('content')

<div class="content-w">
    <div class="content-i">
        <div class="content-box">


            <div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper ">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="">
                                    <div class="form-inline">
                                        <select name="profit_type" class="form-control mr-5">
                                            <option value="">Select Type</option>
                                            <option value="dps">Monthly Savings </option>
                                            <option value="general">GENERAL</option>
                                            <option value="share">Share</option>
                                        </select>
                                        <input type="text" class="form-control mr-5" name="account_no" value=""
                                            placeholder="Input AC Number">

                                        <button class="btn btn-primary btn-lg" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                        <hr>

                        <div class="element-box-tp">
                            <!--------------------START - Table with actions-------------------->
                            <div class="table-responsive">
                                <table class="table table-bordered table-v2 table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Account No</th>
                                            <th>Member Name</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Year</th>
                                            <th>Entry Date</th>
                                            <th>Area</th>
                                            <th>Process by</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <th>1</th>
                                            <td>1</td>
                                            <td class="text-justify">মোঃ আরিফ হোসেন</td>
                                            <td>general</td>
                                            <td class="text-right">73</td>
                                            <td>2021</td>
                                            <td>2022-09-29 09:34:16</td>
                                            <td>Uttara Sector 5</td>

                                            <td>Mahfuz Akand</td>
                                            <td>

                                                <form method="POST"
                                                    action="http://demo.oslbd.org/yearly-profit-history-destroy/1"
                                                    accept-charset="UTF-8" style="display: inline"><input name="_method"
                                                        type="hidden" value="DELETE"><input name="_token"
                                                        type="hidden" value="I2otJQBvvTKtBasrJGdHY1emtVnLLdd9NS5hGaHr">
                                                    <button type="submit" class="badge badge-danger show_confirm"
                                                        title="Delete" style="cursor: pointer; color: white"><i
                                                            class="os-icon os-icon-ui-15 "></i></button>
                                                </form>




                                                <a href="http://demo.oslbd.org/singleProfitDetails/1"><i
                                                        class="fa fa-print"></i></a>
                                            </td>
                                        </tr>
                                        <form style="display: none;" id="profit-destroy-1" method="POST"
                                            action="http://demo.oslbd.org/yearly-profit-history-destroy/1">
                                            <input type="hidden" name="_token"
                                                value="I2otJQBvvTKtBasrJGdHY1emtVnLLdd9NS5hGaHr"> <input type="hidden"
                                                name="_method" value="DELETE">
                                        </form>
                                        <tr class="text-center">
                                            <th>2</th>
                                            <td>3</td>
                                            <td class="text-justify">Rakib</td>
                                            <td>general</td>
                                            <td class="text-right">70</td>
                                            <td>2021</td>
                                            <td>2022-09-29 09:34:17</td>
                                            <td>Uttara Sector 5</td>

                                            <td>Mahfuz Akand</td>
                                            <td>

                                                <form method="POST"
                                                    action="http://demo.oslbd.org/yearly-profit-history-destroy/2"
                                                    accept-charset="UTF-8" style="display: inline"><input name="_method"
                                                        type="hidden" value="DELETE"><input name="_token"
                                                        type="hidden" value="I2otJQBvvTKtBasrJGdHY1emtVnLLdd9NS5hGaHr">
                                                    <button type="submit" class="badge badge-danger show_confirm"
                                                        title="Delete" style="cursor: pointer; color: white"><i
                                                            class="os-icon os-icon-ui-15 "></i></button>
                                                </form>




                                                <a href="http://demo.oslbd.org/singleProfitDetails/2"><i
                                                        class="fa fa-print"></i></a>
                                            </td>
                                        </tr>
                                        <form style="display: none;" id="profit-destroy-2" method="POST"
                                            action="http://demo.oslbd.org/yearly-profit-history-destroy/2">
                                            <input type="hidden" name="_token"
                                                value="I2otJQBvvTKtBasrJGdHY1emtVnLLdd9NS5hGaHr"> <input type="hidden"
                                                name="_method" value="DELETE">
                                        </form>
                                        <tr class="text-center">
                                            <th>3</th>
                                            <td>61</td>
                                            <td class="text-justify">Dider</td>
                                            <td>general</td>
                                            <td class="text-right">51</td>
                                            <td>2021</td>
                                            <td>2022-09-29 09:34:18</td>
                                            <td>Uttara Sector 5</td>

                                            <td>Mahfuz Akand</td>
                                            <td>

                                                <form method="POST"
                                                    action="http://demo.oslbd.org/yearly-profit-history-destroy/3"
                                                    accept-charset="UTF-8" style="display: inline"><input name="_method"
                                                        type="hidden" value="DELETE"><input name="_token"
                                                        type="hidden" value="I2otJQBvvTKtBasrJGdHY1emtVnLLdd9NS5hGaHr">
                                                    <button type="submit" class="badge badge-danger show_confirm"
                                                        title="Delete" style="cursor: pointer; color: white"><i
                                                            class="os-icon os-icon-ui-15 "></i></button>
                                                </form>




                                                <a href="http://demo.oslbd.org/singleProfitDetails/3"><i
                                                        class="fa fa-print"></i></a>
                                            </td>
                                        </tr>
                                        <form style="display: none;" id="profit-destroy-3" method="POST"
                                            action="http://demo.oslbd.org/yearly-profit-history-destroy/3">
                                            <input type="hidden" name="_token"
                                                value="I2otJQBvvTKtBasrJGdHY1emtVnLLdd9NS5hGaHr"> <input
                                                type="hidden" name="_method" value="DELETE">
                                        </form>
                                        <tr class="text-center">
                                            <th>4</th>
                                            <td>63</td>
                                            <td class="text-justify">BADIUL ALAM</td>
                                            <td>general</td>
                                            <td class="text-right">6</td>
                                            <td>2021</td>
                                            <td>2022-09-29 09:34:19</td>
                                            <td>Uttara Sector 5</td>

                                            <td>Mahfuz Akand</td>
                                            <td>

                                                <form method="POST"
                                                    action="http://demo.oslbd.org/yearly-profit-history-destroy/4"
                                                    accept-charset="UTF-8" style="display: inline"><input
                                                        name="_method" type="hidden" value="DELETE"><input
                                                        name="_token" type="hidden"
                                                        value="I2otJQBvvTKtBasrJGdHY1emtVnLLdd9NS5hGaHr">
                                                    <button type="submit" class="badge badge-danger show_confirm"
                                                        title="Delete" style="cursor: pointer; color: white"><i
                                                            class="os-icon os-icon-ui-15 "></i></button>
                                                </form>




                                                <a href="http://demo.oslbd.org/singleProfitDetails/4"><i
                                                        class="fa fa-print"></i></a>
                                            </td>
                                        </tr>
                                        <form style="display: none;" id="profit-destroy-4" method="POST"
                                            action="http://demo.oslbd.org/yearly-profit-history-destroy/4">
                                            <input type="hidden" name="_token"
                                                value="I2otJQBvvTKtBasrJGdHY1emtVnLLdd9NS5hGaHr"> <input
                                                type="hidden" name="_method" value="DELETE">
                                        </form>
                                        <tr class="text-center">
                                            <th>5</th>
                                            <td>65</td>
                                            <td class="text-justify">JBA</td>
                                            <td>general</td>
                                            <td class="text-right">14</td>
                                            <td>2021</td>
                                            <td>2022-09-29 09:34:19</td>
                                            <td>Uttara Sector 5</td>

                                            <td>Mahfuz Akand</td>
                                            <td>

                                                <form method="POST"
                                                    action="http://demo.oslbd.org/yearly-profit-history-destroy/5"
                                                    accept-charset="UTF-8" style="display: inline"><input
                                                        name="_method" type="hidden" value="DELETE"><input
                                                        name="_token" type="hidden"
                                                        value="I2otJQBvvTKtBasrJGdHY1emtVnLLdd9NS5hGaHr">
                                                    <button type="submit" class="badge badge-danger show_confirm"
                                                        title="Delete" style="cursor: pointer; color: white"><i
                                                            class="os-icon os-icon-ui-15 "></i></button>
                                                </form>




                                                <a href="http://demo.oslbd.org/singleProfitDetails/5"><i
                                                        class="fa fa-print"></i></a>
                                            </td>
                                        </tr>
                                        <form style="display: none;" id="profit-destroy-5" method="POST"
                                            action="http://demo.oslbd.org/yearly-profit-history-destroy/5">
                                            <input type="hidden" name="_token"
                                                value="I2otJQBvvTKtBasrJGdHY1emtVnLLdd9NS5hGaHr"> <input
                                                type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center" style="display: block ruby;">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="display-type"></div>
@endsection
