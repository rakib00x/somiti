@extends('layouts.frontend.app')

@push('style')
    <style>
        tbody *:not(.row-actions) {
            font-size: 0.8rem !important;
        }
    </style>
@endpush

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">


                <div class="table-responsive">
                    <table id="" class="table table-bordered table-v2 table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Acc</th>
                                <th>Area</th>
                                <th>Scheme</th>
                                <th>Duration</th>
                                <th>Inst.</th>
                                <th>Inst. Amt.</th>
                                <th>Ledg.</th>
                                <th>Product</th>
                                <th>Principal</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <tr>
                                <td>{{ $loan->member->m_name }}</td>
                                <td>{{ $loan->account_id }}</td>
                                <td>{{ $loan->member->area->name }}</td>
                                <td>{{ Str::ucfirst($loan->scheme) }}</td>
                                <td>
                                    <small>{{ date('d M Y', strtotime($loan->date)) }} -
                                        {{ date('d M Y', strtotime($loan->expire_date)) }}</small>
                                </td>
                                <td>{{ $loan->installment_count }}/{{ $loan->installment }}</td>
                                <td>{{ $loan->installment_amount }}</td>
                                <td>{{ $loan->ledger_no }}</td>
                                <td>{{ $loan->product ? $loan->product : '-' }}</td>
                                <td>{{ $loan->loan_amount }}</td>
                                <td>{{ $loan->total_amount }}</td>
                                <td>{{ $loan->total_paid }}</td>
                                <td>{{ $loan->due_amount }}</td>
                                <!-- <td>Running</td> -->
                                <td>
                                    @if ($loan->status == '1')
                                        <span class="text-warning font-weight-bold small">Pending</span>
                                    @elseif ($loan->status = '2')
                                        <span class="text-info font-weight-bold small">Approved</span>
                                    @elseif ($loan->status = '3')
                                        <span class="text-success font-weight-bold small">Completed</span>
                                    @else
                                        <span class="text-danger font-weight-bold small">Rejected</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">

                    <div class="col-sm-12">
                        <div class="element-header">
                            <form method="POST" action="{{ route('loan.collect.store', $loan->id) }}"
                                accept-charset="UTF-8" note="Are you sure about all information and amount are OK?">
                                @csrf
                                <input name="loan_id" type="hidden" value="{{ $loan->id }}">

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="date"
                                                class="col-form-label col-sm-4">{{ __('Date of Collection') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" name="date" type="date"
                                                    id="date" value="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="scheme"
                                                class="col-form-label col-sm-4">{{ __('Scheme') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="Something error. Please refresh page" disabled=""
                                                    name="scheme" type="text" value="Daily" id="scheme">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="installment_principal"
                                                class="col-form-label col-sm-4">{{ __('Per Installment') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="Something error. Please refresh page" readonly=""
                                                    name="installment_principal" type="number"
                                                    value="{{ $loan->installment_amount }}" id="installment_principal">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="install_receivable"
                                                class="col-form-label col-sm-4">{{ __('Total Receivable') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="Something error. Please refresh page" disabled=""
                                                    name="install_receivable" type="number"
                                                    value="{{ $loan->total_amount }}" id="install_receivable">
                                            </div>
                                        </div>


                                        {{-- <div class="form-group row">
                                            <label for="install_dues" class="col-form-label col-sm-4">Installment
                                                Overdue</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" disabled="" name="install_dues"
                                                    type="text" value="85" id="install_dues">
                                            </div>
                                        </div> --}}


                                        <div class="form-group row">
                                            <label for="install_received"
                                                class="col-form-label col-sm-4">{{ __('Installment Received') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" disabled=""
                                                    name="install_received" type="number" value="{{ $loan->total_paid }}"
                                                    id="install_received">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="install_due"
                                                class="col-form-label col-sm-4">{{ __('Installment Due') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" disabled="" name="install_due"
                                                    type="number" value="{{ $loan->due_amount }}" id="install_due">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="install_receive"
                                                class="col-form-label col-sm-4 required">{{ __('Todays Received') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center mainAmount required" step="any"
                                                    required="" autofocus="" max="{{ $loan->total_amount }}"
                                                    name="amount" type="number" id="install_receive">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="install_penalty"
                                                class="col-form-label col-sm-4">{{ __('Fine for Investment') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center " name="penalty" type="number"
                                                    value="0" id="install_penalty">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="note"
                                                class="col-form-label col-sm-4">{{ __('Collection Note') }}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" name="note" type="text"
                                                    id="note">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3"></div>
                                </div>
                                <div>
                                    <br>
                                </div>



                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <input class="btn btn-primary btn-lg w-50" type="submit" value="Submit">
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
