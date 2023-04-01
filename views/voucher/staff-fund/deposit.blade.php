@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="POST" action="{{ route('staff-fund.deposit.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <button type="button" style="background-color: black"
                                        class="btn btn-secondary btn-lg btn-block">Staff Fund
                                        Deposit</button>
                                    <div class="element-box">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="staff_id" class="required">Staff Name</label>
                                                    <select  class="select2 form-control "
                                                        id="staff_id" name="staff_id">
                                                        <option value="" >Select A Staff</option>
                                                        @foreach ($staffs as $staff)
                                                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="member_id">Account</label>
                                                    <select  class="select2 form-control "
                                                        id="member_id" name="member_id">
                                                        <option value="">Select A Member</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="amount" class="required">Deposit Amount</label>
                                                    <input  class="form-control mainAmount"
                                                        text-center name="amount" type="number" step=".01"
                                                        id="amount" value="{{ old('amount') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="date">Deposit Date</label>
                                                    <input  type='date'
                                                        name="date" class="form-control text-center"
                                                        value="{{ old('date') }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="details">Deposit Details</label>
                                                    <textarea  rows="1" class="form-control" placeholder="Notes of deposit"
                                                        name="details" cols="50" id="details">{{ old('') }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="select-form row">
                                                    <div class="col-md-12">
                                                        <label for="deposit_type">Type</label>
                                                        <div class="input-group rounded mb-3 purpose"
                                                           >
                                                            <select name="deposit_type" id="deposit_type" class="form-control">
                                                                @foreach ($purposes as $purpose)
                                                                    <option value="{{ $purpose->id }}">
                                                                        {{ $purpose->title }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-group-append">
                                                                <a type="button" class="btn btn-info" data-toggle="modal"
                                                                    data-target="#exampleModal">
                                                                    <svg class="svg-inline--fa fa-plus fa-w-14"
                                                                        aria-hidden="true" focusable="false"
                                                                        data-prefix="fa" data-icon="plus" role="img"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 448 512" data-fa-i2svg="">
                                                                        <path fill="currentColor"
                                                                            d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
                                                                        </path>
                                                                    </svg>
                                                                    <!-- <i class="fa fa-plus"></i> Font Awesome fontawesome.com -->
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4"></div>
                                        <div>
                                            <br>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <input class="btn btn-primary w-100 " type="submit" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="" method="POST" id="add_purpose_form">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Purpose</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="errormsg">

                        </div>

                        <div class="form-group">
                            <label for="title">Name</label>
                            <input class="form-control" placeholder="Purpose Name" name="title" type="text"
                                id="title">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success add_purpose">Save</button>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.add_purpose', function(e) {
                e.preventDefault();
                let title = $('#title').val();
                var url = "{{ route('staff-deposit-purpose.store') }}";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        'title': title
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#exampleModal').modal('hide');
                            $('#add_purpose_form')[0].reset();
                            $('.purpose').load(location.href + ' .purpose');
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




    <script type="text/javascript">
        $(document).ready(function() {

            $('#staff_id').on('change', function() {

                $('#member_id').select2({
                    placeholder: "Select Member",

                    ajax: {
                        url: "{{ route('staff-fund.members') }}",
                        dataType: 'json',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',

                        },
                        data: function(term) {
                            return {
                                term: term,
                                staff_id: $('#staff_id').val()
                            };
                        },

                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: item.m_name,
                                        id: item.id
                                    }
                                })
                            }
                        }
                    }

                })

            })

        })
    </script>
@endsection
