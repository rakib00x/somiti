@extends('layouts.frontend.app', ['pageTitle' => 'Staff Deposit Purpose List'])
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
                                    <h4>Staff Deposit Purpose List</h4>
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
                                            @foreach ($purposes as $purpose)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $purpose->title }}</td>
                                                    <td class="row-actions">
                                                        <div class="row text-center" style="display: block">
                                                            <a href="{{ route('staff-deposit-purpose.edit',$purpose->id) }}" title="edit"><i class="os-icon os-icon-grid-10"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white text-decoration-none mx-0" href="#" onclick="purposeDelete(this);" data-id="{{ $purpose->id }}"  data-name="{{ $purpose->title }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            <form id="delete-form-{{ $purpose->id }}" action="{{ route('staff-deposit-purpose.destroy',$purpose->id) }}" method="POST" class="d-none">
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
        function purposeDelete(elem){
            event.preventDefault();
            if (confirm('Are you sure? You want to delete ( '+ elem.dataset.name +' )?')) {
                document.getElementById('delete-form-'+ elem.dataset.id).submit();
            }
        }
    </script>
@endsection
