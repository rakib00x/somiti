@extends('layouts.frontend.app')

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{ route('voucher.salary.distribution.sheet') }}" method="GET">
                            <div class="card">
                                <div class="card-header">
                                    Employee Salary Sheet : {{ $branch }} ({{ $month }},{{ $year }})
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-v2 table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="selectAll"></th>
                                                    <th>ID NO</th>
                                                    <th class="text-left">Name</th>
                                                    <th>Designation</th>
                                                    <th class="text-right">Salary</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($staffs as $staff)
                                                    <tr class="text-center">
                                                        <td><input type="checkbox" class="staff" name="staff_id[]"
                                                                value="{{ $staff->id }}"></td>
                                                        <td>{{ $staff->id }}</td>
                                                        <td class="text-left">{{ $staff->name }}</td>
                                                        <td>{{ $staff->designation }}</td>
                                                        <td class="text-right">{{ $staff->salary ?? 0 }}
                                                            <input type="hidden" name="salary[]"
                                                                value="{{ $staff->salary }}">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <input type="hidden" name="branch" value="{{ request()->branch }}">
                                <input type="hidden" name="year" value="{{ request()->year }}">
                                <input type="hidden" name="month" value="{{ request()->month }}">
                                <input type="hidden" name="date" value="{{ request()->date }}">
                                <div class="card-footer text-right">
                                    <button class="btn btn-success">Next</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        // for select
        $("#selectAll").click(function() {
            if ($(this).prop('checked')) {
                $(".staff").attr('checked', true);
            } else {
                $(".staff").attr('checked', false);
            }
            // counter();
        });
        // $(".staff").change(function() {
        //     counter();
        // });

        // function counter() {
        //     var len = $(".staff:checked").length;
        //     if (len > 0) {
        //         $("#count").val(len);
        //     } else {
        //         $("#count").val("");
        //     }
        // }
        // end select
    </script>
@endsection
