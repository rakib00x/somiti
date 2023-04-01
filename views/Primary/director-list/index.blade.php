@extends('layouts.frontend.app')
<style>
    .table.table-v2 thead tr th {
        /* background: none; */
        background: rgb(88, 112, 239) !important;
    }
</style>
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#form-modal">Add Director</button>
                                        <a href="{{ route('director.deposit') }}" class="btn btn-sm btn-success" >Director Deposit</a>
                                        <a href="{{ route('director.withdraw') }}"  class="btn btn-sm btn-success" >Director Withdraw</a>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <form method="GET" action="{{ route('director-list.index') }}" accept-charset="UTF-8" class="form-inline justify-content-center" autocomplete="off">
                                        <div class="form-element control-rounded text-center">
                                            <input class="form-control rounded text-center" placeholder="director Name" name="search" type="text">
                                            <input class="btn btn-primary" type="submit" value="Search">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <h6 class="element-header">{{__('Director List')}}
                            </h6>

                            <div class="element-box-tp">
                                <!--------------------START - Table with actions-------------------->
                                <div class="table">
                                    <table class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    <span class="badge badge-light" id="edit-button">
                                                        <i class="fa fa-pencil"></i>
                                                    </span>
                                                    <button type="submit" class="badge badge-light" id="submit-button" style="display:none">
                                                        <i class='fa fa-upload'></i>
                                                    </button>
                                                </th>
                                                <th>{{__('Photo')}}</th>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Designation')}}</th>
                                                <th>{{__('Mobile')}}</th>
                                                <th>{{__('Profession')}}</th>
                                                <th>{{__('Balance')}}</th>
                                                <th>{{__('Status')}}</th>
                                                <th>{{__('Action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($directorList as $director)
                                            <tr class="text-center">
                                                <td class="align-middle">
                                                    <span class="serial">{{ $loop->iteration }}</span>
                                                    <span class="rearrange" style="display: none">
                                                        <img src="" alt="">
                                                    </span>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="cell-image-list">
                                                        <div class="cell-img" style="background-image: url({{ asset('storage/uploads/director/' . $director->director_photo) }})"></div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">{{$director->name}}</td>
                                                <td class="align-middle">{{$director->designation}}</td>
                                                <td class="align-middle">
                                                    <a href="tel:0{{$director->mobile}}">
                                                        <i class="fa fa-phone"></i>
                                                    </a>{{$director->mobile}}
                                                </td>
                                                <td class="align-middle">{{$director->profession}}</td>
                                                <td class="align-middle">{{$director->balance}}</td>
                                                <td class="text-center align-middle">
                                                    @if ($director->active == false)
                                                        <p class="lead badge badge-danger my-0">Inactive</p>
                                                        @else
                                                        <p class="lead badge badge-info my-0">Active</p>
                                                    @endif
                                                </td>
                                                <td class="row-actions align-middle">
                                                    <div class="row text-center d-block">
                                                        <a class="btn btn-sm btn-success text-white text-decoration-none mx-0" target="_blank" href="{{ route('director-list.show', $director->id) }}" onclick="directorEdit(this);" data-id="{{ $director->id }}"  data-name="{{ $director->name }}">
                                                            <i class="fas fa-expand-arrows-alt"></i>
                                                        </a>
                                                        @role("admin|manager")
                                                            <a class="btn btn-sm btn-info text-white text-decoration-none mx-0" href="{{ route('director-list.edit', $director->id) }}" onclick="return confirm('Are you sure? you want to edit {{ $director->name }}?')">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-danger text-white text-decoration-none mx-0" href="#" onclick="directorDelete(this);" data-id="{{ $director->id }}"  data-name="{{ $director->name }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            <form id="delete-form-{{ $director->id }}" action="{{ route('director-list.destroy',$director->id) }}" method="POST" class="d-none">
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
                                        <tfoot>
                                            <tr style="font-weight: bold">
                                                <td colspan="6" class="text-right"> Total :</td>
                                                <td class="text-right">{{ $directorList->sum('balance') }}</td>
                                                <td colspan="2"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    {{ $directorList->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->

{{-- add modal start --}}
    <div class="modal fade" id="form-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">X</button>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <p class="card-header my-0"><strong>Note:</strong> The fields marked with ( <strong class="text-danger">*</strong> ) are required.</p>
                        </div>
                        <div class="col-sm-12">
                            <div class="element-box my-0" id="add_form">
                                <h3 class="element-header text-center">{{__('New Director Account')}}</h3>
                                <form method="POST" action="" accept-charset="UTF-8" note="Do you want to create new DIRECTOR with following information?" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">{{__('Director Name')}}</label>
                                                <strong class="text-danger">*</strong>
                                                <input class="form-control" placeholder="Input Director Name" required autofocus value="{{ old('name') }}" name="name" type="text" id="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mobile">{{__('Mobile Number')}}</label>
                                                <strong class="text-danger">*</strong>
                                                <input class="form-control" placeholder="Director Mobile Number" required value="{{ old('mobile') }}" name="mobile" type="number" id="mobile">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="designation">{{__('Designation')}}</label>
                                                <strong class="text-danger">*</strong>
                                                <input class="form-control" placeholder="Director designations" value="{{ old('designation') }}" name="designation" type="text" id="designation">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="profession">{{__('Profession')}}</label>
                                                <input class="form-control" placeholder="Director Profession" value="{{ old('profession') }}" name="profession" type="text" id="profession">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="balance">{{__('Balance')}}</label>
                                                <input class="form-control" placeholder="Director balance" value="{{ old('balance') }}" name="balance" type="number" id="balance">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="address">{{__('Address')}}</label>
                                                <input class="form-control" placeholder="Specific Address" value="{{ old('address') }}" name="address" type="text" id="address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="active">{{__('Status')}}</label>
                                                <select class="form-control" id="active" value="{{ old('active') }}" name="active">
                                                    <option value="1" selected>Active</option>
                                                    <option value="0">InActive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="biography">{{__('Biography')}}</label>
                                                <input class="form-control" placeholder="Biography" value="{{ old('biography') }}" name="biography" type="text" id="biography">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="post" title="">{{__('Position')}}</label>
                                                <select class="form-control" id="post" value="{{ old('post') }}" name="post">
                                                    <option selected="selected" value="">Other post</option>
                                                    <option value="chairman">Chairman</option>
                                                    <option value="secretary">Secretary</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="publish" title="Public profile will show in website">{{__('Publish')}}</label>
                                                <select class="form-control" required id="publish" value="{{ old('publish') }}" name="publish">
                                                    <option value="1">Public</option>
                                                    <option value="0">Private</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="photo" title="Max filesize 500 kb, Dimension 450(w)X650(h)">{{__('Profile
                                                    Picture')}}</label>
                                                <input class="" title="Max filesize 500 kb, Dimension 450(w)X650(h)" name="director_photo" type="file" id="photo">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <input class="btn btn-sm btn-success" type="submit" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Understood</button>
                </div>
            </div>
        </div>
    </div>
{{-- add modal end --}}

    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        });

        function directorDelete(elem){
            event.preventDefault();
            if (confirm('Are you sure? You want to delete ( '+ elem.dataset.name +' )?')) {
                document.getElementById('delete-form-'+ elem.dataset.id).submit();
            }
        }

    </script>
@endsection
