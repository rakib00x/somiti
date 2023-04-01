@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <form method="POST" action="{{ route('reports.user-collection.index') }}" accept-charset="UTF-8"
                                class="form-inline justify-content-center">

                                @csrf
                                <div class="form-element control-rounded text-center">
                                    <label for="staff_id" class="sr-only">Staff</label>

                                    <select class="form-control rounded" autofocuse id="staff_id" name="staff_id">
                                        <option selected="selected" value="">All Staffs</option>
                                        @foreach ($staffs as $staff)
                                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                        @endforeach
                                    </select>

                                    <label for="start_date" class="sr-only toy required">Start</label>
                                    <input class="form-control rounded toy text-center" placeholder="Select Filter" required
                                        name="start_date" type="date" value="{{ date('Y-m-d') }}" id="start_date">
                                    <label for="end_date" class="sr-only toy required">End</label>
                                    <input class="form-control rounded toy text-center" placeholder="Select Filter" required
                                        name="end_date" type="date" value="{{ date('Y-m-d') }}" id="end_date">

                                    <select class="form-control rounded" name="type">
                                        <option selected="selected" value="">All Type</option>
                                        <option value="general">General Accounts</option>
                                        <option value="dps">DPS Coll</option>
                                        <option value="loan">Loan installments</option>
                                        <option value="fdr">Fixed Deposit</option>
                                        <option value="cc_loan">CC Inst. Coll</option>
                                    </select>
                                    <input class="btn btn-primary" type="submit" value="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="display-type"></div>
@endsection
