@extends('layouts.frontend.app', ['pageTitle' => 'Branch List'])
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
                                        <h1 class="mb-0 bangla_font2">ব্রাঞ্চ লিস্ট</h1>
                                        <hr class="border border-dark w-75 mt-0">
                                    </div>
                                    <div class="col-md-3 d-flex align-items-end">
                                        <table class="table table-sm table-borderless mt-5 mb-0 small">
                                            <tr class="text-right details">
                                                <td class="align-middle">মাসের নামঃ -</td>
                                                <td class="input-group-sm px-0 text-center" style="width: 60% !important;">
                                                    <input type="text"
                                                        class="form-control shadow-none rounded-0 mx-0 float-right">
                                                </td>
                                            </tr>
                                            <tr class="text-right details">
                                                <td class="align-middle">তারিখঃ -</td>
                                                <td class="input-group-sm px-0 text-center" style="width: 60% !important;">
                                                    <input type="text"
                                                        class="form-control shadow-none rounded-0 mx-0 float-right">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="text-center my-3 d-print-none">
                                    <a href="{{ route('branch-list.create') }}" class="btn btn-success">Add New Branch</a>
                                    <a href="{{ route('branch-list.index') }}" class="btn btn-primary">All Branch List</a>
                                    <button onclick="printContent('printArea')" type="button" class="btn btn-danger mx-auto">
                                        <i class="fa fa-print"></i>
                                        <span>Print</span>
                                    </button>
                                </div>


                                <div class="table-responsive" id="printContent">
                                    <table class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Branch Name</th>
                                                <th>Address</th>
                                                <th>Hotline</th>
                                                <th id="actionth">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($branchs as $branch)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ Str::upper($branch->name) }}</td>
                                                    <td>{{ Str::upper($branch->address) }}</td>
                                                    <td class="text-center">{{ $branch->hotline }}</td>
                                                    <td class="row-actions">
                                                        <div class="row text-center" style="display: block">
                                                            <a href="{{ route('branch-list.edit',$branch->id) }}" title="Branch"><i class="os-icon os-icon-grid-10"></i></a>
                                                            @role('admin|manager')
                                                                <a href="javascript:;" data-route="{{ route('branch-list.delete', $branch->id) }}" data-action='delete'>
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

                    tion = this.dataset.route;
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
