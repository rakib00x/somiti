@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <form method="POST" action="{{ route('fdr-balance-transaction.search') }}" accept-charset="UTF-8"
                                class="form-inline justify-content-center">
                                @csrf
                                <div class="form-element control-rounded text-center d-flex flex-column">

                                    <input class="form-control rounded text-center mainAmount" required="" autofocus=""
                                        name="account" type="number" id="account" placeholder="Account Number">

                                    <input class="btn btn-primary btn-lg mt-3" type="submit" value="Search">
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script></script>
@endsection
