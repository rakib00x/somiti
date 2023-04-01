@extends('layouts.frontend.app', ['pageTitle' => 'Relation List'])
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

                                <div class="">
                                    <h4>Relation List</h4>
                                </div>


                                <div class="table-responsive" id="printContent">
                                    <table class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th id="actionth">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($relations as $relation)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $relation->title }}</td>
                                                    <td class="row-actions">
                                                        <div class="row text-center" style="display: block">
                                                            <a href="{{ route('relation.edit',$relation->id) }}" title="edit"><i class="os-icon os-icon-grid-10"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white text-decoration-none mx-0" href="#" onclick="relationDelete(this);" data-id="{{ $relation->id }}"  data-name="{{ $relation->title }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            <form id="delete-form-{{ $relation->id }}" action="{{ route('relation.destroy',$relation->id) }}" method="POST" class="d-none">
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
        function relationDelete(elem){
            event.preventDefault();
            if (confirm('Are you sure? You want to delete ( '+ elem.dataset.name +' )?')) {
                document.getElementById('delete-form-'+ elem.dataset.id).submit();
            }
        }
    </script>
@endsection
