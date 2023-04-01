<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Helpers\FileManager;
use Illuminate\Http\Request;
use App\Models\Accounts\Members;
use Illuminate\Support\Facades\DB;
use App\Helpers\GenerateProfitTrait;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Accounts\FixedDiposit;
use App\Helpers\CheckStaffAccessByArea;
use App\Http\Traits\MobileSmsTrait;
use App\Models\Accounts\FdrAttachment;
use Illuminate\Support\Facades\Session;
use App\Models\Primary\FixedDipositScheme;
use App\Models\Accounts\FixedDipositProfit;
use App\Models\Primary\Area;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class FixedDipositController extends Controller
{
    use CheckStaffAccessByArea, GenerateProfitTrait;
    use MobileSmsTrait;


    protected $rules = [
        'account' => 'required',
        'starting_date' => 'required',
        'ending_date' => 'nullable',
        'months' => 'required',
        'amount' => 'required',
        'scheme_id' => 'required',
        'percent' => 'required',
        'capture' => 'nullable',
        'capture2' => 'nullable',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $areas = Area::all();
        if (Auth()->user()->hasRole('admin|manager')) {
            $diposits = FixedDiposit::query()
            ->where(function($q) use ($request){
                if($request->search){
                    $q->where('account', $request->search)
                    ->orWhereIn('account', Members::query()->where('m_name', $request->search)->pluck('account') ?? null);
                }
                if($request->area_id){
                    $q->whereIn('account', Members::query()->where('area_id', $request->area_id)->pluck('account'));
                }
            })
            ->with('member')
            ->latest()
            ->paginate(100);
        } else {
            $diposits = FixedDiposit::whereHas('member', function ($query) {
                $query->where('area_id', auth()->user()->staff->area);
            })->paginate(100);
        }


        return view('Accounts.NewFixedDiposit.all_account_list', compact('diposits','areas'));
    }
    public function getNewDipositId($scheme, $member)
    {
        $member = Members::find($member);

        $this->checkMemberAccessView($member->account);

        $fixed_diposit_scheme = FixedDipositScheme::find($scheme);
        return view('Accounts.NewFixedDiposit.index', compact('member', 'fixed_diposit_scheme'));
    }
    public function postNewDiposit(Request $request)
    {
        // return $request->all();
        $this->validate($request, ['scheme' => 'required', 'account' => 'required']);

        $this->checkMemberAccess($request->account);

        $get_member = DB::table('members')->select(['id'])->where('account', $request->account)->first();
        if (!$get_member) {
            return redirect()->back()->with(Toastr::error('Account not found!', 'Error!'));
        }

        // one member can create only one fdr account condition
        $inactive = FixedDiposit::where('account', $request->account)->where('status', '1')->count();
        if ($inactive) {
            return redirect()->back()->with(Toastr::warning('This account already has a running FDR account!', 'Warning!'));
        }

        if (!$request->scheme) {
            return redirect()->back()->with(Toastr::error('Scheme is not selected!', 'Error!'));
        }
        return redirect()->route('fixed-diposit.fdn_get', [$request->scheme, $get_member->id])->with(Toastr::info('Fixed diposit id found!', 'Founded'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fds = FixedDipositScheme::all();
        return view('Accounts.NewFixedDiposit.create', compact('fds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        //$this->validate($request, $this->rules);

        $this->checkMemberAccess($request->account);

        $fixed_diposit = new FixedDiposit($request->except('_token', '_method', 'capture', 'capture2', 'account', 'scheme_id'));
        $fixed_diposit->account = $request->account;
        $fixed_diposit->scheme_id = $request->scheme_id;
        $fixed_diposit->starting_date = $request->starting_date;
        $fixed_diposit->bank_name = $request->bankName;
        $fixed_diposit->branch_name = $request->branch;
        $fixed_diposit->bank_account = $request->bankAccount;
        $fixed_diposit->ending_date = $request->ending_date ? $request->ending_date : date('Y-m-d', strtotime($request->starting_date .  '+' . $fixed_diposit->months . ' months'));


        if ($request->hasFile('capture')) {
            $capture = $request->file('capture');
            $captureName = time().'.'.$capture->extension();
            $capture->move(public_path('images/FdrFile'), $captureName);
            $fixed_diposit->capture = $captureName;
        }

        // return $fixed_diposit;
        $fixed_diposit->processed_by = Auth()->user()->name;
        $fixed_diposit->save();
        $gallery_id = 1;
        if( $fixed_diposit->save()){
          $fdr =  FixedDiposit::where('scheme_id', $request->scheme_id)->latest()->first();
          $fdr_id = $fdr->id;

          if ($request->hasFile('capture2')) {
                $capture2 = $request->file('capture2');
                foreach ($capture2 as $key => $multi_file) {
                    $imageName = $gallery_id.time().'.'.$multi_file->extension();
                    $multi_file->move(public_path('images/multipleFdrFile'), $imageName);

                    FdrAttachment::insert([
                        'fdr_id'=>$fdr_id,
                        'attachment'=>$imageName,
                        'created_at'=>Carbon::now(),
                    ]);

                    $gallery_id++;
                }
            }
        }

        $member = Members::where('account', $request->account)->first();
       // sms section
        if ($member->m_mobile) {
            $smsData = [
                'mobile' => $member->m_mobile,
                'account' => $member->account,
                'month' => $fixed_diposit->months,
                'amount' => $request->amount,
                'date' => $request->starting_date,
            ];
            $this->newFdrSms("Congratulations! Your fdr account has been open successfully. Account Number:", $smsData);
        }


        return redirect()->to(route('fixed-deposit.index'))->with(Toastr::success('Fixed diposit added successfully!', 'Added'));
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        $this->validate($request, $this->rules);

        $this->checkMemberAccess($request->account);

        $edit_fixed_diposit = new FixedDiposit($request->except('_token', '_method', 'capture', 'capture2', 'account', 'scheme_id'));
        $edit_fixed_diposit->account = $request->account;
        $edit_fixed_diposit->scheme_id = $request->scheme_id;
        $file = new FileManager();

        if ($request->hasFile('capture')) {
            $capture = $request->file('capture');

            $file->folder('diposit')->prefix('fixed-diposit')->update($capture, $edit_fixed_diposit->capture);
            $edit_fixed_diposit->capture = $file->getName();
        }

        if ($request->hasFile('capture2')) {
            $capture2 = $request->file('capture2');

            $file->folder('diposit')->prefix('fixed-diposit')->update($capture2, $edit_fixed_diposit->capture2);
            $edit_fixed_diposit->capture2 = $file->getName();
        }
        // return $edit_fixed_diposit;

        $edit_fixed_diposit->save();
        return redirect()->route('fixed-deposit.index')->with(Toastr::success('Fixed diposit added successfully!', 'Added'));
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $fdr = FixedDiposit::find($id);

        $this->checkMemberAccess($fdr->account);

        $fdr->delete();
        return redirect()->back()->with(Toastr::warning('Diposit is deleted but it will store into database!', 'Deleted'));
    }


    public function statememt($id)
    {
        return view('Accounts.NewFixedDiposit.statement');
    }

    public function account($id)
    {
        $fdr = FixedDiposit::find($id);
        return view('Accounts.NewFixedDiposit.account', compact('fdr'));
    }

    public function certificate($id)
    {
        return view('Accounts.NewFixedDiposit.certificate');
    }


    public function makeProfit($id)
    {

        $fdr = FixedDiposit::find($id);

        $this->checkMemberAccess($fdr->account);

        $profits = null;
        $make_profit = 0;

        if ($fdr->scheme->type == 1) {
            if ($fdr->ending_date <= date('Y-m-d')) {
                $profits = FixedDipositProfit::where('fdr_id', $id)->where('year', date('Y'))->get()->count();
                $make_profit = ($fdr->amount * ($fdr->percent / 100)) * ($fdr->months);
            } else {
                return redirect()->back()->with(Toastr::info('Can not make profit until date ' . $fdr->ending_date, 'Info!'));
            }
        } else if ($fdr->scheme->type == 2) {
            if (date('Y-m-d', strtotime($fdr->starting_date . ' +1 month')) <= date('Y-m-d')) {
                $profits = FixedDipositProfit::where('fdr_id', $id)->where('month', date('m'))->where('year', date('Y'))->get()->count();
                $make_profit = ($fdr->amount * ($fdr->percent / 100));
            } else {
                return redirect()->back()->with(Toastr::info('Can not make profit until next month', 'Info!'));
            }
        } else {
            return redirect()->back()->with(Toastr::error('Invalid FDR type'));
        }

        if ($profits > 0) {
            return redirect()->back()->with(Toastr::error('This month\'s profit already generated'));
        }

        // $make_profit = $this->makeFdrProfit($id);

        // if ( $make_profit == 'invalid' ):
        //     return redirect()->back()->with(Toastr::error('Invalid FDR type'));
        // elseif ( $make_profit == 'exists' ):
        //     return redirect()->back()->with(Toastr::error('This month\'s profit already generated'));
        // endif;


        $post = new FixedDipositProfit();
        $post->fdr_id = $fdr->id;
        $post->profit = $make_profit;
        $post->withdraw = null;
        $post->date = now();
        $post->month = date('m');
        $post->year = date('Y');

        $post->save();

        return redirect()->back()->with(Toastr::success('Profit generate successfully!', 'Success!'));
    }
}
