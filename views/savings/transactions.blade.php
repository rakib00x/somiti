@extends('layouts.frontend.app', ['pageTitle' => 'Savings Deposits'])

@push('style')
    <style>
        tbody *:not(.row-actions) {
            font-size: 0.8rem !important;
        }
    </style>
    <style media="print" id="styleForPrinting">
        #printContent {
            padding-top: 2in !important;
            padding-bottom: 2in !important;
            font-size: 20pt !important;
        }

        @media print {
            .dataTables_info {
                display: none;
            }

            #example1_paginate,
            #example1_length,
            #example1_filter {
                display: none;
            }

            #actionth,
            .row-actions,
            .pagination {
                display: none;
            }
        }
    </style>
    <script>
        function printContent(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var printStyle = document.getElementById("styleForPrinting").outerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printStyle + printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endpush

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <h2 class="heading_title">Dps account</h2>
                <a href="{{ route('savings.index') }}" class="btn btn-info btn-sm mb-4">
                    <span>Back</span>
                </a>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box" id="printArea">
                            <!--------------------START - Table with actions-------------------->
                            <div class="table-responsive" id="printContent">
                                <table  class="table table-bordered table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>Member</th>
                                            <th>Account</th>
                                            <th>Target Amount</th>
                                            <th>Total Installment</th>
                                            <th>Per Installment</th>
                                            <th>Start Date</th>
                                            <th>Expire Date</th>
                                            <th>Paid Amount</th>
                                            {{-- <th>Due Amount</th> --}}
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td>{{ $savings->member->m_name }}</td>
                                            <td>{{ $savings->account_id }}</td>
                                            <td>{{ $savings->installment * $savings->savings_amount }}</td>
                                            <td>{{ $savings->count_installment ?? 0 }}/{{ $savings->installment }}</td>
                                            <td>{{ $savings->savings_amount }}</td>
                                            <td>{{ date('d M Y', strtotime($savings->start_date)) }}</td>
                                            <td>{{ date('d M Y', strtotime($savings->expire_date)) }}</td>
                                            <td>{{ $savings->balance }}</td>
                                            {{-- <td>{{ $savings->due }}</td> --}}
                                            <td>{!! $savings->status_html !!}</td>
                                            <td>
                                                <a href="{{ route('savings.deposit.create', $savings->id) }}"
                                                    title="Take Deposit" class="p-2 text-white badge badge-primary">
                                                    <i class="fas fa-money-bill-alt"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">

                            <div class="element-box">
                                <h2 class="heading_title">Dps account transaction</h2>
                                <div class="table-responsive">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="dataTable1" class="table table-bordered table-v2 table-striped">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>#</th>
                                                            <th>Code</th>
                                                            <th>Date</th>
                                                            <th>Deposite</th>
                                                            <th>Withdraw</th>
                                                            <th>Balance</th>
                                                            <th>Profit</th>
                                                            <th>Penalty</th>
                                                            {{-- <th>Note</th> --}}
                                                            <th>Process_by</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">

                                                        @forelse ($savings->transactions_desc as $transaction)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $transaction->code }}</td>
                                                                <td>{{ date('d M Y', strtotime($transaction->date)) }}</td>
                                                                <td>{{ $transaction->deposit ? $transaction->deposit : '-' }}
                                                                </td>
                                                                <td>{{ $transaction->withdraw ? $transaction->withdraw : '-' }}
                                                                </td>
                                                                <td>{{ $transaction->last_balance }}</td>
                                                                <td>{{ $transaction->profit ? $transaction->profit : '-' }}
                                                                </td>
                                                                <td>{{ $transaction->penalty ?? '-' }}</td>
                                                                {{-- <td>{{ $transaction->note }}</td> --}}
                                                                <td>{{ $transaction->processed_by }}</td>
                                                                <td class="row-actions">
                                                                    @role('admin|manager')
                                                                        <a class="btn btn-sm btn-danger text-white"
                                                                            href="javascript:"
                                                                            data-href="{{ route('savings.transactions.detele', $transaction->id) }}"
                                                                            data-action="delete"
                                                                            data-amount="{{ $transaction->deposit ?? $transaction->withdraw }}">
                                                                            <i class="fa fa-trash"></i>
                                                                        </a>
                                                                    @endrole
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="10"> No transaction made yet </td>
                                                            </tr>
                                                        @endforelse

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
