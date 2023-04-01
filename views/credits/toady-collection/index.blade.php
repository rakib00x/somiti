@extends('layouts.frontend.app')
<style>
    .table.table-v2 thead tr th {
    background-color: rgb(36 39 182 / 40%) !important;
    }
</style>
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <main class="container mt-2">
                    <section>
                        <div class="row">
                            <div class="col table-responsive">
                                <!-- table start -->
                                <table class="table table-bordered table-v2 table-striped table-sm">
                                    <!-- table header -->
                                    <thead>
                                        <tr>
                                            <th>Account No</th>
                                            <th>Member Name</th>
                                            <th>Amount</th>
                                            <th>Over Due</th>
                                            <th>Installment</th>
                                            <th>Common</th>
                                        </tr>
                                    </thead>
                                    <!-- table body -->
                                    <tbody>
                                    <tbody>

                                        <tr>
                                            <td class="text-center">111</td>
                                            <td>Khokon mia</td>
                                            <td class="text-right">
                                                2,500
                                            </td>
                                            <td class="text-right">
                                                0
                                            </td>

                                            <td class="text-center">
                                                <button type="button"
                                                    onclick="return paidDateShow(&quot;Oct-02-22 04:32 PM&quot;)"
                                                    class="btn btn-sm btn-success"><i class="fa fa-check"></i></button>
                                            </td>

                                            <td class="text-center">
                                                <button type="button"
                                                    onclick="return paidDateShow(&quot;Oct-02-22 04:32 PM&quot;)"
                                                    class="btn btn-sm btn-success"><i class="fa fa-check"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="text-right" style="font-weight: 900;" colspan="2">Total:</td>
                                            <td class="text-right" style="font-weight: 900;">2,500</td>
                                            <td class="text-right" style="font-weight: 900;">0</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="paidDate" role="dialog">
                                <div class="modal-dialog modal-sm">

                                    <!-- Modal content-->
                                    <div class="modal-content ">

                                        <div class="modal-body text-center">
                                            <h3>পরিশোধের তারিখঃ</h3>
                                            <h3 id="paid_date"></h3>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </section>
                </main>


            </div>
        </div>
    </div>
    <div class="display-type"></div>

@endsection
