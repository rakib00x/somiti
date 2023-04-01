@extends('layouts.frontend.app', ['pageTitle' => 'Current Account'])

@section('content')
    <div class="content-w" >
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12" id="printArea">
                        <div class="element-wrapper" >

                            <div class="row mb-3">
                                <div class="col-md-3 d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('images/logo.png') }}" height="110" width="100">
                                </div>
                                <div class="col-md-6 text-center">
                                    {{-- <p>বিসমিল্লাহির রহমানির রহিম</p> --}}
                                    <h2 class="bangla_font2">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h2>
                                    <p class="">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                                    <h3>CURRENT অ্যাকাউন্ট লিস্ট</h3>
                                    
                                    
                                </div>
            
                            </div>
                           <div class="row nonePrintArea mb-3">
                                <div class="col-md-6">
                                    <a href="{{ route('current.search') }}">
                                        <button class="btn btn-dark btn-sm"><i class="fa fa-plus"></i>Add New</button>
                                    </a>
                            
                                    <a href="{{ route('current-account.index') }}">
                                        <button class="btn btn-primary btn-sm">All Account</button>
                                    </a>

                                        <a href="{{ route('current-account.create') }}">
                                            <button class="btn btn-success btn-sm">Deposit To Current Account</button>
                                        </a>

                                    <button onclick="window.print()" type="button" class="btn btn-danger mx-auto btn-sm">
                                        <i class="fa fa-print"></i>
                                        <span>Print</span>
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <form method="GET" action="{{ route('current-account.index') }}" accept-charset="UTF-8" class="form-inline justify-content-end" autocomplete="off" id="currentareasearch">
                                        <div class="form-element control-rounded text-center">
                                            @if (Auth()->user()->hasRole('admin|manager'))
                                                    <select name="area_id" id="area_id" class="form-control rounded">
                                                        <option value="">All</option>
                                                        @foreach ($areas as $area)
                                                            <option value="{{ $area->id }}"
                                                                {{ request()->area_id == $area->id ? 'selected' : '' }}>{{ $area->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            <input class="form-control rounded" placeholder="Member or Account number" name="search" type="text">
                                            <input class="btn btn-primary btn-sm" type="submit" value="Search">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="element-box-tp" >
                                <!--------------------START - Table with actions-------------------->
                                <div class="row" >
                                    <table class="table table-bordered table-v2 table-striped " >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('Action') }}</th>
                                                <th>{{ __('Account') }}</th>
                                                <th class="print_member_name">{{ __('Member Name') }}</th>
                                                <th>{{ __('Area') }}</th>
                                                <th>{{ __('Target Amount') }}</th>
                                                <th>{{ __('Total Deposit') }}</th>
                                                <th>{{ __('Total Withdraw') }}</th>
                                                <th>{{ __('Total Balance') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th class="nonePrintArea">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center table-sm">
                                            @foreach ($current_accounts as $current_account)
                                                <tr>
                                                    <td>{{ $current_accounts->currentPage() * $current_accounts->perPage() - $current_accounts->perPage() + 1 + $loop->index }}</td>
                                                    <td>
                                                        <div class="filter-dropdown">
                                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('current-amount.transaction', $current_account->account_id) }}">
                                                                    Transaction
                                                                </a>

                                                                <a class="dropdown-item"
                                                                    href="{{ route('current_account.edit',$current_account->account_id ) }}">
                                                                    Edit
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="py-0">{{ $current_account->account_id }}</td>
                                                    <td class="py-0 text-left">{{ $current_account->members->m_name }}</td>
                                                    <td class="py-0 ">{{ $current_account->members->area->name }}</td>
                                                    
                                                    <td class="py-0 pr-3 text-right">{{ $current_account->amount??0 }}</td>

                                                    @php
                                                        $deposit = $current_account->total_current_deposit;
                                                        $withdraw = $current_account->total_current_withdraw;
                                                        $total_balance = $current_account->total_current_balance;
                                                    @endphp
                                                    <td class="py-0 pr-3 text-right">{{ $deposit??0 }}</td>
                                                    <td class="py-0 pr-3 text-right">{{ $withdraw??0 }}</td>
                                                    <td class="py-0 pr-3 text-right">{{ $total_balance??0 }}</td>
                                                    <td>{{ $current_account->status ==1 ? 'Active' : 'Inactive' }}</td>
                                                    {{-- <td class="p-0 text-center">{{$current_account->withdraw}}</td> --}}
                                                    <td class="p-0 nonePrintArea">
                                                        <a class="badge badge-sm badge-primary text-white mx-0"
                                                            href="{{ route('current-account.use', $current_account->account_id) }}"
                                                            onclick="return confirm('Are you sure? You want to deposit to ( {{ $current_account->account }} CD A/c) '); ">
                                                            <i class="far fa-money-bill-alt"></i>
                                                        </a>
                                                        @if ($current_account->current_account?->sum('deposit_amount') > 0)
                                                            <a class="badge badge-sm badge-danger text-white mx-0"
                                                                href="{{ route('current-account.withdraw', $current_account->account_id) }}"
                                                                onclick="return confirm('Are you sure? You want to withdraw from A/c  no ( {{ $current_account->account_id }} ) '); ">
                                                                <i class="fas fa-hand-holding-usd"></i>
                                                            </a>
                                                        @else
                                                            <a class="badge badge-sm badge-secondary text-white mx-0 disabled"
                                                                style="cursor: no-drop"><i class="fas fa-hand-holding-usd"></i></a>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $current_accounts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#area_id').on('change', function(){
            $('#currentareasearch').submit();
        });

        // action dropdown
        $(".filter-dropdown").on("click", ".dropdown-toggle", function(e) {
            e.preventDefault();
            $(this).parent().addClass("show");
            $(this).attr("aria-expanded", "true");
            $(this).next().addClass("show");
        });
    </script>
@endsection
