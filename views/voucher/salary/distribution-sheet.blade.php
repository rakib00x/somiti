@extends('layouts.frontend.app')

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{ route('voucher.salary.distribution.save') }}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    Employee Salary Distribution Sheet : {{ $branch }}
                                    ({{ $month }},{{ $year }})
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-v2 table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>ID</th>
                                                    <th class="text-left">Name</th>
                                                    <th>Designation</th>
                                                    <th>Salary</th>
                                                    <th>House</th>
                                                    <th>Medical</th>
                                                    <th>Convenience</th>
                                                    <th>Transport</th>
                                                    <th>Mobile Bill</th>
                                                    <th>Other</th>
                                                    <th>Overtime</th>
                                                    <th>Bonus</th>
                                                    <th>Deduction</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($staffs as $staff)
                                                    <tr class="text-center">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $staff->id }}</td>
                                                        <td class="text-left">{{ $staff->name }}</td>
                                                        <td>{{ $staff->designation }}</td>
                                                        <td class="text-right">
                                                            <input type="number" step="any" name="staffs[{{ $staff->id }}][salary]"
                                                                class="text-right form-control"
                                                                value="{{ $staff->salary ?? 0 }}">
                                                        </td>
                                                        <td class="text-right">
                                                            <input type="number" step="any" name="staffs[{{ $staff->id }}][house]"
                                                                class="text-right form-control"
                                                                value="{{ $staff->house ?? 0 }}">
                                                        </td>
                                                        <td class="text-right">
                                                            <input type="number" step="any" name="staffs[{{ $staff->id }}][medical]"
                                                                class="text-right form-control"
                                                                value="{{ $staff->medical ?? 0 }}">
                                                        </td>
                                                        <td class="text-right">
                                                            <input type="number" step="any" name="staffs[{{ $staff->id }}][convenience]"
                                                                class="text-right form-control"
                                                                value="{{ $staff->convenience ?? 0 }}">
                                                        </td>
                                                        <td class="text-right">
                                                            <input type="number" step="any" name="staffs[{{ $staff->id }}][transport]"
                                                                class="text-right form-control"
                                                                value="{{ $staff->transport ?? 0 }}">
                                                        </td>

                                                        <td class="text-right">
                                                            <input type="number" step="any" name="staffs[{{ $staff->id }}][mobile]"
                                                                class="text-right form-control"
                                                                value="{{ $staff->mobile_bill ?? 0 }}">
                                                        </td>
                                                        <td class="text-right">
                                                            <input type="number" step="any" name="staffs[{{ $staff->id }}][other]"
                                                                class="text-right form-control" value="0">
                                                        </td>
                                                        <td class="text-right">
                                                            <input type="number" step="any" name="staffs[{{ $staff->id }}][overtime]"
                                                                class="text-right form-control" value="0">
                                                        </td>
                                                        <td class="text-right">
                                                            <input type="number" step="any" name="staffs[{{ $staff->id }}][bonus]"
                                                                class="text-right form-control" value="0">
                                                        </td>
                                                        <td class="text-right">
                                                            <input type="number" step="any" name="staffs[{{ $staff->id }}][deduction]"
                                                                class="text-right form-control" value="0">
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
                                <input type="hidden" name="holiday" value="4">
                                <input type="hidden" name="workday" value="30">
                                <div class="card-footer text-right">
                                    <button class="btn btn-success">Distribution Now</button>
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
