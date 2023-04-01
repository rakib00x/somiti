@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <div class="text-center">
                                <a href="{{ route('staff-fund.deposit') }}" class="btn btn-sm btn-success">Deposite</a>
                                <a href="{{ route('staff-fund.withdraw') }}" class="btn btn-sm btn-success">Withdraw</a>
                            </div>


                            <h6 class="element-header">{{ __('Staff Fund transactions') }}
                            </h6>

                            <form method="GET" action="{{ route('staff-fund-transaction.index') }}" accept-charset="UTF-8"
                                id="staff-search-form" class="form-inline justify-content-end mb-3" autocomplete="off">
                                <div class="form-element control-rounded text-center">
                                    <select name="staff_id" id="staff_id" class="form-control rounded">
                                        <option value="">All</option>
                                        @foreach ($staffs as $staff)
                                        <option value="{{ $staff->id }}" {{ request()->staff_id == $staff->id ? 'selected' : '' }}>{{ $staff->name }}
                                        </option>
                                        @endforeach

                                    </select>
                                  
                                </div>
                            </form>

                            <div class="element-box-tp">
                                <!--------------------START - Table with actions-------------------->
                                <div class="table">
                                    <table class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    <span class="badge badge-light" id="edit-button">
                                                        <i class="fa fa-pencil"></i>
                                                    </span>
                                                    <button type="submit" class="badge badge-light" id="submit-button"
                                                        style="display:none">
                                                        <i class='fa fa-upload'></i>
                                                    </button>
                                                </th>
                                                <th>{{ __('DATE') }}</th>
                                                <th>{{ __('Staff Name') }}</th>
                                                <th>{{ __('PURPOSE') }}</th>
                                                <th>{{ __('DEPOSIT') }}</th>
                                                <th>{{ __('WITHDRAW') }}</th>
                                                <th>{{ __('ACCOUNT NO') }}</th>
                                                <th>{{ __('MEMBER NAME') }}</th>
                                                <th>{{ __('TYPE') }}</th>
                                                <th>{{ __('PROCESS BY') }}</th>
                                                <th>{{ __('ACTION') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($transactions as $transaction)
                                                <tr class="text-center">
                                                    <td scope="row">{{ $loop->iteration }}</td>

                                                    <td>{{ $transaction->date }}</td>

                                                    <td>{{ $transaction->staff->name }}</td>
                                                    <td class="text-justify">
                                                        {{ $transaction->type == 'deposit' ? $transaction->purpose->title : '' }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $transaction->type == 'deposit' ? $transaction->amount : '0.00' }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $transaction->type == 'withdraw' ? $transaction->amount : '0.00' }}
                                                    </td>
                                                    <td>{{ $transaction->member_id ? $transaction->member->account : '' }}
                                                    </td>
                                                    <td>{{ $transaction->member_id ? $transaction->member->m_name : '' }}
                                                    </td>
                                                    <td>{{ $transaction->type }}</td>

                                                    <td>{{ $transaction->processed_by ? $transaction->processor->name : '' }}
                                                    </td>

                                                    <td>
                                                        @role('admin|manager')
                                                        <a class=" text-danger text-decoration-none mx-0" href="#"
                                                            onclick="transactionDelete(this);"
                                                            data-id="{{ $transaction->id }}">
                                                            <i class="os-icon os-icon-ui-15"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $transaction->id }}"
                                                            action="{{ route('staff-fund-transaction.destroy', $transaction->id) }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                        @endrole

                                                </tr>
                                            @endforeach

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

    <!-- Button trigger modal -->

    {{-- add modal start --}}
    {{-- from d list --}}
    {{-- add modal end --}}

    <script>
        function transactionDelete(elem) {
            event.preventDefault();
            if (confirm('Are you sure? You want to delete this transaction')) {
                document.getElementById('delete-form-' + elem.dataset.id).submit();
            }
        }


        $('#staff_id').on('change', function(){
            $('#staff-search-form').submit();
        })
    </script>
@endsection
