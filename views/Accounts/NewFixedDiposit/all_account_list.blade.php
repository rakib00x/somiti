@extends('layouts.frontend.app')
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
                        <h3 class="mb-0 bangla_font2">FIXED DEPOSIT অ্যাকাউন্ট লিস্ট</h3>
                        
                    </div>

                </div>
                <div class="row" style="font-size: 13px;">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <div class="element-box-tp">
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{ route('fixed-deposit.create') }}" class="btn btn-dark btn-sm rounded"
                                        title="Create new CC Account"><i class="fa fa-plus"></i>
                                            {{__('Add New')}}
                                        </a>
                                        

                                        <a href="{{ route('fixed-deposit.index') }}">
                                            <button class="btn btn-info btn-sm rounded ">{{__('View All Acount')}}</button>
                                        </a>
                                        <button onclick="printContent('printArea')" type="button" class="btn btn-danger mx-auto btn-sm rounded">
                                            <i class="fa fa-print"></i>
                                            <span>{{__('Print')}}</span>
                                        </button>
                                        
                                    </div>
                                    <div class="col-md-8">
                                        <form class="form-inline justify-content-end" action="{{ route('fixed-deposit.index') }}" method="get" id="fixedDepositareasearch">
                                            @csrf
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
                                                <input type="text" class="form-control rounded text-center" placeholder="Name or Account number" name="search" value="">
                                                <input class="btn btn-primary" type="submit" value="search">
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
                                                    <th>{{__('Action')}}</th>
                                                    <th>#</th>
                                                    <th>{{__('Start Date')}}</th>
                                                    <th>{{__('End Date')}}</th>
                                                    <th>{{__('Member')}}</th>
                                                    <th>{{__('Account')}}</th>
                                                    <th>{{__('Scheme')}}</th>
                                                    <th>{{__('Type')}}</th>
                                                    <th>{{__('Amount')}}</th>
                                                    <th>{{__('Profit Get')}}</th>
                                                    <th>{{__('Profit Paid')}}</th>
                                                    <th>{{__('Receivable Profit')}}</th>
                                                    <th>{{__('Status')}}</th>
                                                    <th>{{__('Action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($diposits as $fdr)
                                                    <tr>
                                                        <td>
                                                            <div class="filter-dropdown">
                                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('fdr-balance-transaction.show', $fdr->member->account) }}">
                                                                        Transaction List
                                                                    </a>
    
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('fdr-balance-transaction.create',$fdr->member->account ) }}"> New
                                                                        Transaction
                                                                    </a>
    
                                                                    
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                                        <td class="align-middle">{{ $fdr->starting_date }}</td>
                                                        <td class="align-middle">{{ $fdr->ending_date }}</td>
                                                        <td class="text-left align-middle">{{ $fdr->member->m_name }}</td>
                                                        <td class="align-middle">{{ $fdr->account }}</td>
                                                        <td class="align-middle">{{ $fdr->scheme->name ?? 'N/A' }}</td>
                                                        <td class="align-middle">{{ $fdr->scheme->type == 1 ? 'Fixed' : 'Monthly' }}</td>
                                                        <td class="align-middle">{{ $fdr->amount }}</td>
                                                        <td class="align-middle">{{ $fdr->total_profit }}</td>
                                                        <td class="align-middle">{{ $fdr->total_withdraw }}</td>
                                                        <td class="align-middle">{{ $fdr->receiveable_amount }}</td>
                                                        <td class="align-middle">
                                                            @if ($fdr->status == true)
                                                                <a href="#" class="btn btn-sm btn-success p-1">{{__('Active')}}</a>
                                                            @else
                                                                <a href="#" class="btn btn-sm btn-danger p-1">{{__('Inactive')}}</a>
                                                            @endif
                                                        </td>
                                                        <td class="d-inline-flex align-middle border-0">
                                                            <a href="{{ route('fixed-diposit.account', $fdr->id) }}" class="btn btn-sm btn-primary">
                                                                <i class="fas fa-bars"></i>
                                                            </a>
                                                           
                                                            @role('admin|manager')
                                                                <a class="btn btn-sm btn-danger text-white mx-1" href="#" onclick="dipositDelete(this);" data-id="{{ $fdr->id }}" data-name="{{ $fdr->member->m_name }}">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                                <form id="delete-form-{{ $fdr->id }}" action="{{ route('fixed-deposit.destroy', $fdr->id) }}" method="POST" class="d-none">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                                @elserole("field-officer")
                                                            @endrole
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>


                                        {{ $diposits->links() }}

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
        $('#area_id').on('change',function(){
            $('#fixedDepositareasearch').submit();
        });
        function dipositDelete(elem) {
            event.preventDefault();
            if (confirm('Are you sure? You want to edit ( ' + elem.dataset.name + ' )')) {
                document.getElementById('delete-form-' + elem.dataset.id).submit();
            }
        }

                // action dropdown
                $(".filter-dropdown").on("click", ".dropdown-toggle", function(e) {
            e.preventDefault();
            $(this).parent().addClass("show");
            $(this).attr("aria-expanded", "true");
            $(this).next().addClass("show");
        });
    </script>
@endsection
