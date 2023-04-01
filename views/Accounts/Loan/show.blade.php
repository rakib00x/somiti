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
                <h2 class="heading_title">Loan account</h2>
                <div class="table-responsive">
                    <table id="" class="table table-bordered table-v2 table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Acc') }}</th>
                                <th>{{ __('Area') }}</th>
                                <th>{{ __('Scheme') }}</th>
                                <th>{{ __('Duration') }}</th>
                                <th>{{ __('Inst') }}.</th>
                                <th>{{ __('Inst. Amt.') }}</th>
                                <th>{{ __('Ledg.') }}</th>
                                <th>{{ __('Profit %') }}</th>
                                <th>{{ __('Profit Amount') }}</th>
                                <th>{{ __('Principal') }}</th>
                                <th>{{ __('Total') }}</th>
                                <th>{{ __('Paid') }}</th>
                                <th>{{ __('Due') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>{{ $loan->member->m_name }}</td>
                                <td>{{ $loan->account_id }}</td>
                                <td>{{ $loan->member->area->name }}</td>
                                <td>{{ Str::ucfirst($loan->scheme) }}</td>
                                <td>
                                    {{ date('d M Y', strtotime($loan->date)) }} -
                                    {{ date('d M Y', strtotime($loan->expire_date)) }}
                                </td>
                                <td>{{ $loan->installment_count }}/{{ $loan->installment }}
                                </td>
                                <td>{{ $loan->installment_amount }}</td>
                                <td>{{ $loan->ledger_no }}</td>
                                <td>{{ $loan->percent }}</td>

                                <td>{{ $loan->total_profit }}</td>
                                <td>{{ $loan->loan_amount }}</td>
                                <td>{{ $loan->total_amount }}</td>
                                <td>{{ $loan->total_paid }}</td>
                                <td class="text-danger font-weight-bold">{{ $loan->due_amount }}</td>
                                <td>
                                    @if ($loan->status == '1')
                                        <span class="text-warning font-weight-bold small">{{ __('Pending') }}</span>
                                    @elseif ($loan->status = '2')
                                        <span class="text-info font-weight-bold small">{{ __('Approved') }}</span>
                                    @elseif ($loan->status = '3')
                                        <span class="text-success font-weight-bold small">{{ __('Completed') }}</span>
                                    @else
                                        <span class="text-danger font-weight-bold small">{{ __('Closed') }}</span>
                                    @endif
                                </td>
                                <td class="row-actions">
                                    <a href="{{ route('loan.collect.create', $loan->id) }}" title="Collection"
                                        style="color: green"><i class="fa fa-plus-circle"></i></a>
                                </td>
                            </tr>
                    </table>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="heading_title">Loan account transaction</h2>
                        <table id="dataTable1"
                            class="table table-bordered table-v2 table-striped dataTable no-footer" role="grid"
                            aria-describedby="dataTable1_info">
                            <thead>
                                <tr role="row">
                                    <th>#</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Principle') }}</th>
                                    <th>{{ __('Profit') }}</th>
                                    <th>{{ __('Amount') }}</th>
                                    <th>{{ __('Fine') }}</th>
                                    <th>{{ __('Note') }}</th>
                                    <th>{{ __('Process_by') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($loan->installments()->get()->sortByDesc('id') as $install)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d M Y', strtotime($install->date)) }}</td>
                                        @php
                                            $profit_inst = $install->amount * $loan->percent / 100;
                                            $count_inst = $install->amount - $profit_inst;
                                        @endphp
                                        <td>{{ $count_inst }}</td>
                                        <td>{{ $profit_inst }}</td>
                                        <td>{{ $install->amount }}</td>
                                        <td>{{ $install->penalty }}</td>
                                        <td>{{ $install->note ? $install->note : '-' }}</td>
                                        <td>{{ $install->processed_by }}</td>
                                        <td class="row-actions">
                                            @role('admin|manager')
                                                <a class="btn btn-sm btn-danger text-white" href="javascript:"
                                                    data-href="{{ route('loan.collect.delete', $install->id) }}"
                                                    data-action="delete" data-amount="{{ $install->amount }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            @endrole
                                        </td>
                                    </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const custAction = document.querySelectorAll("[data-action='delete']");
        custAction.forEach(element => {
            element.addEventListener('click', function() {
                if (confirm(`Are you sure? You want to delete [${this.dataset.amount}]`)) {
                    const _deleteForm = document.createElement('form');
                    _deleteForm.action = this.dataset.href;
                    _deleteForm.method = "POST";
                    const _csrfToken = document.createElement('input');
                    _csrfToken.name = "_token";
                    _csrfToken.type = "hidden";
                    _csrfToken.value = "{{ csrf_token() }}";
                    _deleteForm.appendChild(_csrfToken);
                    const _method = document.createElement('input');
                    _method.name = "_method";
                    _method.type = "hidden";
                    _method.value = "DELETE";
                    _deleteForm.appendChild(_method);
                    this.insertAdjacentElement("afterend", _deleteForm);

                    _deleteForm.submit();
                }

            });
        });
    </script>
@endsection
