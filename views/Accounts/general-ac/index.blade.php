@extends('layouts.frontend.app')

@push('style')
    <style>
        tbody *:not(.row-actions) {
            font-size: 0.8rem !important;
        }

        .table.table-v2 thead tr th {
        /* background: none; */
        background: rgb(88, 112, 239) !important;
    }
    </style>


@endpush

@section('content')
    <div class="content-w" id="printArea">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/logo.png') }}" height="110" width="100">
                    </div>
                    <div class="col-md-6 text-center">
                        {{-- <p>বিসমিল্লাহির রহমানির রহিম</p> --}}
                        <h2 class="bangla_font2">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h2>
                        <p class="company_address">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                        <h3 class="mb-0 account_list">সাধারন অ্যাকাউন্ট লিস্ট</h3>
                        
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <div class="element-box-tp">
                                <br>
                                <div class="row nonePrintArea">
                                    <div class="col-md-4">

                                        <a href="{{ route('general.search') }}">
                                            <button class="btn btn-dark btn-sm rounded"><i class="fa fa-plus"></i>{{ __('Add New') }}</button>
                                        </a>

                                        <a href="{{ route('general-ac.index') }}">
                                            <button class="btn btn-info btn-sm rounded">{{ __('View All Acount') }}</button>
                                        </a>
                                       
                                        <button onclick="window.print()" type="button"
                                            class="btn btn-danger mx-auto btn-sm rounded">
                                            <i class="fa fa-print"></i>
                                            <span>{{ __('Print') }}</span>
                                        </button>
                                    </div>

                                    <div class="col-md-8">
                                        <form method="GET" action="{{ route('general-ac.index') }}" accept-charset="UTF-8" class="form-inline justify-content-end" autocomplete="off" id="generalsearchform">
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

                                                <input class="form-control rounded text-center" placeholder="Member or Account number" name="search" type="text">
                                                <input class="btn btn-primary btn-sm" type="submit" value="Search">
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                                <br>
                                <div >
                                    <div class="table-responsive" id="printContent">
                                        <table id="" class="table table-bordered table-v2 table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('Member') }}</th>
                                                    <th>{{ __('Action') }}</th>
                                                    <th>{{ __('Account') }}</th>
                                                    <th>{{ __('Area') }}</th>
                                                    <th>{{ __('Target Amount') }}</th>
                                                    <th>{{ __('Total Deposit') }}</th>
                                                    <th>{{ __('Total Withdraw') }}</th>
                                                    <th>{{ __('Total Balance') }}</th>
                                                    <th>{{ __('Status') }}</th>
                                                    <th id="actionth">{{ __('Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @forelse ($general_accounts as $key=>$general_account)
                                                    <tr>
                                                        <td>{{ $general_accounts->currentPage() * $general_accounts->perPage() - $general_accounts->perPage() + 1 + $loop->index }}</td>
                                                        <td>
                                                            <div class="filter-dropdown">
                                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('general-ac.deposit', $general_account->account_id) }}">
                                                                        Deposit
                                                                    </a>
    
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('general-ac.withdraw', $general_account->account_id) }}"> Withdraw
                                                                    </a>
    
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('generalAc.edit', $general_account->account_id) }}">
                                                                        Edit
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $general_account->members->m_name }}</td>
                                                        <td>{{ $general_account->account_id }}</td>
                                                        <td>{{ $general_account->members->area->name }}</td>
                                                        <td>{{ $general_account->target_amount }}</td>
                                                        <td>{{ $general_account->members->total_deposit }}</td>
                                                        <td>{{ $general_account->members->total_withdraw }}</td>
                                                        <td>{{ $general_account->members->ac_balance }}</td>
                                                        <td>{{ $general_account->members->is_active_generalac ? 'Active' : 'Inactive' }}</td>
                                                        <td class="row-actions">
                                                            <a href="{{ route('general-ac.transactions', $general_account->account_id) }}"
                                                                title="Transactions" class="badge badge-primary"
                                                                style="color: white"><i class="fa fa-list"></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="11" class="text-center">
                                                            {{ __('No member found in the database.') }} </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <tfoot class="text-right">
                                            {{ $general_accounts->links() }}
                                        </tfoot>
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
         // general ac  area search form
         $('#area_id').on('change', function() {
            $('#generalsearchform').submit()

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
