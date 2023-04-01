@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="element-header text-center">New Get Out Loan</h6>
                        <div class="element-box">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <form method="POST" action="{{ route('getoutloan.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group row col-sm-12">
                                                <label for="out_loan" class="col-sm-4">Loan Account Name</label>
                                                <div class="col-sm-8">
                                                    <select name="out_loan" id="out_loan" class="form-control"
                                                        required="" autofocus>
                                                        <option value="">Select Out Loan AC Name</option>
                                                        @foreach ($outLoanlist as $list)
                                                            <option value="{{ $list->id }}">{{ $list->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-sm-12">
                                                <label for="branch" class="col-sm-4">Branch Name</label>
                                                <div class="col-sm-8">
                                                   <input type="text" class="form-control" readonly id="branch" name="branch" value="Main Branch">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-sm-12">
                                                <label for="balance" class="col-sm-4">Current Balance</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" id="balance"
                                                        placeholder="Current balance" readonly  name="balance"
                                                        type="number" value="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-sm-12">
                                                <label for="deposit" class="col-sm-4">Deposit Amount</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" id="deposit_amount"
                                                        placeholder="Amount of deposit" required name="amount"
                                                        type="number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-sm-12">
                                                <label for="details" class="col-sm-4">Deposit Details</label>
                                                <div class="col-sm-8">
                                                    <textarea rows="1" class="form-control" placeholder="Select Account Status" name="details" cols="50"
                                                        id="details"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-sm-12">
                                                <label for="capture" class="col-sm-4">Attachment</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" placeholder="Select Attachment"
                                                        accept="image/*" capture name="attachment" type="file"
                                                        id="capture">
                                                </div>
                                            </div>
                                        </div>
                                        <div>

                                            <div class="row">
                                                <div class="form-group row col-sm-12">
                                                    <label for="interest" class="col-sm-4">Interest</label>
                                                    <div class="col-sm-8">
                                                        <div class="row form-group">
                                                            <div class="col-sm-6 input-group">
                                                                <input type="number" id="out_loan_percent"
                                                                    class="form-control" name="out_loan_percent"
                                                                    placeholder="Interest Percent">
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text">%</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="number" id="interest" class="form-control"
                                                                    name="interest" placeholder="Interest Value">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <input class="btn btn-primary btn-block" type="submit" value="Submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        // get out loan automatic current balance
        $('#out_loan').change(function(){
            var out_loan_id = $('#out_loan').val();

            var url = "{{ route('outloan.balance') }}";
            $.ajax({
                type: 'get',
                url: url,
                data: {
                    'out_loan_id': out_loan_id
                },
                success: function(response) {
                     $('#balance').val(response.current_balance);
                }
            });
        });

        // get out loan percentage
        $('#deposit_amount').on('input', function() {
            total()
        });
        $('#out_loan_percent').on('input', function() {
            total()
        });

        function total() {
            let deposit_amount = $('#deposit_amount').val();
            let out_loan_percent = $('#out_loan_percent').val();
            var interest = Number(deposit_amount)-(Number(deposit_amount)/100) * Number(out_loan_percent);
            var totalInterest = deposit_amount-interest;
            $('#interest').val(Number(totalInterest));
        }
    </script>

@endsection
