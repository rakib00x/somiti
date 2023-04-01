<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference_name'=>'required',
            'reference_father' => 'required',
            'reference_spouse' => 'nullable',
            'reference_profession' => 'nullable',
            'reference_social_status' => 'nullable',
            'reference_business_name' => 'nullable',
            'reference_age' => 'nullable',
            'reference_present_address' => 'nullable',
            'reference_nid_number' => 'nullable',
            'reference_permanent_address' => 'nullable',
            'reference_mobile' => 'nullable',
            'reference_relation_with_member' => 'nullable',
            'reference_profile_pic' => 'nullable|mimes:jpg,jpeg,png,webp,svg',
            'reference_grantor_nid' => 'nullable|mimes:jpg,jpeg,png,webp,svg',
            
        ]);

        $profile_image = $request->file('reference_profile_pic');
        $profile_image_path = '';
        $nid_image = $request->file('reference_grantor_nid');
        $nid_image_path ='';

        if($profile_image){
            $profile_image_name = date('YmdHis').'-'.str_replace(' ', '-', strtolower($request->reference_name)).".".$profile_image->getClientOriginalExtension();

            $profile_image->move(public_path('images/referrals' ),$profile_image_name);
            $profile_image_path = 'images/referrals/'.$profile_image_name;
        }

        if($nid_image){
            $nid_image_name = date('YmdHis').'-'.'nid'.'-'.str_replace(' ', '-', strtolower($request->reference_name)).".".$nid_image->getClientOriginalExtension();

            $nid_image->move(public_path('images/referrals'),$nid_image_name);
            $nid_image_path = 'images/referrals/'.$nid_image_name;
        }

        $referral = Referral::create([
            'name' => $request->reference_name,
            'fathers_name' => $request->reference_father,
            'spouse' => $request->reference_spouse,
            'profession' => $request->reference_profession,
            'social_status' => $request->reference_social_status,
            'bussiness_name' => $request->reference_business_name,
            'age' => $request->reference_age,
            'present_address' => $request->reference_present_address,
            'permanent_address' => $request->reference_permanent_address,
            'nid_number' => $request->reference_nid_number,
            'mobile' => $request->reference_mobile,
            'relation_with_member' => $request->reference_relation_with_member,
            'profile_pic' => $profile_image_path,
            'grantor_nid' => $nid_image_path,
        ]);


        return response()->json($referral);
    }

    public function destroy($id)
    {
       
    }
}
