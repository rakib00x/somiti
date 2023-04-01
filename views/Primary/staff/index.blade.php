@extends('layouts.frontend.app', ['pageTitle' => 'Staff List'])
{{-- <style media="print" id="styleForPrinting">
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
</style> --}}




@section('content')
    <div class="content-w" id="printArea">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">

                            <div class="element-box-tp">
                                <!--------------------START - Table with actions-------------------->
                                <div class="row">
                                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('images/logo.png') }}" height="110" width="100">
                                    </div>
                                    <div class="col-md-6 text-center">
                                        {{-- <p>বিসমিল্লাহির রহমানির রহিম</p> --}}
                                        <h3 class="">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h3>
                                        <p class="">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                                        <h3 class="mb-0 ">স্টাফ লিস্ট</h3>
                                        <hr class="border border-dark w-50 mt-0">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="d-flex justify-content-center my-3 d-print-none">
                                            <div>
                                                <a href="{{ route('staff.create') }}"
                                                    class="btn btn-success btn-sm mx-auto">Add New
                                                    Staff</a>
                                                <a href="{{ route('staff.index') }}"
                                                    class="btn btn-primary btn-sm mx-auto">All
                                                    Staff List</a>
                                                <a href="{{ route('staff-role.index') }}"
                                                    class="btn btn-success btn-sm mx-auto">Manage Roles</a>
                                                <a href="{{ route('staff-status.index') }}"
                                                    class="btn btn-secondary btn-sm mx-auto">Staffs Status</a>
                                                @role('admin')
                                                    <a href="{{ route('user.create') }}"
                                                        class="btn btn-info btn-sm mx-auto">Create
                                                        User</a>
                                                @endrole
                                                <button onclick="window.print()" type="button"
                                                    class="btn btn-danger btn-sm mx-auto">
                                                    <i class="fa fa-print"></i>
                                                    <span>Print</span>
                                                </button>
                                                {{-- <a href="{{ route('print-all-staff.index') }}" class="btn btn-primary btn-sm mx-auto">Print Staff List</a> --}}
                                                {{-- <a href="#" class="btn btn-dark btn-sm mx-auto">Staff Award</a> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 nonePrintArea">
                                        <form class="form-inline justify-content-center" action="{{ route('staff.index') }}"
                                            method="get">
                                            @csrf
                                            <div class="form-element control-rounded text-center">
                                                <input type="text" class="form-control rounded text-center"
                                                    placeholder="search" name="search" value="">
                                                <input class="btn btn-primary" type="submit" value="search">
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="table-responsive" id="printContent">
                                    <table class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Action</th>
                                                <th>Photo</th>
                                                <th>Staff Name</th>
                                                <th>AC</th>
                                                <th>Branch</th>
                                                <th>Designation</th>
                                                <th>User Role</th>
                                                <th>Joining</th>
                                                <th>Mobile</th>
                                                <th>Salary</th>
                                                <th>Manage Area</th>
                                                <th>Status</th>
                                                <th id="actionth" class="px-5">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($staffs as $staff)
                                                <tr class="text-center">
                                                    <td class="align-middle">
                                                        {{ ($staffs->currentpage() - 1) * $staffs->perpage() + $loop->iteration }}
                                                    </td>

                                                    <td class="nonePrintArea">
                                                        <div class="filter-dropdown text-right">
                                                            <button type="button" class="btn dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                            <div class="dropdown-menu">
                                                                
                                                                @role('admin|manager')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('staff.edit', $staff->id) }}"
                                                                    onclick="return confirm('Are you sure? You want to edit ( {{ $staff->name }} ) '); ">
                                                                    Staff Edit
                                                                </a>
                                                                @elserole("field-officer")
                                                                @endrole

                                                                <a class="dropdown-item"
                                                                    href="{{ route('staff.idcard', $staff->id) }}"
                                                                    title="View Attachment">Id Card
                                                                </a>


                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="px-0 py-1">
                                                        <img src="{{ asset($staff->staff_image) }}" width="50px"
                                                            height="50px" title="Profile Picture">
                                                    </td>
                                                    <td class="align-middle text-left"><a
                                                            href="{{ route('staff-fund-transaction.show', $staff->id) }}">{{ Str::upper($staff->name) }}</a>
                                                    </td>
                                                    <td class="align-middle">{{ $staff->account }}</td>
                                                    <td class="align-middle">{{ Str::upper($staff->branch_op->name) }}</td>
                                                    <td class="align-middle">{{ Str::upper($staff->designation) }}</td>

                                                    <td class="align-middle">
                                                        {{ Str::upper($staff->role->role_designation) }}</td>

                                                    <td class="align-middle">{{ $staff->join }}</td>
                                                    <td class="align-middle">{{ $staff->mobile }}</td>
                                                    <td class="align-middle">{{ $staff->salary }}</td>
                                                    <td class="align-middle">{{ Str::upper($staff->areaname->name ?? '-') }}
                                                    </td>
                                                    {{-- <td class="align-middle">
                                                        <a href="#">
                                                            <button
                                                                class="btn btn-sm btn-outline-primary">{{ $staff->role->role_designation }}</button>
                                                        </a>
                                                    </td> --}}
                                                    <td class="text-center align-middle">
                                                        @if ($staff->active == 1)
                                                            Active
                                                        @else
                                                            Inactive
                                                        @endif
                                                    </td>
                                                    <td class="row-actions align-middle">
                                                        <div class="row text-center" style="display: block">

                                                            <button aria-expanded="false" aria-haspopup="true"
                                                                class="btn btn-primary dropdown-toggle dropdown-toggle-split mx-0"
                                                                data-toggle="dropdown" type="button"
                                                                style="padding: 2px; margin-right:10px">
                                                                <i class="fa fa-print"></i>
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" target="blank"
                                                                    href="{{ route('staff.Pad.Print', $staff->id) }}">
                                                                    Pad
                                                                    Print</a>
                                                                <a class="dropdown-item" target="blank"
                                                                    href="{{ route('staff.Page.Print', $staff->id) }}">
                                                                    Page
                                                                    Print</a>
                                                                
                                                            </div>
                                                            @role('admin|manager')
                                                                {{-- <a class="btn btn-sm btn-danger text-white mx-0"
                                                                    href="{{ route('staff.edit', $staff->id) }}"
                                                                    onclick="return confirm('Are you sure? You want to edit ( {{ $staff->name }} ) '); ">
                                                                    <i class="fa fa-box"></i>
                                                                </a> --}}
                                                                <a class="btn btn-sm btn-danger text-white mx-0" href="#"
                                                                    onclick="staffDelete(this);" data-id="{{ $staff->id }}"
                                                                    data-name="{{ $staff->name }}">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                                <form id="delete-form-{{ $staff->id }}"
                                                                    action="{{ route('staff.destroy', $staff->id) }}"
                                                                    method="POST" class="d-none">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                                @elserole("field-officer")
                                                            @endrole
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3 nonePrintArea">
                                    {{ $staffs->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        function printContent(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var printStyle = document.getElementById("styleForPrinting").outerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printStyle + printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script> --}}
    <script>
        function staffDelete(elem) {
            event.preventDefault();
            if (confirm('Are you sure? You want to delete ( ' + elem.dataset.name + ' )')) {
                document.getElementById('delete-form-' + elem.dataset.id).submit();
            }
        }

        // dropdown action
        $(".filter-dropdown").on("click", ".dropdown-toggle", function(e) {
            e.preventDefault();
            $(this).parent().addClass("show");
            $(this).attr("aria-expanded", "true");
            $(this).next().addClass("show");
        });

    </script>
@endsection
