@extends('layouts.frontend.app')

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <form method="GET" action="{{ route('voucher.salary.sheet') }}" accept-charset="UTF-8"
                                class="form-inline justify-content-center">
                                <div class="form-element control-rounded text-center">
                                    <label for="branch_id" class="sr-only">Branch</label>
                                    <select class="form-control rounded" required name="branch">
                                        <option selected="selected" value="">Select branch</option>
                                        @foreach ($branches as $branch)
                                            <option value="1">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="year" class="sr-only">Year</label>
                                    <select class="form-control rounded" id="year" name="year">
                                        @foreach (range(date('Y') + 1, date('Y') - 1) as $year)
                                            <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endforeach
                                    </select>
                                    <label for="month" class="sr-only">Month</label>
                                    <select class="form-control rounded" id="month" name="month">
                                        @foreach (MONTHS as $key => $month)
                                            <option value="{{ $key }}" {{ $key == date('m') ? 'selected' : '' }}>
                                                {{ $month }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="staff" class="sr-only">Staff</label>
                                    <select class="form-control rounded" id="staff" name="staff">
                                        <option selected="selected" value="all">Select All</option>
                                        @foreach ($staffs as $staff)
                                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="date" class="sr-only">Date</label>
                                    <input class="form-control rounded toy text-center" name="date" type="date"
                                        value="{{ date('Y-m-d') }}" id="date">
                                    <button class="btn btn-primary btn-lg" type="submit">Sheet Generate</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card" id="printArea">
                            <div class="card-header">
                                <h3 class="text-center">Salary list</h3>                              
                            </div>
                            <div class="card-body" >
                                <div class="row mb-3 d-print-none">
                                    <div class="col-md-12">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-md-2 mb-1">
                                                    <select class="form-control form-control-sm" name="branch">
                                                        <option selected="selected" value="">Select branch</option>
                                                        @foreach ($branches as $branch)
                                                            <option value="1">{{ $branch->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2 mb-1">
                                                    <select class="form-control form-control-sm" id="year"
                                                        name="year">
                                                        <option value="">Select year</option>
                                                        @foreach (range(date('Y') + 1, 2021) as $year)
                                                            <option value="{{ $year }}">
                                                                {{ $year }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-1">
                                                    <select class="form-control form-control-sm" id="month"
                                                        name="month">
                                                        @foreach (MONTHS as $key => $month)
                                                            <option value="">Select month</option>
                                                            <option value="{{ $key }}">
                                                                {{ $month }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-1">
                                                    <select class="form-control form-control-sm" id="staff"
                                                        name="staff">
                                                        <option value="">Select staff</option>
                                                        @foreach ($staffs as $staff)
                                                            <option value="{{ $staff->id }}">{{ $staff->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2 mb-1">
                                                    <button class="btn btn-info btn-sm">Search</button>
                                                    <button onclick="printContent('printArea')" type="button" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-print"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id=""
                                                class="table table-bordered table-v2 table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th class="text-left">Staff Name</th>
                                                        <th>Date</th>
                                                        <th>Year</th>
                                                        <th>Month</th>
                                                        <th>Basic</th>
                                                        <th>House</th>
                                                        <th>Medical</th>
                                                        <th>Convenience</th>
                                                        <th>Transport</th>
                                                        <th>Mobile</th>
                                                        <th>Overtime</th>
                                                        <th>Deduction</th>
                                                        <th>Bonus</th>
                                                        <th>Other</th>
                                                        <th class="d-print-none">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($salaries as $salary)
                                                        <tr class="text-center">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td class="text-left">{{ @$salary->staff->name }}</td>
                                                            <td>{{ $salary->date }}</td>
                                                            <td>{{ $salary->year }}</td>
                                                            <td>{{ MONTHS[$salary->month] }}</td>
                                                            <td>{{ $salary->basic }}</td>
                                                            <td>{{ $salary->house }}</td>
                                                            <td>{{ $salary->medical }}</td>
                                                            <td>{{ $salary->convenience }}</td>
                                                            <td>{{ $salary->transport }}</td>
                                                            <td>{{ $salary->mobile }}</td>
                                                            <td>{{ $salary->overtime }}</td>
                                                            <td>{{ $salary->deduction }}</td>
                                                            <td>{{ $salary->bonus }}</td>
                                                            <td>{{ $salary->other }}</td>
                                                            <td class="d-print-none">
                                                                @role('admin|manager')
                                                                    <a href="javascript:;"
                                                                        data-route="{{ route('voucher.salary.distribution.delete', $salary->id) }}"
                                                                        data-action='delete'
                                                                        class="text-danger">
                                                                        <i class="os-icon os-icon-ui-15" title="Delete"></i>
                                                                    </a>
                                                                @endrole
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="5"></th>
                                                        <th>{{ $salaries->sum('basic') }}</th>
                                                        <th>{{ $salaries->sum('house') }}</th>
                                                        <th>{{ $salaries->sum('medical') }}</th>
                                                        <th>{{ $salaries->sum('convenience') }}</th>
                                                        <th>{{ $salaries->sum('transport') }}</th>
                                                        <th>{{ $salaries->sum('mobile') }}</th>
                                                        <th>{{ $salaries->sum('other') }}</th>
                                                        <th>{{ $salaries->sum('overtime') }}</th>
                                                        <th>{{ $salaries->sum('bonus') }}</th>
                                                        <th>{{ $salaries->sum('deduction') }}</th>
                                                        <th class="d-print-none">Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                {{ $salaries->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        function printContent(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var printStyle = document.getElementById("styleForPrinting").outerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printStyle + printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script> --}}
    <script>
        function printContent(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
    <script>
        const custAction = document.querySelectorAll("[data-action='delete']");
        custAction.forEach(element => {
            element.addEventListener('click', function() {
                if (confirm(`Are you sure? You want to delete`)) {
                    const _deleteForm = document.createElement('form');
                    _deleteForm.action = this.dataset.route;
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
