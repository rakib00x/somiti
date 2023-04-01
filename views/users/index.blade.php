@extends('layouts.frontend.app', ['pageTitle'=>'All Users'])
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

                <div class="row justify-content-center">

                    <div class="col-12 text-center mb-3">
                        <a class="btn btn-primary" href="{{ route('user.create') }}">{{__('Create User')}}</a>
                        <a class="btn btn-success" href="{{ route('user.role.create') }}">{{__('Create Role')}}</a>
                        <a class="btn btn-success" href="{{ route('user.role.index') }}">{{__('Manage Roles')}}</a>
                        <button onclick="printContent('printArea')" type="button" class="btn btn-danger mx-auto">
                            <i class="fa fa-print"></i>
                            <span>Print</span>
                        </button>
                    </div>
                    <div id="printArea">
                        <div class="col-sm-12 col-md-10 col-lg-8" id="printContent">
                            <table class="table table-sm border">

                                <tr class="text-left text-uppercase table-secondary">
                                    <th class="text-center">#</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Username')}}</th>
                                    <th>{{__('Email')}}</th>
                                    <th>{{__('Role(s)')}}</th>
                                    <th class="text-center">{{__('Actions')}}</th>
                                </tr>

                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center"> {{ $loop->iteration }} </td>
                                        <td> {{ $user->name }} </td>
                                        <td> {{ $user->username }} </td>
                                        <td> {{ $user->email }} </td>
                                        <td class="text-left">
                                            @forelse ($user->getRoleNames() as $roleName)
                                                <span class="badge badge-info">
                                                    {{ $roleName }}
                                                </span>
                                            @empty
                                                <small class="text-muted">No role assigned</small>
                                            @endforelse
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-success py-0" href="{{ route('user.role.assign', $user->id) }}">Assign Role</a>
                                            {{-- <a class="btn btn-sm btn-primary py-0" href="{{ route('user.index') }}">Give Permission</a> --}}
                                            @if ($user->id == 1)
                                                <a class="btn btn-sm btn-secondary py-0 disabled"><i class="fas fa-trash"></i></a>
                                            @else
                                                <a class="btn btn-sm btn-danger py-0" href="javascript:;" data-action="delete" data-href="{{ route('user.delete', $user->id) }}"><i class="fas fa-trash"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
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
