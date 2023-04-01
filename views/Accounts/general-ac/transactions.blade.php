@extends('layouts.frontend.app')

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <h2 class="heading_title">General Account</h2>
                            <div class="table-responsive">
                                <table class="table table-bordered table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Member') }}</th>
                                            <th>{{ __('Account') }}</th>
                                            <th>{{ __('Total Deposit') }}</th>
                                            <th>{{ __('Total Withdraw') }}</th>
                                            <th>{{ __('Current Balance') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td>{{ $member->m_name }}</td>
                                            <td>{{ $member->account }}</td>
                                            <td>{{ $member->total_deposit }}</td>
                                            <td>{{ $member->total_withdraw }}</td>
                                            <td>{{ $member->ac_balance }}</td>
                                            <td>{{ $member->active ? 'Active' : 'Inactive' }}</td>
                                            <td class="row-actions">
                                                <a href="{{ route('general-ac.deposit', $member->account) }}"
                                                    title="Deposit"><i class="far fa-money-bill-alt"></i></i></a>
                                                <a href="{{ route('general-ac.withdraw', $member->account) }}"
                                                    title="Withdraw"><i class="fas fa-hand-holding-usd"></i></a>
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
                                <h2 class="heading_title">General Account Transaction</h2>
                                <div class="table-responsive">
                                    <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="dataTable1"
                                                class="table table-bordered table-v2 table-striped dataTable no-footer"
                                                role="grid" aria-describedby="dataTable1_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc">#</th>
                                                        <th class="sorting">{{ __('Date') }}</th>
                                                        <th class="sorting">{{ __('Deposit') }}</th>
                                                        <th class="sorting">{{ __('Withdraw') }}</th>
                                                        <th class="sorting">{{ __('Balance') }}</th>
                                                        <th class="sorting">{{ __('Note') }}</th>
                                                        <th class="sorting">{{ __('Process By') }}</th>
                                                        <th class="sorting">{{ __('Action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @php
                                                        $general_ac_trans = $member
                                                            ->generalAc()
                                                            ->orderByDesc('date')
                                                            ->orderByDesc('id')
                                                            ->paginate(20);
                                                    @endphp
                                                    @forelse ($general_ac_trans as $general_ac)
                                                        <tr role="row" class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ date('d M Y', strtotime($general_ac->date)) }}</td>
                                                            <td>{{ $general_ac->deposit ? $general_ac->deposit : '-' }}
                                                            </td>
                                                            <td>{{ $general_ac->withdraw ? $general_ac->withdraw : '-' }}
                                                            </td>
                                                            <td>{{ $general_ac->balance_till_trans }}</td>
                                                            <td>{{ $general_ac->note }}</td>
                                                            <td>{{ $general_ac->processed_by }}</td>
                                                            <td class="row-actions">
                                                                @role('admin|manager')
                                                                    <a class="btn btn-sm btn-danger text-white"
                                                                        href="javascript:"
                                                                        data-href="{{ route('general-ac.transactions.delete', $general_ac->id) }}"
                                                                        data-action="delete"
                                                                        data-amount="{{ $general_ac->deposit ?? $general_ac->withdraw }}">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                @endrole
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="8">{{ __('No transaction made yet') }}</td>
                                                        </tr>
                                                    @endforelse

                                                </tbody>
                                            </table>
                                            {{ $general_ac_trans->links() }}
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
