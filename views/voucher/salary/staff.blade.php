@extends('layouts.frontend.app')

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Select Staff</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-v2 table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="selectAll"></th>
                                                <th class="text-left">Id</th>
                                                <th class="text-left">Staff Name</th>
                                                <th class="text-left">designation</th>
                                                <th class="text-left">salary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($staffs as $staff)
                                                <tr class="text-center">
                                                    <td>
                                                        <input type="checkbox" name="staff_id[]" class="staff">
                                                    </td>
                                                    <td class="text-left">{{ $staff->id }}</td>
                                                    <td class="text-left">{{ $staff->name }}</td>
                                                    <td class="text-left">{{ $staff->designation }}</td>
                                                    <td class="text-left">{{ $staff->salary }}</td>
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
@endsection
