@extends('layouts.frontend.app', ['pageTitle' => 'Post Office List'])
<style>


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
                                    <div class="col-md-8">
                                        <div class="text-center my-3 d-print-none">
                                            <a href="{{ route('postoffice.create') }}" class="btn btn-success">Add New Post Office</a>
                                        </div>

                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <form method="GET" action="{{ route('postoffice.index') }}" accept-charset="UTF-8" class="form-inline justify-content-center" autocomplete="off">
                                        <div class="form-element control-rounded text-center">
                                            <input class="form-control rounded text-center" placeholder="postoffice Name" name="search" type="text">
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
                                                <th>Post Office</th>
                                                <th>Sub District</th>
                                                <th>Status</th>
                                                <th id="actionth">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($postoffices as $postoffice)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ Str::upper($postoffice->title) }}</td>
                                                    <td>{{ Str::upper($postoffice->sub_district->title ?? 'N/A') }}</td>
                                                    <td class="text-center">
                                                        @if($postoffice->status == true)
                                                        <a href="{{ route('postoffice.status',$postoffice->id) }}" class="badge badge-success btn">Active</a>
                                                        @else
                                                        <a href="{{ route('postoffice.status',$postoffice->id) }}" class="badge badge-danger btn">Inactive</a>
                                                        @endif
                                                    </td>
                                                    <td class="row-actions">
                                                        <div class="row text-center" style="display: block">
                                                            <a href="{{ route('postoffice.edit',$postoffice->id) }}" title="edit"><i class="os-icon os-icon-grid-10"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white text-decoration-none mx-0" href="#" onclick="postDelete(this);" data-id="{{ $postoffice->id }}"  data-name="{{ $postoffice->title }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            <form id="delete-form-{{ $postoffice->id }}" action="{{ route('postoffice.destroy',$postoffice->id) }}" method="POST" class="d-none">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    {{ $postoffices->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function postDelete(elem){
            event.preventDefault();
            if (confirm('Are you sure? You want to delete ( '+ elem.dataset.name +' )?')) {
                document.getElementById('delete-form-'+ elem.dataset.id).submit();
            }
        }
    </script>
@endsection
