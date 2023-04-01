@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-6 offset-3">
                    <div class="element-box">
                        <div class="py-4">
                            <h6 class="element-header text-center pb-3">{{__('Please input withdrawal amount')}}</h6>
                            <form method="POST" action="{{ route('current-amount.withdraw', $current_account->account_id) }}" accept-charset="UTF-8" class="form-inline justify-content-center">
                                @csrf
                                {{-- @method('PUT') --}}
                                <input type="hidden" name="account" value="{{ $current_account->account_id }}">
                                <div class="form-element control-rounded input-group-sm text-center">
                                    <input class="form-control rounded-0 text-center" disabled value="Your balance : {{ $current_account->total_current_balance }}">
                                    <input class="form-control rounded-0 text-center" placeholder="Withdraw amount" required autofocus name="withdraw" type="number" id="withdraw">
                                    <input class="btn btn-sm rounded-0 btn-success" type="submit" value="Withdraw">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
