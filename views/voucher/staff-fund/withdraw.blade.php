@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="POST" action="{{ route('staff-fund.withdraw.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <button style="background-color: black" type="button" id="myButton5"
                                        class="btn btn-secondary btn-lg btn-block">Staff
                                        Fund Withdraw</button>
                                    <div class="element-box">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="staff_id" class="required">Staff Name</label>
                                                    <select class="form-control select2" required id="staff_id" name="staff_id">

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
                                                    <label for="current_balance">Current Balance</label>
                                                    <input class="form-control " disabled type="number"
                                                        id="current_balance">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="amount" class="required">Withdraw Amount</label>
                                                    <input class="form-control mainAmount" text-center required
                                                        name="amount" type="number" step=".01" id="amount">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="date">Withdraw Date</label>
                                                    <input type='date' value="{{ date('Y-m-d') }}" name="date" class="form-control text-center" />
                                                </div>
                                            </div>


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
    <div class="display-type"></div>
@endsection

@push('javascripts')
    <script type="text/javascript">
        $(document).ready(function() {

            $('#staff_id').on('change', function() {

                $('#staff_fund_amount').html('')
                $.ajax({
                    url: "{{ route('staff-fund.amount') }}",
                    type: 'post',
                    data: {
                        staff_id: $('#staff_id').val()
                    },
                    success: function(response) {
                        $('#current_balance').val(response)
                    },
                    error: function(error) {
                        console.log(error)
                    }
                })

            })

        })
    </script>
@endpush
