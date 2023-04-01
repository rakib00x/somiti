@extends('layouts.frontend.app')

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">




                    <div class="col-sm-12">
                        <div class="element-box">
                            <form method="GET" action=""
                                accept-charset="UTF-8" class="form-inline justify-content-center">
                                <div class="form-element control-rounded text-center">

                                    <!-- <label for="user" class="sr-only">Branch</label>
        <select class="form-control rounded" name="branch_id" required>
        <option value="">Select branch</option>
                                    <option value="1">Main Branch</option>
                            </select> -->

                                    <label for="branch_id" class="sr-only">Branch</label>
                                    <select class="form-control rounded" required name="branch">
                                        <option selected="selected" value="">Select branch</option>
                                        <option value="1">Main Branch</option>
                                    </select>


                                    <label for="year" class="sr-only">Year</label>
                                    <select class="form-control rounded" id="year" name="year">
                                        <option value="2022" selected="selected">2022</option>
                                        <option value="2021">2021</option>
                                    </select>



                                    <label for="month" class="sr-only">Month</label>
                                    <select class="form-control rounded" id="month" name="month">
                                        <option value="">Select month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10" selected="selected">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>

                                    <label for="staff" class="sr-only">Staff</label>
                                    <select class="form-control rounded" id="staff" name="staff">
                                        <option selected="selected" value="">Select All</option>
                                        <option value="208">Mahfuz Akand</option>
                                        <option value="209">Md Arif Hasan</option>
                                        <option value="216">আব্দুল্লাহ আল মামুন</option>
                                    </select>

                                    <label for="start" class="sr-only">start</label>
                                    <input class="form-control rounded toy text-center" placeholder="Select Filter" required
                                        name="start" type="date" value="2022-10-17" id="start">
                                    <button class="btn btn-primary btn-lg" type="submit">Sheet Generate</button>

                                </div>
                            </form>



                        </div>
                    </div>
                </div>
                <p class="text-center text-danger">Salary list</p>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table id="dataTable1" class="table table-bordered table-v2 table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Issue Date</th>


                                        <th>Year</th>
                                        <th>Month</th>
                                        <th>Staff</th>
                                        <th>Basic</th>
                                        <th>Others</th>
                                        <th>Deduction</th>
                                        <th>Salary Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <tr class="text-center">
                                        <td>1</td>
                                        <td>01 Oct 2022</td>
                                        <td><a href="" class="btn btn-outline-dark btn-sm" target="_blank"> 2022</a>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-outline-dark btn-sm" target="_blank">
                                                Oct
                                            </a>
                                        </td>
                                        <td>1</td>
                                        <td class="text-right">50,000</td>
                                        <td class="text-right">4,500</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">54,500</td>

                                        <td>


                                                <a onclick="return confirm(salary.are_you_sure_to_delete_this_salary_transaction?);"
                                                    href="" title="Delete" class="badge badge-danger"><i
                                                        class="fa fa-trash"></i></a>
                                             
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>2</td>
                                        <td>13 Sep 2022</td>
                                        <td><a href="" class="btn btn-outline-dark btn-sm" target="_blank">
                                                2022</a></td>
                                        <td>
                                            <a href="" class="btn btn-outline-dark btn-sm" target="_blank">
                                                Sep
                                            </a>
                                        </td>
                                        <td>4</td>
                                        <td class="text-right">77,000</td>
                                        <td class="text-right">22,800</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">99,800</td>

                                        <td>

                                                <a onclick="return confirm(salary.are_you_sure_to_delete_this_salary_transaction?);"
                                                    href="" title="Delete" class="badge badge-danger"><i
                                                        class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>3</td>
                                        <td>03 Oct 2022</td>
                                        <td><a href="" class="btn btn-outline-dark btn-sm" target="_blank">
                                                2022</a></td>
                                        <td>
                                            <a href="" class="btn btn-outline-dark btn-sm" target="_blank">
                                                Feb
                                            </a>
                                        </td>
                                        <td>1</td>
                                        <td class="text-right">50,000</td>
                                        <td class="text-right">4,500</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">54,500</td>

                                        <td>

                                            <a onclick="return confirm(salary.are_you_sure_to_delete_this_salary_transaction?);"
                                                href="http://demo.oslbd.org/salary/sheet/2022/2/delete" title="Delete"
                                                class="badge badge-danger"><i class="fa fa-trash"></i></a>
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
    <div class="display-type"></div>
    </div>
    </div>
@endsection
