@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="row border">
                                <div class="col-sm-9 border">
                                    <table class="table table-sm table-striped ">
                                        <tbody>
                                            <tr>
                                                <td>{{ __('Account') }}</td>
                                                <td>{{ $member->account }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Area') }}</td>
                                                <td colspan="4">{{ $member->area->name }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Name') }}</td>

                                                <td colspan="4">{{ $member->m_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Address') }}</td>
                                                <td colspan="4">{{ $member->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Phone') }}</td>
                                                <td>{{ $member->m_mobile }}</td>
                                            </tr>

                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center">
                                    <img id="photoF" src="{{ asset($member->photo) }}"
                                        style="max-height:180px; max-width:300px;" class="text-center">
                                    <img id="signatureF" src="{{ asset('storage/member/' . $member->m_signature) }}"
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
                            <form method="POST" action="{{ route('cc_loan.store') }}" accept-charset="UTF-8"
                               note="Press OK to create CC loan account using following information."
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="hidden" name="account_id" value="{{ $member->account }}">
                                        <div class="form-group row">
                                            <label for="date" class="col-form-label col-sm-4">Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="No need to select date for Today" name="date"
                                                    type="date" id="date">


                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="type" class="col-form-label col-sm-4">CC Loan Type</label>
                                            <div class="col-sm-8">
                                                <select class="form-control text-center" required id="type"
                                                    name="type">
                                                    <option value="1">Fixed</option>
                                                    <option value="2" selected="selected">Installment (Monthly)
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="loan_amount" class="col-form-label col-sm-4">Loan Amount</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center mainAmount calculate" required
                                                    name="loan_amount" type="number" id="loan_amount"
                                                    value="{{ old('loan_amount') }}">
                                                @error('loan_amount')
                                                    <span class=" text-danger text-sm"></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="installment_sequence" class="col-form-label col-sm-4">Installment
                                                Sequence</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Installment Sequence"
                                                     name="installment_sequence" type="number"
                                                    id="installment_sequence">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="details" class="col-form-label col-sm-4">Details</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="Note about this loan account. For no note keep this blank."
                                                    rows="1" name="details" type="text" id="details">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="stamp_fee" class="col-form-label col-sm-4">Stamp Fee (if
                                                applicable)</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="Input amount or keep blank" name="stamp_fee" type="number"
                                                    step="any" id="stamp_fee">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="category_id"
                                                class="col-form-label col-sm-4">Loan&nbsp;Category</label>
                                            <div class="col-sm-8">
                                                <div class="input-group mb-3 ccloancate">
                                                    <select class="form-control" required="" id="category_id"
                                                        name="category_id" value="{{ old('category_id') }}">
                                                        <option value="">Select a loan category</option>
                                                        @foreach ($loanCategories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <a type="button" class="btn btn-info" data-toggle="modal"
                                                            data-target="#exampleModal">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="start_date" class="col-form-label col-sm-4">Start Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="No need to select date for Today" name="start_date"
                                                    type="date" id="start_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row fixed">
                                            <label for="expire_date" class="col-form-label col-sm-4">Date of
                                                expire</label>
                                            <div class="col-sm-8 expire">
                                                <input class="form-control text-center"
                                                    placeholder="No need to select date for Today" name="expire_date"
                                                    type="date" id="expire_date">
                                            </div>
                                            <!--<div class="col-sm-3 month">-->
                                            <!--    <input class="form-control text-center" placeholder="Days" name="duration" type="number">-->
                                            <!--</div>-->
                                        </div>
                                        <div class="form-group row">
                                            <label for="profit_amount" class="col-form-label col-sm-4">Profit % /
                                                Amount</label>
                                            <div class="col-sm-4 input-group">
                                                <input id="profit_rate" step="any"
                                                    class="form-control text-center calculate"
                                                    placeholder="Profit Percent" name="profit_rate" type="number">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">%</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <input step="any" id="profit_amount"
                                                    class="form-control text-center calculate"
                                                    placeholder="Total Profit Amount" required name="profit_amount"
                                                    type="number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="installment_amount" class="col-form-label col-sm-4">Installment
                                                Amount</label>
                                            <div class="col-sm-8">
                                                <input step="any" class="form-control text-center"
                                                    placeholder="Installment Amount" readonly name="installment_amount"
                                                    type="number" id="installment_amount">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="panalty_amount" class="col-form-label col-sm-4">Penalty per
                                                Installment</label>
                                            <div class="col-sm-8 input-group">
                                                <input step="any" id="panalty_amount"
                                                    class="form-control text-center" placeholder="Penalty Amount"
                                                    name="panalty_amount" type="number">

                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label for="note" class="col-form-label col-sm-4">Attachment</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Attachment file"
                                                    capture accept="image/*" style="padding: 3px" name="attachment"
                                                    type="file">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="process" class="col-form-label col-sm-4">Processing Fee (if
                                                applicable)</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="Input amount or keep blank" name="processing_fee"
                                                    step="any" type="number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="admission_fee" class="col-form-label col-sm-4">Admission Fee (if
                                                applicable)</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="Input amount or keep blank" name="admission_fee"
                                                    type="number" id="admission_fee">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="insurance_fee" class="col-form-label col-sm-4">Insurance Fee
                                                (if applicable)</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="Input amount or keep blank" name="insurance_fee"
                                                    type="number" id="insurance_fee">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5"></div>
                                    <div class="col-sm-12 text-right">
                                        <input class="btn btn-primary btn-block" type="submit" value="Submit">
                                    </div>
                                    <div class="col-sm-3"></div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="display-type"></div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <form action="" method="POST" id="addccloancategory">
                @csrf
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New CC Loan Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="errormsg">

                            </div>

                            <div class="form-group">
                                <label for="title">Name</label>
                                <input class="form-control" placeholder="Category Name" name="title" type="text"
                                    id="title">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success add_cc_category">Save</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>


        <script>
            $(document).ready(function() {
                $(document).on('click', '.add_cc_category', function(e) {
                    e.preventDefault();
                    let title = $('#title').val();
                    var url = "{{ route('ccloancategory.store') }}";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            'title': title
                        },
                        success: function(res) {
                            if (res.status == 'success') {
                                $('#exampleModal').modal('hide');
                                $('#addccloancategory')[0].reset();
                                $('.ccloancate').load(location.href + ' .ccloancate');
                            }
                        },
                        error: function(error) {
                            for (var [el, message] of Object.entries(error.responseJSON.errors)) {
                                toastr.error(message);
                            }
                        }
                    });
                })
            });
        </script>


        <script>
            document.getElementById('date').valueAsDate = new Date();
            document.getElementById('start_date').valueAsDate = new Date();



            function setExpireDate() {
                if ($('#type').val() == '1') {
                    $("#expire_date").prop('readonly', false);
                    $("#installment_sequence").prop('readonly', true);
                    $("#expire_date").prop('required', true);
                    $("#installment_sequence").val(null);
                    
                } else {
                    $("#expire_date").prop('readonly', true);
                    $("#installment_sequence").prop('readonly', false);
                    $("#installment_sequence").prop('required', true);
                    
                }

            }
            $('#type').change(function() {
                setExpireDate()
            })


            $('#loan_amount').keyup(function() {

                calcProfitRate()
                calcProfitAmount();
            });

            $('#profit_rate').keyup(function() {

                calcProfitAmount();
            });

            $('#profit_amount').keyup(function() {

                calcProfitRate();
            });


            function calcProfitAmount() {
                var loan_amount = $('#loan_amount').val();
                var profit_rate = $('#profit_rate').val();
                var profit_amount = $('#profit_amount').val();




                if (loan_amount && profit_rate) {
                    var calculated_profit_amount = (parseFloat(loan_amount) * parseFloat(profit_rate)) / 100;
                    $('#profit_amount').val(calculated_profit_amount);

                }

                $('#installment_amount').val($('#profit_amount').val());
            }


            function calcProfitRate() {
                var loan_amount = $('#loan_amount').val();
                var profit_rate = $('#profit_rate').val();
                var profit_amount = $('#profit_amount').val();



                if (loan_amount && profit_amount) {
                    var calculated_profit_rate = (parseFloat(profit_amount) * 100) / loan_amount;
                    $('#profit_rate').val(calculated_profit_rate);
                }

                $('#installment_amount').val($('#profit_amount').val());

            }


            function dateFormat(inputDate, format) {
                //parse the input date
                const date = new Date(inputDate);

                //extract the parts of the date
                const day = date.getDate();
                const month = date.getMonth() + 1;
                const year = date.getFullYear();

                //replace the month
                format = format.replace("MM", month.toString().padStart(2, "0"));

                //replace the year
                if (format.indexOf("yyyy") > -1) {
                    format = format.replace("yyyy", year.toString());
                } else if (format.indexOf("yy") > -1) {
                    format = format.replace("yy", year.toString().substr(2, 2));
                }

                //replace the day
                format = format.replace("dd", day.toString().padStart(2, "0"));
                
                return format;
            }


            function calculate_future_date() {
                let start_date = new Date($('#start_date').val());
                let duration = parseInt($('#installment_sequence').val());
                
                let result = start_date.setDate(start_date.getDate() + duration);
                $('#expire_date').val(dateFormat(result, 'yyyy-MM-dd'));

            }

            $('#start_date').on('change', function() {
                calculate_future_date()
            })

            $('#installment_sequence').keyup(function() {
                calculate_future_date()
            })

            $(document).ready(function() {
                setExpireDate();
                calculate_future_date();
            })
        </script>
    @endsection
