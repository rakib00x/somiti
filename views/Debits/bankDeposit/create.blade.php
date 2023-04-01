@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="POST" action="{{ route('bankDeposit.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <div class="element-box">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="account_id" class="required">Account Number</label>
                                                    <select class="form-control" required autofocus id="account_id"
                                                        name="account_id">
                                                        <option value="">-Select Any Bank And Account-</option>
                                                        @foreach ($banks as $bank)
                                                        <option value="{{ $bank->id }}">{{ $bank->name }} ({{ $bank->account }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="branch">Branch Name</label>
                                                <input class="form-control" required name="branch"  type="text"
                                                    value="" id="branch">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="amount" class="required">Deposit Amount </label>
                                                    <input class="form-control" required name="amount"
                                                        type="number" id="amount">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="balance">Account Balance</label>
                                                    <input class="form-control" placeholder=""
                                                        readonly name="balance" type="text" id="balance">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="capture">Attachment</label>
                                                    <div class="form-control">
                                                        <input accept="image/*" capture name="attachment" type="file"
                                                            id="capture">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="details">Deposit Details</label>
                                                    <textarea rows="1" class="form-control" placeholder="Notes of deposit" name="details" cols="50"
                                                        id="details"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4"></div>
                                        <div>
                                            <br>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <input class="btn btn-primary btn-lg w-100 " type="submit" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

        // get bank account branch and balance
        $('#account_id').change(function(){
            var account_id = $('#account_id').val();

            var url = "{{ route('bank.amount') }}";
            $.ajax({
                type: 'get',
                url: url,
                data: {
                    'account_id': account_id
                },
                success: function(response) {
                    $('#branch').val(response.branch);
                    $('#balance').val(response.balance);
                }
            });
        });
    </script>

@endsection
