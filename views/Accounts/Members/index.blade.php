@extends('layouts.frontend.app')

<style>
    .table.table-v2 thead tr th {
        /* background: none; */
        background: rgb(88, 112, 239) !important;
    }
</style>

@section('content')
    <div class="" id="printArea">
        <div class="">
            <div class="">

                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/logo.png') }}" height="110" width="100">
                    </div>
                    <div class="col-md-6 text-center">
                        {{-- <p>বিসমিল্লাহির রহমানির রহিম</p> --}}
                        <h1 class="bangla_font2">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h1>
                        <p class="">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                        <h1 class="mb-0 bangla_font2">মেম্বার লিস্ট</h1>
                        <hr class="border border-dark w-50 mt-0">
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="ml-4 nonePrintArea" >
                            <a href="{{ route('members.create') }}">
                                <button class="btn btn-dark btn-sm"><i class="fa fa-plus"></i>New Member</button>
                            </a>
                            <a href="{{ route('members.index') }}">
                                <button class="btn btn-info btn-sm">Member List</button>
                            </a>
                            <button onclick="window.print()" type="button" class="btn btn-danger mx-auto btn-sm">
                                <i class="fa fa-print"></i>
                                <span>Print</span>
                            </button>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-6 nonePrintArea">
                        <form method="GET" action="{{ route('members.index') }}" accept-charset="UTF-8"
                            id="memberSearchForm" class="form-inline justify-content-center" autocomplete="off">
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
                                <input class="form-control rounded text-center" placeholder="Search" name="q"
                                    value="{{ request()->q ?? '' }}" type="text">
                                <button class="btn btn-primary btn-sm" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <br>

                <div class="row" style="margin: 0 10px">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <div class="element-box-tp" >


                                <!--------------------START - Table with actions-------------------->
                                <div class="table-responsive" id="printContent">
                                    <table id="" class="table table-bordered table-v2 table-striped member_table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th class="nonePrintArea">Action</th>
                                                <th>Ac</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Account Type</th>
                                                <th>Area</th>
                                                <th>Join</th>
                                                <th>Gender</th>
                                                {{-- <th>Profession</th> --}}
                                                <th>Status</th>
                                                <th>Photo</th>
                                                <th class="nonePrintArea">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($members as $key => $member)
                                                <tr class="text-center">
                                                    <td>{{ $members->currentPage() * $members->perPage() - $members->perPage() + 1 + $loop->index }}
                                                    </td>
                                                    <td class="nonePrintArea">
                                                        <div class="filter-dropdown text-right">
                                                            <button type="button" class="btn dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('members.edit', $member->id) }}"
                                                                    title="Edit">Member Edit
                                                                </a>

                                                                <a class="dropdown-item"
                                                                    href="{{ route('members.show', $member->id) }}"
                                                                    title="View Attachment">Id Card
                                                                </a>

                                                                <a class="dropdown-item"
                                                                    href="{{ route('members.admissionform', $member->id) }}"
                                                                    title="View Attachment">Admission Form
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $member->account }}</td>
                                                    <td class="text-left">{{ $member->m_name }}</td>
                                                    <td>
                                                        <a href="tel:{{ $member->m_mobile }}">
                                                            {{ $member->m_mobile }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <table class="">
                                                            <tr>
                                                                <td>GA</td>
                                                                <td>LOAN</td>
                                                                <td>DPS</td>
                                                                <td>FDR</td>
                                                                <td>CC</td>
                                                                <td>CA</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    @if ($member->generalAccount()->count()> 0)
                                                                    <i class="fa fa-check text-success"></i>
                                                                    @else
                                                                    <i class="fa fa-times text-danger"></i>

                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($member->loans()->count()> 0)
                                                                    <i class="fa fa-check text-success"></i>
                                                                    @else
                                                                    <i class="fa fa-times text-danger"></i>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($member->dps()->count()> 0)
                                                                    <i class="fa fa-check text-success"></i>
                                                                    @else
                                                                    <i class="fa fa-times text-danger"></i>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($member->fdr_balance()->count()> 0)
                                                                    <i class="fa fa-check text-success"></i>
                                                                    @else
                                                                    <i class="fa fa-times text-danger"></i>
                                                                    @endif</td>
                                                                <td>
                                                                    @if ($member->cc_loans()->count()> 0)
                                                                    <i class="fa fa-check text-success"></i>
                                                                    @else
                                                                    <i class="fa fa-times text-danger"></i>
                                                                    @endif</td>
                                                                <td>
                                                                    @if ($member->currentAccounts()->count()> 0)
                                                                    <i class="fa fa-check text-success"></i>
                                                                    @else
                                                                    <i class="fa fa-times text-danger"></i>
                                                                    @endif</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        {{ Str::upper($member->area->name) }}
                                                    </td>
                                                    <td>{{ $member->join }}</td>
                                                    <td>
                                                        @if ($member->m_gender == 1)
                                                            Male
                                                        @elseif ($member->m_gender == 2)
                                                            Female
                                                        @else
                                                            Other
                                                        @endif
                                                    </td>
                                                    {{-- <td>{{ $member->profession }}</td> --}}
                                                    <td>
                                                        {{ $member->active ? 'Active' : 'Inactive' }}
                                                    </td>
                                                    <td>
                                                        <div class="cell-image-list">
                                                            <div class="cell-img"
                                                                style="background-image: url('{{ asset($member->photo) }}')">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center nonePrintArea">
                                                        <div style="font-size: 18px;">
                                                            <a href="{{ route('members.details',$member->id) }}"
                                                                title="Details"><i
                                                                    class="fa fa-eye"></i>
                                                            </a>
                                                            @role('admin|manager')
                                                                |
                                                                <a class="btn btn-sm btn-danger text-white" href="javascript:"
                                                                    data-href="{{ route('members.destroy', $member->id) }}"
                                                                    data-action="delete" data-name="{{ $member->m_name }}">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                                @elserole("field-officer")
                                                            @endrole

                                                        </div>
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
                                    {{ $members->links() }}
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
            $('#membertable').DataTable();
        });

        // dropdown action
        $(".filter-dropdown").on("click", ".dropdown-toggle", function(e) {
            e.preventDefault();
            $(this).parent().addClass("show");
            $(this).attr("aria-expanded", "true");
            $(this).next().addClass("show");
        });

        // member search form
        $('#area_id').on('change', function() {
            $('#memberSearchForm').submit()

        });
    </script>

    {{-- <script>
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
    </script> --}}

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
