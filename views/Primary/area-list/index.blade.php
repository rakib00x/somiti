@extends('layouts.frontend.app', ['pageTitle' => 'Area List'])
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
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">


                            <div class="element-box-tp" id="printArea">
                                <!--------------------START - Table with actions-------------------->

                                <div class="row">
                                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('images/logo.png') }}" height="110" width="100">
                                    </div>
                                    <div class="col-md-6 text-center">
                                        {{-- <p>বিসমিল্লাহির রহমানির রহিম</p> --}}
                                        <h1 class="bangla_font2">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h1>
                                        <p class="">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                                        <h1 class="mb-0 bangla_font2">এরিয়া লিস্ট</h1>
                                        <hr class="border border-dark w-75 mt-0">
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="text-center d-print-none mb-4" >
                                            <a href="{{ route('area-list.create') }}" class="btn btn-success">{{__('Add New Area')}}</a>
                                            <a href="{{ route('area-list.index') }}" class="btn btn-primary">{{__('All Area List')}}</a>
                                            <button onclick="printContent('printArea')" type="button" class="btn btn-danger mx-auto">
                                                <i class="fa fa-print"></i>
                                                <span>{{__('Print')}}</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <form method="GET" action="{{ route('area-list.index') }}" accept-charset="UTF-8" class="form-inline justify-content-center" autocomplete="off">
                                            <div class="form-element control-rounded text-center">
                                                <input class="form-control rounded text-center" placeholder="Area Name" name="search" type="text">
                                                <input class="btn btn-primary" type="submit" value="Search">
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="table-responsive" id="printContent">
                                    <table class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Branch Name</th>
                                                <th>Area Name</th>
                                                <th>Area Code</th>
                                                {{-- <th>Associate</th> --}}
                                                <th>Members</th>
                                                <th id="actionth">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allArea as $area)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ Str::upper($area->branch->name) }}</td>
                                                    <td>{{ Str::upper( $area->name) }}</td>
                                                    <td>{{ $area->area_code }}</td>
                                                    {{-- <td>{{ Str::upper($area->associate ? $area->associate->name : '') }}</td> --}}
                                                    <td>{{ $area->members()->count() }}</td>

                                                    <td class="row-actions">
                                                        <div class="row text-center" style="display: block">
                                                            <a href="{{ route('area-list.edit',$area->id) }}" title="Area"><i class="os-icon os-icon-grid-10"></i></a>
                                                            @role('admin|manager')
                                                                <a href="javascript:;" data-route="{{ route('area-list.delete', $area->id) }}" data-action='delete'>
                                                                    <i class="os-icon os-icon-ui-15" title="Delete"></i>
                                                                </a>
                                                                @elserole("field-officer")
                                                            @endrole
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-3">
                                    {{ $allArea->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script>
        const custAction = document.querySelectorAll("[data-action='delete']");
        custAction.forEach(element => {
            element.addEventListener('click', function() {
                if (confirm("Are you sure? You want to delete the branch?")) {
                    const _deleteForm = document.createElement('form');
                    _deleteForm.action = this.dataset.route;
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
