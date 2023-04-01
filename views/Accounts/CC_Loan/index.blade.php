@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/logo.png') }}" height="110" width="100">
                    </div>
                    <div class="col-md-6 text-center">
                        {{-- <p>বিসমিল্লাহির রহমানির রহিম</p> --}}
                        <h2 class="bangla_font2">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h2>
                        <p class="">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                        <h3 class="mb-0 bangla_font2">CC LOAN অ্যাকাউন্ট লিস্ট</h3>
                        
                    </div>

                </div>
                <div class="row mt-5">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <div class="row">
                                <div class="col-md-6">
                                    <div style="">
                                        <a href="{{ route('cc_loan.search') }}" title="Create new CC Account"><button class="btn btn-dark btn-sm"><i class="fa fa-plus"></i> Add new CC Account</button>
                                        </a>
                                        {{-- <a href="" class="btn btn-success btn-sm rounded"
                                            title="Profit Distribution"><i class="fa fa-recycle"></i> Distribute now
                                        </a> --}}
                                        <a href="{{ route('cc_loan.index') }}">
                                            <button class="btn btn-info btn-sm">View All Acount</button>
                                        </a>
                                        {{-- <a href="">
                                            <button class="btn btn-danger btn-sm">Deactivated AC</button>
                                        </a> --}}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <form method="GET" action="{{ route('cc_loan.index') }}" accept-charset="UTF-8"
                                        class="form-inline justify-content-end" id="ccloanareasearch"><input name="_token" type="hidden"
                                            value="">
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
                                            <input class="form-control rounded text-center"
                                                placeholder="Name or Account number" required name="search" type="text">
                                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <div>
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-bordered table-v2 table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Account</th>
                                                <th>Member</th>
                                                <th>Start &amp; End Date</th>
                                                <th>Type</th>
                                                <th>Profit rate</th>
                                                <th>Opening Balance</th>
                                                <th>Balance</th>
                                                <th>Generated Profit</th>
                                                <th>Profit Paid</th>
                                                <th>Receivable Profit</th>
                                                <th>Category</th>
                                                <th>Area Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                               

                                            @foreach ($cc_loans as $loan)

                                    
                                                <tr>
                                                    <td class="row-actions">
                                                        <button aria-expanded="false" aria-haspopup="false"
                                                            class="btn dropdown-toggle dropdown-toggle-split"
                                                            data-toggle="dropdown" type="button" style="padding: 2px;">
                                                            <i class="fa fa-tasks "></i>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>

                                                        <div class="dropdown-menu dropleft">
                                                            <a class="dropdown-item" href="{{ route('cc_loan.transaction.show', $loan->id) }}"> Transaction
                                                                view</a>

                                                            <a class="dropdown-item" href="{{ route('cc_loan.transaction.report', $loan->id) }}"> Print</a>
                                                        </div>
                                                    </td>
                                                    <td>{{ $loan->account_id }}</td>
                                                    <td class="text-left">{{ $loan->member->m_name }}</td>
                                                    <td style="font-size: smaller">
                                                        <?php 
                                                        $start_date = date_create($loan->start_date);
                                                        $expire_date = date_create($loan->expire_date);
                                                        echo date_format($start_date,"d M Y") . '-'. date_format($expire_date,"d M Y");
                                                    ?>
                                                    </td>
                                                    <td>
                                                        {{ $loan->type == '1'? 'Fixed' : "$loan->installment_sequence Days" }} 
                                                    </td>
                                                    <td class="text-right">{{ $loan->profit_rate }} %</td>
                                                    <td class="text-right">
                                                        {{ $loan->opening_balance }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $loan->loan_amount }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $loan->total_profit_generated }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $loan->cc_loan_paid_profit }}
                                                    </td>
                                                    <td class="text-right">{{ $loan->due_cc_loan_profit_amount }}</td>
                                                    <td>{{ $loan->category->title }}</td>
                                                    <td>{{ $loan->member->area->name }}</td>
                                
                                                    <td class=" text-sm">
                                                        @if ($loan->status == 2)
                                                            Active|Unpaid
                                                        @elseif ($loan->status == 3)
                                                            Closed|Paid
                                                        @else
                                                            Rejected
                                                        @endif
                                                    </td>
                                                    <td class="row-actions">

                                                        @role('admin|manager')
                                                        <a
                                                                href="{{ route('ccinst.collection.create', ['account' => $loan->member->account, 'loan' => $loan->id]) }}">
                                                                <i class="fas fa-hand-lizard"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-danger text-white mx-0" href="#"
                                                                onclick="loanDelete(this);" data-id="{{ $loan->id }}" >
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            <form id="delete-form-{{ $loan->id }}"
                                                                action="{{ route('cc_loan.destroy', $loan->id) }}"
                                                                method="POST" class="d-none">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        @endrole

                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                        <tfoot>
                                            <tr class="text-right">
                                                <td colspan="5">Total:</td>
                                                <td><small>Avg </small>{{  sprintf("%.2f", $cc_loans->avg('profit_rate')) }} %</td>
                                                <td>{{ sprintf("%.2f", $cc_loans->sum('opening_balance'))  }}</td>
                                                <td>{{  sprintf("%.2f", $cc_loans->sum('loan_amount')) }}</td>
                                                <td>{{  sprintf("%.2f", $cc_loans->sum('total_profit_generated')) }}</td>
                                                <td>{{  sprintf("%.2f", $cc_loans->sum('cc_loan_paid_profit')) }}</td>
                                                <td></td>

                                                <td colspan="3"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="text-center">

                                    </div>
                                </div>
                                <!--------------------END - Table with actions-------------------->
                                <!--------------------START - Controls below table-------------------->

                                <!--------------------END - Controls below table-------------------->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="display-type"></div>
    </div>

    <script>

        $('#area_id').on('change',  function(){
            $('#ccloanareasearch').submit();
        });

        function loanDelete(elem) {
            event.preventDefault();
            if (confirm('Are you sure? You want to delete this loan')) {
                document.getElementById('delete-form-' + elem.dataset.id).submit();
            }
        }
    </script>
@endsection
