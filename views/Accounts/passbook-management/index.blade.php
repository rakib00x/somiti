@extends('layouts.frontend.app')
<style>

</style>
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <h6 class="element-header">
                                <strong onclick="addModal()" style="cursor: pointer"> PassBook List <i
                                        class="fa fa-plus-circle"></i></strong>
                            </h6>
                            <div class="element-box">
                                <!--------------------START - Table with actions-------------------->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-v2 table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Account No</th>
                                                <th>Member</th>
                                                <th>Area</th>
                                                <th>Passbook</th>
                                                <th>Issue Date</th>
                                                <th>Issue Type</th>
                                                <th>Previous Number</th>
                                                <th>Passbook Fee</th>
                                                <th>Process by</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <td>1</td>
                                                <td>1</td>
                                                <td class="text-left">মোঃ আরিফ হোসেন</td>
                                                <td>Uttara Sector 5</td>
                                                <td>100</td>
                                                <td>2022-10-16</td>
                                                <td>new</td>
                                                <td>11</td>
                                                <td class="text-right">100</td>


                                                <td>Mahfuz Akand</td>
                                                <td>
                                                    <form method="POST" action="">
                                                        <button type="submit" class="badge badge-danger show_confirm"
                                                            title="Delete" style="cursor: pointer; color: white"><i
                                                                class="os-icon os-icon-ui-15 "></i></button>
                                                    </form>

                                                    <a href="" class="btn btn-info btn-sm"> <i style="color:#fff;"
                                                            class="fa fa-print"></i> </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="addModal" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Passbook</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action=""
                                                enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Member Name</label>
                                                        <select name="member_id" id="member_id" class="select2"
                                                            required>
                                                            <option value="">Select Member or Search Member by Account
                                                                Number</option>
                                                            <option value="1">1 - মোঃ আরিফ হোসেন</option>
                                                            <option value="6">3 - Rakib</option>
                                                            <option value="5">2 - মোঃ ইউসুফ আরাফাত</option>
                                                            <option value="7">60 - আ রশিদ শেখ</option>


                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Passbook Number<span class="required"></span>
                                                        </label>
                                                        <input type="text" name="passbook_number" id="passbook_number"
                                                            class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Issue Date<span class="required"></span>
                                                        </label>
                                                        <input type="date" name="issue_date" id="issue_date"
                                                            class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Issue Type<span class="required"></span>
                                                        </label>
                                                        <select name="issue_type" id="issue_type" class="form-control"
                                                            required>
                                                            <option value="">Select Issue Type</option>
                                                            <option value="new">New</option>
                                                            <option value="re_issue">Re Issue</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Previous Number<span class="required"></span>
                                                        </label>
                                                        <input type="text" name="previous_number" id="previous_number"
                                                            class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Passbook Fee<span class="required"></span>
                                                        </label>
                                                        <input type="text" name="passbook_fee" id="passbook_fee"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                                <input name="moduleId" type="hidden" id="moduleId" value="">
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!--------------------END - Table with actions-------------------->
                                <!--------------------START - Controls below table-------------------->

                                <!--------------------END - Controls below table-------------------->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addModal(){
            $('#addModal').modal('show');
            $("#member_id").val('');
            $("#passbook_number").val('');
            $("#issue_date").val('');
            $("#issue_type").val('');
            $("#previous_number").val('');
            $("#passbook_fee").val('');
            $('#member_id').select2();

        }

        // function editModule(value){
        //     $('#addModal').modal('show');
        //     $("#member_id").val(value.member_id);
        //     $("#passbook_number").val(value.passbook_number);
        //     $("#issue_date").val(value.issue_date);
        //     $("#issue_type").val(value.issue_type);
        //     $("#previous_number").val(value.previous_number);
        //     $("#passbook_fee").val(value.passbook_fee);
        //     $('.select2').select2();
        //     $('#moduleId').val(value.id);
        // }

        // function deleteData(id){
        //     if(confirm('Are you sure to delete this Data?')){
        //         $('#delete-form-'+id).submit()
        //     }
        // }
    </script>
@endsection
