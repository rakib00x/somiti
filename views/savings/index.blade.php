@extends('layouts.frontend.app', ['pageTitle'=>'All Savings Account'])

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
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/logo.png') }}" height="110" width="100">
                    </div>
                    <div class="col-md-6 text-center">
                        {{-- <p>বিসমিল্লাহির রহমানির রহিম</p> --}}
                        <h1 class="bangla_font2">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h1>
                        <p class="">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                        <h3 class="mb-0">DPS অ্যাকাউন্ট লিস্ট</h3>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-sm-12">
                        <div class="element-wrapper">

                            <div class="element-box-tp">
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="text-decoration-none" href="{{ route('savings.create') }}">
                                            <button class="btn btn-dark btn-sm"><i class="fa fa-plus"></i>Add New</button>
                                        </a>

                                        <a class="text-decoration-none" href="{{ route('savings.index') }}">
                                            <button class="btn btn-info btn-sm">View All Acount</button>
                                        </a>
                                        <a class="text-decoration-none" href="{{ route('savings.closed') }}">
                                            <button class="btn btn-danger btn-sm">Complete</button>
                                        </a>
                                        <a class="text-decoration-none" href="{{ route('savings.paid') }}">
                                            <button class="btn btn-success btn-sm">Paid</button>
                                        </a>
                                        <button onclick="printContent('printArea')" type="button" class="btn btn-danger mx-auto btn-sm">
                                            <i class="fa fa-print"></i>
                                            <span>Print</span>
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <form method="GET" action="{{ route('savings.index') }}" accept-charset="UTF-8" class="form-inline justify-content-end" autocomplete="off" id="savingareasearch">
                                            <div class="form-element control-rounded">
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
                                <div id="printArea">
                                    <div class="table-responsive" id="printContent">
                                        <table id="" class="table table-bordered table-v2 table-striped">
                                            <thead>
                                                <tr>
                                                    <th> Sl </th>
                                                    <th> Action </th>
                                                    <th> Scheme </th>
                                                    <th> Ac </th>
                                                    <th> Member </th>
                                                    <th> Start </th>
                                                    <th> End </th>
                                                    <th> Profit %</th>
                                                    <th> Installment </th>
                                                    <th> Per Installment </th>
                                                    <th> Target </th>
                                                    <th> Balance </th>
                                                    <th> Profit </th>
                                                    <th> Status </th>
                                                    <th> Leger </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($savings as $dps)
                                                    <tr class="text-center ">
                                                        <td>{{ $savings->currentPage() * $savings->perPage() - $savings->perPage() + 1 + $loop->index }}</td>
                                                        <td>
                                                            <div class="filter-dropdown">
                                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('savings.transactions', $dps->account_id) }}">
                                                                        Transaction List
                                                                    </a>
    
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('savings.deposit.create', $dps->id) }}"> Deposit
                                                                    </a>
    
                                                                    
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $dps->scheme->name ?? "N/A" }}</td>
                                                        <td>{{ $dps->member->account }}</td>
                                                        <td>{{ $dps->member->m_name }}</td>
                                                        <td>{{ date('d M Y', strtotime($dps->start_date)) }}</td>
                                                        <td>{{ date('d M Y', strtotime($dps->expire_date)) }}</td>
                                                        <td>{{ $dps->interest_percent }}%</td>
                                                        <td>{{ $dps->count_installment ?? 0 }}/{{ $dps->installment }}</td>
                                                        <td>{{ $dps->savings_amount }}</td>
                                                        <td class="text-right">{{ $dps->installment * $dps->savings_amount }}</td>
                                                        <td class="text-right">{{ $dps->balance }}</td>
                                                        <td class="text-right">{{ $dps->balance * ($dps->interest_percent / 100) }}</td>
                                                        <td class="text-right">{!! $dps->status_html !!}</td>
                                                        <td class="text-right">{{ $dps->ledger_no }}</td>
                                                        <td class="row-actions">
                                                            @role('admin|manager')
                                                                @if ($dps->status == '1')
                                                                    <a class="p-2 text-white badge badge-danger" href="javascript:;" title="Delete" data-href="{{ route('savings.destroy', $dps->id) }}" data-action="delete"><i class="os-icon os-icon-ui-15"></i></a>
                                                                @else
                                                                    <a class="p-2 text-white badge badge-dark" title="Not deletable"><i class="os-icon os-icon-ui-15"></i></a>
                                                                @endif
                                                                @elserole("field-officer")
                                                            @endrole
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="text-center m-3" colspan="15">No DPS account created</td>
                                                    </tr>
                                                @endforelse


                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                                {{ $savings->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        // action dropdown
        $(".filter-dropdown").on("click", ".dropdown-toggle", function(e) {
            e.preventDefault();
            $(this).parent().addClass("show");
            $(this).attr("aria-expanded", "true");
            $(this).next().addClass("show");
        });
        
        $('#area_id').on('change',  function(){
            $('#savingareasearch').submit();
        });


        const custAction = document.querySelectorAll("[data-action='delete']");
        custAction.forEach(element => {
            element.addEventListener('click', function() {
                if (confirm("Are you sure? You want to delete the branch?")) {
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
