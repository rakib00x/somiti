@extends('layouts.frontend.app')
<style>
    svg:not(:root).svg-inline--fa {
        color: rgb(12, 11, 15);
    }
    .table.table-v2 thead tr th {
        background-color: rgb(88, 112, 239) !important;
    }
</style>
@section('content')
    <div class="content-w">
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
                        <h3>শেয়ার অ্যাকাউন্ট লিস্ট</h3>
                        
                        
                    </div>

                </div>
                <div class="row" style="margin: 0 10px">
                    <div class="col-sm-12" id="printArea">
                        <div class="element-wrapper">
                            <div class="element-box-tp" >


                                <!--------------------START - Table with actions-------------------->
                                <div class="table-responsive" id="printContent">
                                    <table id="shareAccountTable" class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>#</th>
                                                <th>Acc Number</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Share Value</th>
                                                <th>Share</th>
                                                <th>Last Update</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($all_share_account as $key => $share_account)
                                                <tr class="text-center">
                                                    <td>
                                                        <div class="filter-dropdown">
                                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('shareTransaction.list',$share_account->account) }}">
                                                                    Transaction List
                                                                </a>

                                                                <a class="dropdown-item"
                                                                    href="{{ route('new.transaction',$share_account->id) }}"> New
                                                                    Transaction
                                                                </a>

                                                                <a class="dropdown-item"
                                                                    href="{{ route('share.statement',$share_account->id) }}"
                                                                    title="Print">
                                                                    Statement
                                                                </a>

                                                                <a class="dropdown-item"
                                                                    href="{{ route('share.certificate',$share_account->id) }}">
                                                                    Certificate
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $share_account->account }}</td>
                                                    <td>{{ $share_account->m_name }}</td>
                                                    <td>{{ $share_account->m_mobile }}</td>
                                                    <td>{{ $share_account->share }}</td>
                                                    <td>{{ $share_account->share / 100 }}</td>
                                                    <td>{{ $share_account->updated_at->diffForHumans() }}</td>
                                                    <td>
                                                        <a title="desable" class="btn btn-sm btn-danger"><i class="os-icon os-icon-ui-15"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="11" class="text-center">
                                                        No member found in the database
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center" style="display: block ruby;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel"
        aria-hidden="true">
        <div class="modal-dialog datacontent" role="document">

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#shareAccountTable').DataTable();
        });

        // action dropdown
        $(".filter-dropdown").on("click", ".dropdown-toggle", function(e) {
            e.preventDefault();
            $(this).parent().addClass("show");
            $(this).attr("aria-expanded", "true");
            $(this).next().addClass("show");
        });
    </script>

    <script>
        function details(id) {
            $('#dataModal').modal('show');
            var url = "{{ route('members.details', 'id') }}";
            url = url.replace('id', id);
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('.datacontent').html(data)
                },
                error: function(error) {
                    console.log(`Error ${error}`);
                }
            });
        }
    </script>

    <script>
        const custAction = document.querySelectorAll("[data-action='delete']");
        custAction.forEach(element => {
            element.addEventListener('click', function() {
                if (confirm(`Are you sure? You want to delete [${this.dataset.name}]`)) {
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
