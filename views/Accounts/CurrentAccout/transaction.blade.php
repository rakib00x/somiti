@extends('layouts.frontend.app')

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <h4 class="heading_title">Current Account</h4>
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
                                            <td>{{ $current_account->members->m_name }}</td>
                                            <td>{{ $current_account->account_id }}</td>
                                            <td>{{ $current_account_transactions->sum('deposit_amount') }}</td>
                                            <td>{{ $current_account_transactions->sum('withdraw') }}</td>
                                            <td>{{ $current_account->total_current_balance }}</td>
                                            <td>{{ $current_account->status ==1 ? 'Active' : 'Inactive' }}</td>
                                            <td class="row-actions">
                                                <a href="{{ route('current-account.use', $current_account->account_id) }}"
                                                    title="Deposit"><i class="far fa-money-bill-alt"></i></i></a>
                                                <a href="{{ route('current-account.withdraw', $current_account->account_id) }}"
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
                                <h4 class="heading_title">All Transaction List</h4>
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
                                                        <th class="sorting">{{ __('Process By') }}</th>
                                                        <th class="sorting">{{ __('Action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @forelse ($current_account_transactions as $current_account_transaction)
                                                        <tr role="row" class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ date('d M Y', strtotime($current_account_transaction->date)) }}</td>
                                                            <td>{{ $current_account_transaction->deposit_amount ? $current_account_transaction->deposit_amount : '-' }}
                                                            </td>
                                                            <td>{{ $current_account_transaction->withdraw ? $current_account_transaction->withdraw : '-' }}
                                                            </td>
                                                            <td>{{ $current_account_transaction->balance_till_trans }}</td>
                                                            <td>{{ $current_account_transaction->posted_by }}</td>
                                                            <td class="row-actions">
                                                                @role('admin|manager')
                                                                    <a class="btn btn-sm btn-danger text-white" href="{{ route('current-account.transactions.delete', $current_account_transaction->id) }}">
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
                                            {{ $current_account_transactions->links() }}
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
@endsection
