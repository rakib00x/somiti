@extends('layouts.frontend.app', ['pageTitle' => 'Division List'])
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

                                <div class="text-center my-3 d-print-none">
                                    <a href="{{ route('division-list.create') }}" class="btn btn-success">Add New Division</a>
                                </div>


                                <div class="table-responsive" id="printContent">
                                    <table class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Division</th>
                                                <th>Status</th>
                                                <th id="actionth">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($divisions as $division)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ Str::upper($division->title )}}</td>
                                                    <td class="text-center">
                                                        @if($division->status == true)
                                                        <a href="{{ route('division-list.status',$division->id) }}" class="badge badge-success btn">Active</a>
                                                        @else
                                                        <a href="{{ route('division-list.status',$division->id) }}" class="badge badge-danger btn">Inactive</a>
                                                        @endif
                                                    </td>
                                                    <td class="row-actions">
                                                        <div class="row text-center" style="display: block">
                                                            <a href="{{ route('division-list.edit',$division->id) }}" title="edit"><i class="os-icon os-icon-grid-10"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white text-decoration-none mx-0" href="#" onclick="divDelete(this);" data-id="{{ $division->id }}"  data-name="{{ $division->title }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            <form id="delete-form-{{ $division->id }}" action="{{ route('division-list.destroy',$division->id) }}" method="POST" class="d-none">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
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
        function divDelete(elem){
            event.preventDefault();
            if (confirm('Are you sure? You want to delete ( '+ elem.dataset.name +' )?')) {
                document.getElementById('delete-form-'+ elem.dataset.id).submit();
            }
        }
    </script>
@endsection
