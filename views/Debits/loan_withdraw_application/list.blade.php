@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <h6 class="element-header">Loan / Withdraw List <a
                                    href="{{ route('loan.withdraw.search') }}"><i class="fa fa-plus-circle"></i></a></h6>
                            <div class="element-box-tp">
                                <!--------------------START - Table with actions-------------------->
                                <div class="table-responsive">
                                    <table id="dataTable1" class="table table-bordered table-v2 table-striped table-sm"
                                        style="font-size: 12px; text-align:center">
                                        <thead>
                                            <tr class="text-center">
                                                <th>SL</th>
                                                <th>AC</th>
                                                <th>Member</th>
                                                <th>Area</th>
                                                <th>Type</th>

                                                <th>Ex Amount</th>
                                                <th>Date</th>

                                                <th>Process By</th>
                                                <th>App. Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th>Action</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <td>1</td>
                                                <td>122</td>
                                                <td>hasina</td>
                                                <td>SHAPLA</td>
                                                <td>savings</td>

                                                <td class="text-right">300</td>
                                                <td>03/11/2022</td>


                                                <td>Mahfuz Akand</td>
                                                <td>27/10/2022</td>
                                                <td>
                                                    approve
                                                </td>
                                                <td>
                                                    ---
                                                </td>

                                                <td>

                                                    <a href=""
                                                        class="btn btn-primary btn-sm">Print</a>


                                                </td>
                                                <td>

                                                    <a href="" title="Delete"
                                                        onclick="return confirm(Will you delete this Loan / Withdraw Request, Are You Sure ?);"
                                                        class="btn btn-danger btn-sm">Delete </a>

                                                </td>

                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>1</td>
                                                <td>মোঃ আরিফ হোসেন</td>
                                                <td>Uttara Sector 5</td>
                                                <td>savings</td>

                                                <td class="text-right">100</td>
                                                <td>15/09/2022</td>


                                                <td>Mahfuz Akand</td>
                                                <td>08/09/2022</td>
                                                <td>
                                                    approve
                                                </td>
                                                <td>
                                                    ---
                                                </td>

                                                <td>

                                                    <a href=""
                                                        class="btn btn-primary btn-sm">Print</a>


                                                </td>
                                                <td>

                                                    <a href="" title="Delete"
                                                        onclick="return confirm(Will you delete this Loan / Withdraw Request, Are You Sure ?);"
                                                        class="btn btn-danger btn-sm">Delete </a>

                                                </td>

                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>1</td>
                                                <td>মোঃ আরিফ হোসেন</td>
                                                <td>Uttara Sector 5</td>
                                                <td>investment</td>

                                                <td class="text-right">পাঁচ হাজার টাকা</td>
                                                <td>07/09/2022</td>


                                                <td>Mahfuz Akand</td>
                                                <td>07/09/2022</td>
                                                <td>
                                                    approve
                                                </td>
                                                <td>
                                                    ---
                                                </td>

                                                <td>

                                                    <a href="" class="btn btn-success btn-sm">Print</a>


                                                </td>
                                                <td>

                                                    <a href="" title="Delete"
                                                        onclick="return confirm(Will you delete this Loan / Withdraw Request, Are You Sure ?);"
                                                        class="btn btn-danger btn-sm">Delete </a>

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

    <div class="display-type"></div>
@endsection
