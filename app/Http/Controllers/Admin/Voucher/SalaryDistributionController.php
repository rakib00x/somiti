<?php

namespace App\Http\Controllers\Admin\Voucher;

use App\Http\Controllers\Controller;
use App\Models\Primary\BranchList;
use App\Models\Primary\Staffs;
use App\Models\Salary;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SalaryDistributionController extends Controller
{
    public function distribution(Request $request)
    {
        $data['branches'] = BranchList::all();
        $data['staffs'] = Staffs::all();
        $data['salaries'] = Salary::query()
            ->with('staff')
            ->where(function ($q) use ($request) {
                if ($request->branch) {
                    $q->where('branch_id', $request->branch);
                }
                if ($request->year) {
                    $q->where('year', $request->year);
                }
                if ($request->month) {
                    $q->where('month', $request->month);
                }
                if ($request->staff) {
                    $q->where('staff_id', $request->staff);
                }
            })
            ->paginate(50);
        return view('voucher.salary.distribution', $data);
    }

    public function sheet(Request $request)
    {
        $request->validate([
            'branch' => 'required',
            'year' => 'required',
            'month' => 'required',
            'staff' => 'required',
            'date' => 'required',
        ]);
        $data['branch'] = BranchList::find($request->branch)->name;
        $data['year'] = $request->year;
        $data['month'] = $this->month($request->month);

        $distributesSalaries = Salary::query()
            ->where('branch_id', $request->branch)
            ->where('year', $request->year)
            ->where('month', $request->month)
            ->get();
        $staffIds = [];
        foreach ($distributesSalaries as $salary) {
            $salary->staff_id ? $staffIds[] = [$salary->staff_id] : null;
        }
        $data['staffs'] = Staffs::query()
            ->where('branch', $request->branch)
            ->whereNotIn('id', $staffIds)
            ->where(function ($q) use ($request) {
                if ($request->staff != 'all') {
                    $q->where('id', $request->staff);
                }
            })
            ->get();
        return view('voucher.salary.sheet', $data);
    }

    public function distribution_sheet(Request $request)
    {
        $request->validate([
            'staff_id' => 'array|required',
            'branch' => 'required',
            'year' => 'required',
            'month' => 'required',
            'date' => 'required',
        ], [
            'staff_id.required' => 'Please Select Staff'
        ]);
        $data['branch'] = BranchList::find($request->branch)->name;
        $data['year'] = $request->year;
        $data['month'] = $this->month($request->month);

        $distributesSalaries = Salary::query()
            ->where('branch_id', $request->branch)
            ->where('year', $request->year)
            ->where('month', $request->month)
            ->whereIn('staff_id', $request->staff_id)
            ->get();
        if (count($distributesSalaries)) {
            return redirect()->route('voucher.salary.distribution')->with(Toastr::error('Salary already distribute!'));
        }

        $data['staffs'] = Staffs::query()
            ->whereIn('id', $request->staff_id)
            ->where('branch', $request->branch)
            ->get();
        return view('voucher.salary.distribution-sheet', $data);
    }

    public function distribution_save(Request $request)
    {
        $request->validate([
            'staffs' => 'required|array',
            'branch' => 'required',
            'year' => 'required',
            'month' => 'required',
            'date' => 'required',
            'holiday' => 'required',
            'workday' => 'required',
        ]);

        if ($request->staffs) {
            $data = [];
            foreach ($request->staffs as $key => $staff) {
                $data[] = [
                    'staff_id' => $key,
                    'basic' => $staff['salary'],
                    'house' => $staff['house'],
                    'medical' => $staff['medical'],
                    'convenience' => $staff['convenience'],
                    'transport' => $staff['transport'],
                    'mobile' => $staff['mobile'],
                    'other' => $staff['other'],
                    'overtime' => $staff['overtime'],
                    'bonus' => $staff['bonus'],
                    'deduction' => $staff['deduction'],

                    'branch_id' => $request->branch,
                    'year' => $request->year,
                    'month' => $request->month,
                    'date' => $request->date,
                    'holiday' => $request->holiday,
                    'workday' => $request->workday,
                ];
            }
            Salary::insert($data);
        }
        return redirect()->route('voucher.salary.distribution')->with(Toastr::success('Salary distributed successfully!'));
    }

    public function delete($id)
    {
        $salary = Salary::find($id);
        if ($salary) {
            $salary->delete();
        }
        return redirect()->back()->with(Toastr::success('Salary deleted successfully!'));
    }

    protected function month($number)
    {
        $month = '';
        if ($number) {
            if ($number == 1)
                $month = 'January';
            if ($number == 2)
                $month = 'February';
            if ($number == 3)
                $month = 'March';
            if ($number == 4)
                $month = 'April';
            if ($number == 5)
                $month = 'May';
            if ($number == 6)
                $month = 'June';
            if ($number == 7)
                $month = 'July';
            if ($number == 8)
                $month = 'August';
            if ($number == 9)
                $month = 'September';
            if ($number == 10)
                $month = 'October';
            if ($number == 11)
                $month = 'November';
            if ($number == 12)
                $month = 'December';
        }
        return $month;
    }
}
