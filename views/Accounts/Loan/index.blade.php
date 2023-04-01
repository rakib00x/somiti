@extends('layouts.frontend.app')

@push('style')
    <style>
        tbody *:not(.row-actions) {
            font-size: 0.8rem !important;
        }
    </style>

@endpush


<style>


    .print_status{
        display: none;
    }



    @media print{

        .print_status{
        display: inline-block;
    }
        
    }
</style>


@section('content')
    <div class="content-w" id="printArea">
        <div class="content-i">
            <div class="content-box">

                <div class="row mb-3">
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/logo.png') }}" height="110" width="100">
                    </div>
                    <div class="col-md-6 text-center">
                        {{-- <p>বিসমিল্লাহির রহমানির রহিম</p> --}}
                        <h2 class="bangla_font2">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h2>
                        <p class="">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                        <h3>লোন অ্যাকাউন্ট লিস্ট</h3>
                        
                        
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <div class="element-box">
                                <div class="row mb-2 nonePrintArea">
                                    <div class="col-sm-6" style="display: block ruby">
                                        <div style="">
                                            <a href="{{ route('loan.search') }}">
                                                <button class="btn btn-dark btn-sm" style="color: white;"><i class="fa fa-plus"></i>Add New</button>
                                            </a>
                                            <a href="{{ route('loan.index') }}">
                                                <button class="btn btn-info btn-sm" style="color: white;"> All
                                                    Account</button>
                                            </a>
                                            <a href="#">
                                                <button class="btn btn-primary btn-sm">Paid</button>
                                            </a>
                                            
                                            <button onclick="window.print()" type="button" class="btn btn-danger btn-sm">
                                                <i class="fa fa-print"></i>
                                                <span>Print</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <form method="GET" action="{{ route('loan.index') }}" accept-charset="UTF-8"
                                            class="form-inline justify-content-end" autocomplete="off" id="loanareasearch">
                                            <div class="form-element control-rounded text-center">
                                                @if (auth()->user()->hasRole('admin|manager'))
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
                                                    placeholder="Name or Account number" name="search" type="text">
                                                <input class="btn btn-primary btn-sm" type="submit" value="Search">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div >
                                    <div class="table-responsive" id="printContent">
                                        <table id="" class="table table-bordered table-v2 table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Action</th>
                                                    <th>Name</th>
                                                    <th>Acc</th>
                                                    <th>Area</th>
                                                    <th>Scheme</th>
                                                    <th>Duration</th>
                                                    <th>Profit %</th>
                                                    <th>Profit Amount</th>
                                                    <th>Inst Number</th>
                                                    <th>Inst Amount</th>
                                                    <th>Ledger</th>
                                                    <th>Category</th>
                                                    <th>Principal</th>
                                                    <th>Total</th>
                                                    <th>Paid</th>
                                                    <th>Due</th>
                                                    <th>Status</th>
                                                    {{-- <th>Type</th> --}}
                                                    <th class="nonePrintArea">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @forelse ($loans as $key => $loan)
                                                    <tr>
                                                        <td>{{ ($loans->currentpage() - 1) * $loans->perpage() + $loop->index + 1 }}
                                                        </td>
                                                        <td>
                                                            @if ($loan->status != '1' && $loan->status != '4')
                                                            <div class="filter-dropdown">
                                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                                <div class="dropdown-menu">
                                                                    
                                                                   
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('loan.collect.create', $loan->id) }}">
                                                                        Collection
                                                                        
                                                                    </a>
                                                                  
    
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('loan.show', $loan->id) }}"> Transaction List
                                                                    </a>
                                                                </div>
                                                            </div>
                                                                
                                                            @endif
                                                            
                                                        </td>
                                                        <td>{{ $loan->member->m_name }}</td>
                                                        <td>{{ $loan->account_id }}</td>
                                                        <td>{{ $loan->member->area->name }}</td>
                                                        <td>{{ Str::ucfirst($loan->scheme) }}</td>
                                                        <td>{{ date('d M Y', strtotime($loan->date)) }} -
                                                            {{ date('d M Y', strtotime($loan->expire_date)) }}</td>
                                                        <td>{{ $loan->percent }}</td>
                                                        <td>{{ $loan->total_profit }}</td>
                                                        <td>{{ $loan->installment_count }}/{{ $loan->installment }}</td>
                                                        <td>{{ $loan->installment_amount }}</td>
                                                        <td>{{ $loan->ledger_no }}</td>
                                                        <td>{{ $loan->category->name ?? 'N/A' }}</td>
                                                        <td>{{ $loan->loan_amount }}</td>
                                                        <td>{{ $loan->total_amount }}</td>
                                                        <td>{{ $loan->total_paid }}</td>
                                                        <td>{{ $loan->due_amount }}</td>
                                                        <td>
                                                            {{-- @if ($loan->status == '1')
                                                                <span class="text-warning font-weight-bold small">{{__('Pending')}}</span>
                                                            @elseif ($loan->status == '2')
                                                                <span class="text-info font-weight-bold small">{{__('Approved')}}</span>
                                                            @elseif ($loan->status == '3')
                                                                <span class="text-success font-weight-bold small">{{__('Completed')}}</span>
                                                            @else
                                                                <span class="text-danger font-weight-bold small">{{__('Rejected')}}</span>
                                                            @endif --}}
                                                            

                                                            <span class="print_status">
                                                                @if ($loan->status == '1')
                                                                
                                                                        {{ __('Pending') }}
                                                                    
                                                                @elseif ($loan->status == '2')
                                                                   
                                                                        {{ __('Approved') }}
                                                                    
                                                                @elseif ($loan->status == '3')
                                                               
                                                                        {{ __('Completed') }}
                                                                  
                                                                @else
                                                                   
                                                                        {{ __('Rejected') }}
                                                                   
                                                                @endif
                                                            </span>

                                                            <div class="dropdown nonePrintArea">
                                                                @if ($loan->status == '1')
                                                                    <button class="btn btn-warning btn-sm rounded dropdown-toggle print_status"
                                                                        type="button" id="dropdownMenu2"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        {{ __('Pending') }}
                                                                    </button>
                                                                @elseif ($loan->status == '2')
                                                                    <button type="button"
                                                                        class="btn btn-info btn-sm rounded dropdown-toggle print_status"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        {{ __('Approved') }}
                                                                    </button>
                                                                @elseif ($loan->status == '3')
                                                                    <button type="button"
                                                                        class="btn btn-success btn-sm rounded dropdown-toggle print_status"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        {{ __('Completed') }}
                                                                    </button>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-sm rounded dropdown-toggle print_status"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        {{ __('Rejected') }}
                                                                    </button>
                                                                @endif

                                                                @if ($loan->status == 1)
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                    
                                                                        <button class="dropdown-item" type="button"
                                                                            onclick="updateLoanStatus({{ $loan->id }}, 2)">{{ __('Approve') }}</button>
                                                                        <button class="dropdown-item" type="button"
                                                                            onclick="updateLoanStatus({{ $loan->id }}, 4)">{{ __('Reject') }}</button>
                                                                            
                                                                    


                                                                </div>

                                                                @endif
                                                            </div>


                                                        </td>
                                                        <td class="row-actions">
                                                            @role('admin|manager')
                                                                @if ($loan->status == 1)
                                                                    <a class="btn btn-danger btn-sm" href="javascript:;" data-action="delete"
                                                                        data-href="{{ route('loan.destroy', $loan->id) }}"
                                                                        title="Delete" style="color: white"><i
                                                                            class="os-icon os-icon-ui-15"></i></a>
                                                                @else
                                                                    <a title="Can not delete" style="color: grey"><i
                                                                            class="os-icon os-icon-ui-15"></i></a>
                                                                @endif
                                                                @elserole("field-officer")
                                                            @endrole
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="17"> {{ __('No loan issued yet') }} </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>

                                        </table>
                                        {{ $loans->links() }}
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
        // action dropdown
        $(".filter-dropdown").on("click", ".dropdown-toggle", function(e) {
            e.preventDefault();
            $(this).parent().addClass("show");
            $(this).attr("aria-expanded", "true");
            $(this).next().addClass("show");
        });

        function updateLoanStatus(loanId, status) {
            $.ajax({
                url: "{{ route('loan.update.status') }}",
                type: 'post',
                data: {
                    loan_id: loanId,
                    status: status
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function(error) {
                    console.log(error)
                }
            })
        }
    </script>
@endsection

@push('javascripts')
    <script>
        $('#area_id').on('change', function(){
            $('#loanareasearch').submit();
        });
        const custAction = document.querySelectorAll("[data-action='delete']");
        custAction.forEach(element => {
            element.addEventListener('click', function() {
                if (confirm("Do you really want to delete Loan/Investment account?")) {
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
@endpush
