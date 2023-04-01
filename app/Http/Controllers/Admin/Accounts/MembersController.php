<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use App\Http\Traits\MobileSmsTrait;
use App\Mail\NewMember;
use App\Models\Accounts\District;
use App\Models\Accounts\Division;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Accounts\Members;
use App\Models\Accounts\Postoffice;
use App\Models\Accounts\SubDistrict;
use App\Models\Accounts\Villagelist;
use App\Models\Primary\Area;
use App\Models\Relation;
use App\Models\Savings;
use App\Models\SavingsScheme;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MembersController extends Controller
{
    use MobileSmsTrait;
    public function index(Request $request)
    {
        if (Auth()->user()->hasRole('admin|manager')) {
            $members = Members::query()
                ->where(function ($q) use ($request) {
                    if ($request->q) {
                        $q->where('account', $request->q)
                            ->orWhere('m_name', 'like', "%{$request->q}%");
                    }
                    if ($request->area_id) {
                        $q->where('area_id', $request->area_id);
                    }
                })
                ->latest()
                ->paginate(100)->appends(request()->query());
        } else {
            $members = Members::query()
                ->where('area_id', auth()->user()->staff->area)
                ->where(function ($q) use ($request) {
                    if ($request->q) {
                        $q->where('account', $request->q)
                            ->orWhere('m_name', 'like', "%{$request->q}%");
                    }
                })
                ->latest()
                ->paginate(100)->appends(request()->query());
        }

        $areas = Area::all();
        return view('Accounts.Members.index', compact('members', 'areas'));
    }

    public function create()
    {
        $divisions = Division::where('status', 1)->get();
        $relations = Relation::all();
        if (Auth()->user()->hasRole('admin|manager')) {
            $areas = Area::all();
        } else {
            // $areas = Auth()->user()->staff->area()->get();
            $areas = Area::where('id', auth()->user()->staff->area)->get();
        }
        $last_account_num = DB::table('members')->max('account') + 1;
        return view('Accounts.Members.create', compact('areas', 'last_account_num', 'divisions', 'relations'));
    }

    //ajax call member address
    public function getdivision(Request $request)
    {
        $districts = District::where('division_id', $request->division)->where('status', 1)->get();
        $data = '<option value="">--select--</option>';
        foreach ($districts as $district) {
            $data .= '<option value="' . $district->id . '">' . $district->title . '</option>';
        }
        echo $data;
    }
    public function getdistrict(Request $request)
    {
        $subdistricts = SubDistrict::where('district_id', $request->sub_district)->where('status', 1)->get();
        $data = '<option value="">--select--</option>';
        foreach ($subdistricts as $subdistrict) {
            $data .= '<option value="' . $subdistrict->id . '">' . $subdistrict->title . '</option>';
        }
        echo $data;
    }

    public function getsubdistrict(Request $request)
    {
        $post_office = Postoffice::where('sub_district_id', $request->sub_district)->where('status', 1)->get();
        $data = '<option value="">--select--</option>';
        foreach ($post_office as $post_office) {
            $data .= '<option value="' . $post_office->id . '">' . $post_office->title . '</option>';
        }
        echo $data;
    }
    //getpostoffice
    public function getpostoffice(Request $request)
    {
        $villages = Villagelist::where('postoffice_id', $request->post_office)->where('status', 1)->get();
        $data = '<option value="">--select--</option>';
        foreach ($villages as $village) {
            $data .= '<option value="' . $village->id . '">' . $village->title . '</option>';
        }
        echo $data;
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'area_id'     => 'required|min:1|max:50',
            'm_name'      => 'required',
            'm_mobile'    => 'required|regex:/(01)[3-9]\d{8}$/',
            'm_birthday'  => 'nullable|date',
            'm_father'    => 'nullable|string',
            'm_mother'    => 'nullable|string',
            'm_companion' => 'nullable|string',
            'm_nid'       => 'nullable|integer',
            'm_gender'    => 'required',
            'email'       => 'nullable|email',
            'account'     => 'required|unique:members,account',

        ], [
            'area_id.required'  => 'Area is required',
            'm_name.required'   => 'The member name is required',
            'm_mobile.required' => 'The mobile number must be a number',
            'm_mobile.regex'    => 'The mobile format is invalid.',
            'm_birthday.date'   => 'Birthday should be a date',
            'm_father.string'   => 'Father\'s name must be a string',
            'm_mother.string'   => 'Mother\'s name must be a string',
            'm_companion.string' => 'Companion name must be a string',
            'm_nid.integer'     => 'NID number must be a number',
        ]);

        $member = new Members();
        $member->area_id    = $request->area_id;
        $member->m_name     = $request->m_name;
        $member->m_mobile   = $request->m_mobile;
        $member->m_birthday = $request->m_birthday;
        $member->m_father   = $request->m_father;
        $member->m_mother   = $request->m_mother;
        $member->m_companion = $request->m_companion;
        $member->m_nid      = $request->m_nid;
        $member->m_gender   = $request->m_gender;
        $member->email      = $request->email;
        $member->password   = Hash::make($request->password ?? 'abc');
        $member->second_mobile = $request->second_mobile;
        $member->profession = $request->profession;

        $member->m_nation = $request->nation;
        $member->m_marital = $request->marital;

        $member->business   = $request->business;
        $member->m_division = $request->m_division;
        $member->m_district = $request->m_district;
        $member->m_thana    = $request->m_thana;
        $member->post_code  = $request->post_code;
        $member->m_post     = $request->m_post;
        $member->m_village  = $request->m_village;

        if ($request->has('same')) {
            $member->p_division = $request->m_division;
            $member->p_district = $request->m_district;
            $member->p_thana    = $request->m_thana;
            $member->p_post_c   = $request->post_code;
            $member->p_post     = $request->m_post;
            $member->p_village  = $request->m_village;
        } else {
            $member->p_division = $request->p_division;
            $member->p_district = $request->p_district;
            $member->p_thana    = $request->p_thana;
            $member->p_post_c     = $request->c_post;
            $member->p_post     = $request->p_post;
            $member->p_village  = $request->p_village;
        }
        $file = new FileManager();
        // member photo start
        if ($request->hasFile('m_photo')) {
            $m_photo = $request->file('m_photo');

            $file->folder('members')->prefix('member-photo')
                ->upload($m_photo);
            $member->m_photo = $file->getName();
        }
        // member photo end

        // member signature starts
        if ($request->hasFile('m_signature')) {
            $m_signature = $request->file('m_signature');

            $file->folder('members')->prefix('member-signature')
                ->upload($m_signature);
            $member->m_signature = $file->getName();
        }
        // member signature end

        // member NID start
        if ($request->hasFile('nid_attachment')) {
            $nid_attachment = $request->file('nid_attachment');

            $file->folder('members')->prefix('member-nid')
                ->upload($nid_attachment);
            $member->nid_attachment = $file->getName();
        }
        // member NID end

        // nominee photo start
        if ($request->hasFile('n_photo')) {
            $n_photo = $request->file('n_photo');
            $file->folder('members/nominee')->prefix('nominee')
                ->upload($n_photo);
            $member->n_photo = $file->getName();
        }
        // nominee photo end
        $member->admission_fee  = $request->admission_fee;
        $member->form_fee       = $request->form_fee;
        $member->share          = $request->share;
        $member->regular_savings = $request->regular_savings ?? 0;
        $member->join           = $request->join;
        $member->account        = $request->account;
        $member->active         = $request->active;
        $member->n_name         = $request->n_name;
        $member->n_relation     = $request->n_relation;
        $member->n_father       = $request->n_father;
        $member->n_mother       = $request->n_mother;
        $member->n_nid          = $request->n_nid;
        $member->n_mobile       = $request->n_mobile;
        $member->n_division     = $request->n_division; //new add
        $member->n_district     = $request->n_district;
        $member->n_sub_district = $request->n_sub_district;
        $member->c_post         = $request->c_post;
        $member->n_post         = $request->n_post;
        $member->n_village      = $request->n_village;
        $member->save();

        // send mail
        if ($request->email && env('MAIL_USERNAME') && filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            Mail::to($request->email)->send(new NewMember($request));
        }
        // sms section
        if ($member && $member->m_mobile) {
            $smsData = [
                'mobile' => $member->m_mobile,
                'account' => $member->account,
                'password' => $request->password,
                'date' => date('d-m-Y'),
            ];
            $this->newMemberSms("Congratulations! Your are the member of Blue Star Ltd.", $smsData);
        }
        return redirect()->route('members.index')->with(Toastr::success('Member Added Successfully!', 'Success'));
    }

    public function show($id)
    {
        $member = Members::find($id);
        return view('Accounts.Members.view', compact('member'));
    }

    public function edit($id)
    {
        $relations = Relation::all();
        $member = Members::find($id);
        $areas = Area::all(['id', 'name']);
        //present address
        $divisions = Division::where('status', 1)->get();
        $districts = District::where('division_id', $member->m_division)->get();
        $subdistricts = SubDistrict::where('district_id', $member->m_district)->get();
        $post_offices = Postoffice::where('sub_district_id', $member->m_thana)->get();
        $villages = Villagelist::where('postoffice_id', $member->m_post)->get();
        //permanent address
        $p_districts = District::where('division_id', $member->p_division)->get();
        $p_subdistricts = SubDistrict::where('district_id', $member->p_district)->get();
        $p_post_offices = Postoffice::where('sub_district_id', $member->p_thana)->get();
        $p_villages = Villagelist::where('postoffice_id', $member->p_post)->get();
        // nominee address----
        $n_districts = District::where('division_id', $member->n_division)->get();
        $n_subdistricts = SubDistrict::where('district_id', $member->n_district)->get();
        $n_post_offices = Postoffice::where('sub_district_id', $member->n_sub_district)->get();
        $n_villages = Villagelist::where('postoffice_id', $member->n_post)->get();

        return view('Accounts.Members.edit', compact('relations', 'member', 'areas', 'divisions', 'districts', 'subdistricts', 'post_offices', 'villages', 'p_districts', 'p_subdistricts', 'p_post_offices', 'p_villages', 'n_districts', 'n_subdistricts', 'n_post_offices', 'n_villages'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'area_id'     => 'required|min:1|max:50',
            'm_name'      => 'required',
            'm_mobile'    => 'nullable|numeric',
            'm_birthday'  => 'nullable|date',
            'm_father'    => 'nullable|string',
            'm_mother'    => 'nullable|string',
            'm_companion' => 'nullable|string',
            'm_nid'       => 'nullable|integer',
            'm_gender'      => 'required',
            'email'       => 'nullable|email',

        ], [
            'area_id'     => ['required' => 'Area is required'],
            'm_name'      => ['required' => 'Member name is required'],
            'm_mobile'    => ['numeric' => 'Mobile number must be a number'],
            'm_birthday'  => ['date' => 'Birthday should be a date'],
            'm_father'    => ['string' => 'Father\'s name must be a string'],
            'm_mother'    => ['string' => 'Mother\'s name must be a string'],
            'm_companion' => ['string' => 'Companion name must be a string'],
            'm_nid'       => ['integer' => 'NID number must be a number'],
        ]);

        $member = Members::find($id);
        $member->area_id     = $request->area_id;
        $member->m_name     = $request->m_name;
        $member->m_mobile   = $request->m_mobile;
        $member->m_birthday = $request->m_birthday;
        $member->m_father   = $request->m_father;
        $member->m_mother   = $request->m_mother;
        $member->m_companion = $request->m_companion;
        $member->m_nid      = $request->m_nid;
        $member->m_gender   = $request->m_gender;
        $member->email      = $request->email;
        $member->second_mobile = $request->second_mobile;
        $member->profession = $request->profession;

        $member->m_nation = $request->nation;
        $member->m_marital = $request->marital;


        $member->business   = $request->business;
        $member->m_division   = $request->m_division; //new add
        $member->m_district = $request->m_district;
        $member->post_code     = $request->post_code; //new add
        $member->m_thana    = $request->m_thana;
        $member->m_post     = $request->m_post;
        $member->m_village  = $request->m_village;

        if ($request->has('same')) {
            $member->p_division = $request->m_division;
            $member->p_district = $request->m_district;
            $member->p_thana    = $request->m_thana;
            $member->p_post_c    = $request->post_code;
            $member->p_post     = $request->m_post;
            $member->p_village  = $request->m_village;
        } else {
            $member->p_division = $request->p_division; // new add
            $member->p_district = $request->p_district;
            $member->p_thana    = $request->p_thana;
            $member->p_post_c    = $request->p_post_c;
            $member->p_post     = $request->p_post;
            $member->p_village  = $request->p_village;
        }

        $file = new FileManager();
        // member photo start
        if ($request->hasFile('m_photo')) {
            $m_photo = $request->file('m_photo');

            $file->folder('members')->prefix('member-photo')
                ->update($m_photo, $member->m_photo);
            $member->m_photo = $file->getName();
        }
        // member photo end

        // member signature starts
        if ($request->hasFile('m_signature')) {
            $m_signature = $request->file('m_signature');

            $file->folder('members')->prefix('member-signature')
                ->update($m_signature, $member->m_signature);
            $member->m_signature = $file->getName();
        }
        // member signature end

        // member NID start
        if ($request->hasFile('nid_attachment')) {
            $nid_attachment = $request->file('nid_attachment');

            $file->folder('members')->prefix('member-nid')
                ->update($nid_attachment, $member->nid_attachment);
            $member->nid_attachment = $file->getName();
        }
        // member NID end

        // nominee photo start
        if ($request->hasFile('n_photo')) {
            $n_photo = $request->file('n_photo');
            $file->folder('members/nominee')->prefix('nominee')
                ->update($n_photo, $member->n_photo);
            $member->n_photo = $file->getName();
        }
        // nominee photo end

        $member->admission_fee  = $request->admission_fee;
        $member->form_fee       = $request->form_fee;
        $member->share       = $request->share;
        $member->regular_savings = $request->regular_savings ?? 50;
        $member->join           = $request->join;
        $member->account        = $request->account;
        $member->active         = $request->active;
        $member->n_name         = $request->n_name;
        $member->n_relation     = $request->n_relation;
        $member->n_father       = $request->n_father;
        $member->n_mother       = $request->n_mother;
        $member->n_nid          = $request->n_nid;
        $member->n_mobile       = $request->n_mobile;

        $member->n_division = $request->n_division; //new add
        $member->n_district = $request->n_district;
        $member->n_sub_district    = $request->n_sub_district;
        $member->c_post     = $request->n_post_code;
        $member->n_post     = $request->n_post;
        $member->n_village  = $request->n_village;
        $member->save();
        // return $request->all();
        return redirect()->route('members.admissionform', $id)->with(Toastr::success('Member updated Successfully!', 'Success'));
    }

    public function destroy($id)
    {
        try {
            $memeber = Members::find($id);
            $saving_account = Savings::where('account_id', $memeber->account)->first();
            if ($saving_account) {
                $saving_account->forceDelete();
            }
            $file = new FileManager();
            $file->folder('members')->delete($memeber->m_photo);
            $file->folder('members')->delete($memeber->m_signature);
            $file->folder('members')->delete($memeber->nid_attachment);
            $file->folder('members/nominee')->delete($memeber->n_photo);
            $memeber->delete();
            return redirect()->back()->with(Toastr::success('Member deleted successfully!', 'Deleted'));
        } catch (Exception  $e) {
            return redirect()->back()->with(Toastr::error('Something went wrong!', 'Warning'));
        }
    }

    public function details($id)
    {
        $member = Members::find($id);

        if ($member) {
            return view('Accounts.Members.details', compact('member'));
        }
    }

    public function admissionform($id)
    {
        $members = Members::find($id);
        return view('Accounts.Members.admissionform', compact('members'));
    }

    public function get_last_account_number_by_area(Request $request)
    {
        if ($request->area_id) {
            $memberMaxAccount = Members::where('area_id', $request->area_id)->max('account');
            $area = Area::find($request->area_id);
            if ($memberMaxAccount) {
                return response()->json($memberMaxAccount + 1);
            }
            return response()->json($area->area_code + 1);
        }
    }


    public function get_member_by_account(Request $request){


        $member = Members::where('account', $request->account_number)->get()->first();

        if($member){
            return response()->json(['status' => 'success', 'data' => $member]);
        }else{
            return response()->json(['status' => 'error', 'data' => null]);
        }

    }
}
