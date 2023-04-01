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
                        <h1 class="bangla_font2">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h1>
                        <p class="company_address">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                        <h4 class="mb-0 account_list">ALL WITHDRAW APPLICATION LIST</h4>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('withdraw.search') }}"><button class="btn btn-dark btn-sm"><i
                                                class="fa fa-plus-circle"></i>
                                            New Withdraw Application</button>
                                    </a>

                                    <a href="{{ route('loan.withdraw.index') }}">
                                        <button class="btn btn-info btn-sm rounded">{{ __('View All Acount') }}</button>
                                    </a>
                                </div>

                                <div class="col-md-6">
                                    <form method="GET" action="{{ route('loan.withdraw.index') }}" accept-charset="UTF-8"
                                        class="form-inline justify-content-end" autocomplete="off" id="withdrawsearchform">
                                        <div class="form-element control-rounded text-center">
                                            @if (Auth()->user()->hasRole('admin|manager'))
                                                <select name="area_id" id="area_id" class="form-control rounded">
                                                    <option value="">All</option>
                                                    @foreach ($areas as $area)
                                                        <option value="{{ $area->id }}"
                                                            {{ request()->area_id == $area->id ? 'selected' : '' }}>
                                                            {{ $area->name }}
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
                            <div class="element-box-tp mt-3">
                                <!--------------------START - Table with actions-------------------->
                                <div class="table-responsive">
                                    <table id="" class="table table-bordered table-v2 table-striped table-sm withdraw-application"
                                        style="font-size: 12px; text-align:center">
                                        <thead>
                                            <tr class="text-center">
                                                <th>SL</th>
                                                <th>AC</th>
                                                <th>Member</th>
                                                <th>Area</th>
                                                <th>Type</th>
                                                <th>Withdraw Amount</th>
                                                <th>Expected Date</th>
                                                <th>Process By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center ">
                                            @foreach ($withdraw_applications as $withdraw_application)
                                                <tr>
                                                    <td>{{ $withdraw_applications->currentPage() * $withdraw_applications->perPage() - $withdraw_applications->perPage() + 1 + $loop->index }}
                                                    </td>
                                                    <td>{{ $withdraw_application->account_id }}</td>
                                                    <td>{{ $withdraw_application->member->m_name }}</td>
                                                    <td>{{ $withdraw_application->member->area->name }}</td>
                                                    <td>{{ $withdraw_application->account_type }}</td>
                                                    <td class="text-right">{{ $withdraw_application->withdraw_amount }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ custom_date_format($withdraw_application->expected_date) }}</td>
                                                    <td>{{ $withdraw_application->process_by }}</td>
                                                    <td>
                                                        <div class="filter-dropdown text-right">
                                                            @if ($withdraw_application->status == 0)
                                                                <button type="button"
                                                                    class="btn dropdown-toggle btn-info btn-sm rounded"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    {{ __('Pending') }}
                                                                </button>
                                                            @elseif ($withdraw_application->status == '3')
                                                                <button type="button"
                                                                    class="btn dropdown-toggle btn-warning btn-sm rounded"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    {{ __('Canceled') }}
                                                                </button>
                                                            @elseif ($withdraw_application->status == '1')
                                                                <button type="button"
                                                                    class="btn dropdown-toggle btn-success btn-sm rounded"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    {{ __('Approved') }}
                                                                </button>
                                                            @elseif ($withdraw_application->status == '2')
                                                                <button type="button"
                                                                    class="btn dropdown-toggle btn-danger btn-sm rounded"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    {{ __('Rejected') }}
                                                                </button>
                                                            @elseif ($withdraw_application->status == '4')
                                                                <button type="button"
                                                                    class="btn dropdown-toggle btn-primary btn-sm rounded"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    {{ __('Completed') }}
                                                                </button>
                                                            @endif

                                                            @if ($withdraw_application->status != 2 && $withdraw_application->status != 4)

                                                  
                                                                <div class="dropdown-menu">
                                                                    @if ($withdraw_application->status == 0)
                                                                        @if (auth()->user()->hasRole('admin|manager'))
                                                                            <a href="{{ route('withdraw_application.status.change', ['t_id' => $withdraw_application->id, 'status' => 1]) }}"
                                                                                class="dropdown-item">{{ __('Approve') }}</a>
                                                                            
                                                                            <!-- Button trigger modal -->
                                                                            <button type="button" class="btn btn-primary dropdown-item" onclick="updateStatus('{{ $withdraw_application->id }}', 2)">
                                                                                {{ __('Rejected') }}
                                                                            </button>
                                                                        @endif

                                                                        @if (auth()->user()->hasRole('field-officer'))
                                                                            <a type="submit" onclick="updateStatus('{{ $withdraw_application->id }}', 3)" class="dropdown-item">{{ __('Canceled') }}</a>
                                                                        @endif
                                                                    @elseif($withdraw_application->status == 1)
                                                                        @if (auth()->user()->hasRole('admin|manager|accountant'))
                                                                            <a href="{{ route('withdraw_application.status.change', ['t_id' => $withdraw_application->id, 'status' => 4]) }}" class="dropdown-item">{{ __('Completed') }}</a>
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('withdraw.application.destroy', $withdraw_application->id) }}" class="btn btn-danger btn sm action_btn">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $withdraw_applications->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
  
  <!-- Modal -->
  <div class="modal fade" id="rejected" tabindex="-1" role="dialog" aria-labelledby="rejectedTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="rejectedTitle">Withdraw Rejected Notes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="rejected_note">Note</label>
                <input name="rejected_note" id="rejected_note" class="form-control">
                <input type="hidden" id="app_id" type="number">
                <input type="hidden" id="status" type="number">

            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary action_btn" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary action_btn rejected">Save changes</button>
        </div>
      </div>
    </div>
  </div>

    <div class="display-type"></div>
    <script>

        // open model 
        function updateStatus(app_id, status){
            $('#app_id').val(app_id);
            $('#status').val(status);
            $('#rejected').modal('show');
        }
        // rejected note update with modal---
        $(document).ready(function(){
            $(document).on('click', '.rejected', function(e){
                e.preventDefault();
                var note = $('#rejected_note').val();
                var app_id = $('#app_id').val();
                var status = $('#status').val();
                var url = "{{ route('withdraw_status.rejected') }}";
              
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        'note':note,
                        'app_id':app_id,
                        'status':status,
                    },
                    success: function(){
                        $('#rejected_note').val('');
                        $('#rejected').modal('hide');
                        $('.withdraw-application').load(location.href+' .withdraw-application');
                        toastr.success('Status Updated Successfully', 'Success');
                    },
                    error: function(error){

                    }
                })
            });
        });
        // withdraw search ac  area search form
        $('#area_id').on('change', function() {
            $('#withdrawsearchform').submit()

        });

        // dropdown action
        $(".filter-dropdown").on("click", ".dropdown-toggle", function(e) {
            e.preventDefault();
            $(this).parent().addClass("show");
            $(this).attr("aria-expanded", "true");
            $(this).next().addClass("show");
        });
    </script>
@endsection
