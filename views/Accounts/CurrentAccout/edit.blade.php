@extends('layouts.frontend.app')

@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-box my-0" id="add_form">
                        <a href="{{ route('current-account.index') }}" class="btn btn-info btn-sm">Back</a>
                        <h6 class="heading_title">Edit Current Account</h6>
                        <form method="POST" action="{{ route('current_account.update') }}">
                            @csrf
                            <input type="hidden" name="account_id" value="{{ $currentAc->account_id }}">
                            <div class="row">
                                <div class="col-sm-6 m-auto">
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input class="form-control" name="date" type="date" id="date" value="{{ date('Y-m-d') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="target_amount">Target Amount</label>
                                        <input type="text" name="target_amount" id="target_amount" class="form-control" placeholder="Target Amount" required value="{{ $currentAc->amount ?? '0' }}">
                                    </div>
                                </div>
                               
                            </div>
                            <div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
