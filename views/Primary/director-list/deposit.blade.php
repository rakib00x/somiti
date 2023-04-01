@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <form method="POST" action="{{ route('directordeposit.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group row col-sm-12">
                                                <label for="director" class="col-sm-4">Director Name</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" required autofocus id="director"
                                                        name="director_id">
                                                        <option selected="selected" value="">Select director</option>
                                                        @foreach ($director_lists as $director_list)
                                                            <option value="{{ $director_list->id }}">{{ $director_list->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-sm-12">
                                                <label for="branch" class="col-sm-4">Branch Name</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" required id="branch" name="branch">
                                                        <option selected="selected" value="">Select branch</option>
                                                        <option value="1">Main Branch</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-sm-12">
                                                <label for="deposit" class="col-sm-4">Deposit Amount</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" placeholder="Amount of Deposit" required
                                                        name="amount" type="number" id="deposit">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group row col-sm-12">
                                                <label for="withdraw" class="col-sm-4">Balance</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" placeholder="" readonly
                                                        name="balance" type="number" id="balance">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group row col-sm-12">
                                                <label for="details" class="col-sm-4">Deposit Details</label>
                                                <div class="col-sm-8">
                                                    <textarea rows="1" class="form-control" placeholder="deposit details" name="details" cols="50"
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
                                            <br>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 m-auto text-center">
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
    <div class="display-type"></div>

    <script>
        $('#director').change(function(){
            var director_id = $('#director').val();
            var url = "{{ route('director.amount') }}";

            $.ajax({
                type: "get",
                url: url,
                data: {
                    'director_id':director_id
                },
                success: function (response) {
                    $('#balance').val(response.balance);
                }
            });
        });
    </script>
@endsection
