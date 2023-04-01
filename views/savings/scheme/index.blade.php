@extends('layouts.frontend.app', ['pageTitle' => 'Savings scheme'])
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
                    <div class="col-sm-12">
                        <div class="element-box" style="display: none" id="add_form">
                            <h6 class="element-header text-center">New DPS Scheme</h6>
                            <form method="POST" action="{{ route('savings.scheme.store') }}" accept-charset="UTF-8" note="Do you want to create new DPS scheme?"> @csrf
                                <div class="row">
                                    <div class="col-sm-4 mx-auto">
                                        <div class="form-group">
                                            <label for="name">Savings Name</label>
                                            <input class="form-control" placeholder="DPS Scheme Name" required autofocus name="name" value="{{ old('name') }}" type="text" id="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 mx-auto">
                                        <div class="form-group">
                                            <label for="distance">Payment Sequence (Day)</label>
                                            <input class="form-control" placeholder="Sequence in days" min="1" required name="distance" value="{{ old('distance') }}" type="number" id="distance">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 mx-auto">
                                        <div class="form-group">
                                            <label for="note">Note</label>
                                            <input class="form-control" placeholder="Note" name="note" value="{{ old('note') }}" type="text" id="note">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 mx-auto">
                                        <div class="form-group">
                                            <label for="status">Active status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="0" {{ !old('status') ? 'selected' : '' }}>Inactive</option>
                                                <option value="1" {{ old('status', 1) ? 'selected' : '' }}>Active</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <input class="btn btn-primary" type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <h6 class="element-header">DPS Scheme List
                                <strong id="add_new" style="cursor: pointer"><i class="fa fa-plus-circle"></i></strong>
                            </h6>




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
                                        <h1 class="mb-0 bangla_font2">ডিপিএস স্কিম</h1>
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

                                <button onclick="printContent('printArea')" type="button" class="btn btn-danger mx-auto d-print-none">
                                    <i class="fa fa-print"></i>
                                    <span>Print</span>
                                </button>

                                <div class="table-responsive" id="printContent">
                                    <table class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Schema Name</th>
                                                <th>Diposit Distance</th>
                                                <th>Note</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($schemes as $scheme)
                                                <tr class="text-center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $scheme->name }}</td>
                                                    <td>{{ $scheme->distance }} Days</td>
                                                    <td>{{ $scheme->note }}</td>
                                                    <td>
                                                        {{ $scheme->status == '1' ? 'Active' : 'Inactive' }}
                                                    </td>
                                                    <td class="row-actions">
                                                        <a href="{{ route('savings.scheme.edit', $scheme->id) }}" title="Edit"><i class="os-icon os-icon-ui-49"></i></a>
                                                        <a class="danger" style="cursor: pointer" data-href="{{ route('savings.scheme.delete', $scheme->id) }}" data-name="{{ $scheme->name }}" data-action="delete"><i class="os-icon os-icon-ui-15" title="Delete"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center">
                                                    <td colspan="6">No scheme found</td>
                                                </tr>
                                            @endforelse

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
        const custAction = document.querySelectorAll("[data-action='delete']");
        custAction.forEach(element => {
            element.addEventListener('click', function() {
                if (confirm(`Do you really want to remove this ${this.dataset.name} scheme?`)) {
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

@push('javascripts')
    <script>
        $("#add_new").click(function() {
            $("#add_form").toggle();
        });
        $("#address").change(function() {
            var link = "https://gps-coordinates.org/my-location.php?address=";
            $("#map").prop('href', link + $(this).val());
        })
    </script>
@endpush
