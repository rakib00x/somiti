@extends('layouts.frontend.app', ['pageTitle' => 'Village List'])
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
                                            <a href="{{ route('village.create') }}" class="btn btn-success">Add New Village</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <form method="GET" action="{{ route('village.index') }}" accept-charset="UTF-8" class="form-inline justify-content-center" autocomplete="off">
                                        <div class="form-element control-rounded text-center">
                                            <input class="form-control rounded text-center" placeholder="village Name" name="search" type="text">
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
                                                <th>Village</th>
                                                <th>Post Office</th>
                                                <th>Status</th>
                                                <th id="actionth">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($villages as $village)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ Str::upper($village->title) }}</td>
                                                    <td>{{ Str::upper($village->postoffice->title) ?? 'N/A' }}</td>
                                                    <td class="text-center">active
                                                        {{-- @if($village->status == true)
                                                        <a href="{{ route('village.status',$village->id) }}" class="badge badge-success btn">Active</a>
                                                        @else
                                                        <a href="{{ route('village.status',$village->id) }}" class="badge badge-danger btn">Inactive</a>
                                                        @endif --}}
                                                    </td>
                                                    <td class="row-actions">
                                                        <div class="row text-center" style="display: block">
                                                            <a href="{{ route('village.edit',$village->id) }}" title="edit"><i class="os-icon os-icon-grid-10"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white text-decoration-none mx-0" href="#" onclick="postDelete(this);" data-id="{{ $village->id }}"  data-name="{{ $village->title }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            <form id="delete-form-{{ $village->id }}" action="{{ route('village.destroy',$village->id) }}" method="POST" class="d-none">
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
        function postDelete(elem){
            event.preventDefault();
            if (confirm('Are you sure? You want to delete ( '+ elem.dataset.name +' )?')) {
                document.getElementById('delete-form-'+ elem.dataset.id).submit();
            }
        }
    </script>
@endsection
