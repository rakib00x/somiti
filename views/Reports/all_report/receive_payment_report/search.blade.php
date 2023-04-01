@extends('layouts.frontend.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="element-box">
                <form method="POST" action="{{ route('reports.receive-payment.index') }}" accept-charset="UTF-8"
                    class="form-inline justify-content-center">
                    @csrf


                    <div class="form-element control-rounded text-center">

                        <select class="form-control rounded" name="branch_id">
                            <option selected="selected" value="">All branch</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>

                        <label for="start_date" class="sr-only toy">Start</label>
                        <input class="form-control rounded toy text-center" placeholder="Select Filter" required=""
                            name="start_date" type="date" value="{{ date('Y-m-d') }}" id="start_date">

                        <label for="end_date" class="sr-only toy">End</label>
                        <input class="form-control rounded toy text-center" placeholder="Select Filter" required=""
                            name="end_date" type="date" value="{{ date('Y-m-d') }}" id="end_date">


                        <input class="btn btn-rounded btn-primary" type="submit" value="GO">
                    </div>
                </form>



            </div>
        </div>
    </div>
@endsection
