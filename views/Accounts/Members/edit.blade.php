@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">

        <div class="content-i">
            <div class="content-box">
                <div class="element-wrapper">
                    <div class="element-box">

                        <form method="POST" action="{{ route('members.update', $member->id) }}" accept-charset="UTF-8"
                            id="formValidate" note="Have you provide all information properly?" enctype="multipart/form-data"
                            novalidate="true">
                            @csrf
                            @method('PUT')
                            <div class="steps-w">
                                <div class="step-triggers">
                                    <a class="step-trigger active text-white pt-3" href="#member" style="background:rgb(10, 17, 116);">Member</a>
                                    <a class="step-trigger text-white pt-3" href="#nominee" style="background:rgb(39, 87, 7);">Nominee</a>
                                </div>
                                <div class="step-contents">
                                    <div class="step-content active" id="member"
                                        style="background:; padding-top: 15px; padding-bottom: 15px; border-radius: 5px">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="area">Select Area</label>
                                                    <select class="form-control" required="" id="area"
                                                        name="area_id">
                                                        <option value="">Select Area</option>
                                                        @foreach ($areas as $area)
                                                            <option value="{{ $area->id }}"
                                                                {{ $area->id == old('area_id', $member->area_id) ? 'selected' : '' }}>
                                                                {{ $area->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group has-error has-danger">
                                                    <label for="m_name">Member Name</label>
                                                    <input data-error="Name can't be blank" class="form-control"
                                                        placeholder="Member's Full Name" autofocus="" required=""
                                                        name="m_name" type="text" id="m_name"
                                                        value="{{ old('m_name', $member->m_name) }}">

                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_mobile">Mobile Number</label>
                                                    <input class="@error('m_mobile') is-invalid @enderror form-control"
                                                        placeholder="01XXXXXXXXX" pattern="01[3-9]\d{8}" name="m_mobile"
                                                        type="tel" id="m_mobile"
                                                        value="{{ old('m_mobile', $member->m_mobile) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_birthday">Date of Birth</label>
                                                    <input class="@error('m_birthday') is-invalid @enderror form-control"
                                                        name="m_birthday" type="date" id="m_birthday"
                                                        value="{{ old('m_birthday', $member->m_birthday) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_father">Member's Father</label>
                                                    <input class="@error('m_father') is-invalid @enderror form-control"
                                                        placeholder="Name of Member's Father" name="m_father" type="text"
                                                        id="m_father" value="{{ old('m_father', $member->m_father) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_mother">Member's Mother</label>
                                                    <input class="@error('m_mother') is-invalid @enderror form-control"
                                                        placeholder="Name of Member's Mother" name="m_mother" type="text"
                                                        id="m_mother" value="{{ old('m_mother', $member->m_mother) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_companion">Husband / Spouse</label>
                                                    <input class="@error('m_companion') is-invalid @enderror form-control"
                                                        placeholder="Name of life partner" name="m_companion" type="text"
                                                        id="m_companion"
                                                        value="{{ old('m_companion', $member->m_companion) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_nid">National ID Number</label>
                                                    <input class="@error('m_nid') is-invalid @enderror form-control"
                                                        placeholder="NID number of member" name="m_nid" type="text"
                                                        id="m_nid" value="{{ old('m_nid', $member->m_nid) }}">
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_gender">Gender of member</label>
                                                    <select class="form-control" id="m_gender" name="m_gender">
                                                        <option value="1"
                                                            {{ $member->m_gender == 1 ? 'selected' : '' }}>
                                                            Male</option>
                                                        <option value="2"
                                                            {{ $member->m_gender == 2 ? 'selected' : '' }}>
                                                            Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input class="@error('email') is-invalid @enderror form-control"
                                                        placeholder="Email Address" name="email" type="text"
                                                        id="email" value="{{ old('email', $member->email) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="second_mobile">Secondary Number</label>
                                                    <input
                                                        class="@error('second_mobile') is-invalid @enderror form-control"
                                                        placeholder="Additional Mobile Number" pattern="01[3-9]\d{8}"
                                                        name="second_mobile" type="tel"id="second_mobile"
                                                        value="{{ old('', $member->second_mobile) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="profession">Profession</label>
                                                    <input class="@error('profession') is-invalid @enderror form-control"
                                                        placeholder="Like Business / Farmer" name="profession"
                                                        type="text" id="profession"
                                                        value="{{ old('profession', $member->profession) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="business">member.business_name</label>
                                                    <input class="@error('business') is-invalid @enderror form-control"
                                                        placeholder="member.input_business_name_if_available"
                                                        name="business" type="text" id="business"
                                                        value="{{ old('business', $member->business) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="nation">Religion</label>
                                                    <input class="form-control" placeholder="religion"
                                                        name="nation" type="text" id="nation"
                                                        value="{{ old('nation',$member->m_nation) }}">
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="marital">Marital Status</label>
                                                    <strong class="text-danger">*</strong>
                                                    <select class="form-control" id="marital" name="marital" required>
                                                        <option value="1"
                                                            {{ $member->m_marital == 1 ? 'selected' : '' }}>Married</option>
                                                        <option value="2"
                                                            {{ $member->m_marital == 2 ? 'selected' : '' }}>Single</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                            <div style="padding: 20px">
                                                <hr style="border: 1px solid">
                                            </div>
                                        <legend><span>Present Address</span></legend>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="division"
                                                        class="col-form-label">{{ __('Division') }}</label>
                                                    <div class="">
                                                        <select name="m_division" id="m_division" class="form-control">
                                                            <option value="">--{{ __('Select') }}--</option>
                                                            @foreach ($divisions as $division)
                                                                <option value="{{ $division->id }}"
                                                                    {{ $division->id == $member->m_division ? 'selected' : '' }}>
                                                                    {{ $division->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_district" class="col-form-label">District</label>
                                                    <div class="">
                                                        <select name="m_district" id="m_district" class="form-control">
                                                            <option value="">--select--</option>
                                                            @foreach ($districts as $district)
                                                                <option value="{{ $district->id }}"
                                                                    {{ $district->id == $member->m_district ? 'selected' : '' }}>
                                                                    {{ $district->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_thana" class="col-form-label">Sub District</label>
                                                    <div class="">
                                                        <select name="m_thana" id="m_sub_district" class="form-control">
                                                            <option value="">--select--</option>
                                                            @foreach ($subdistricts as $subdistrict)
                                                                <option value="{{ $subdistrict->id }}"
                                                                    {{ $subdistrict->id == $member->m_thana ? 'selected' : '' }}>
                                                                    {{ $subdistrict->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="p_post" class="col-form-label ">Post
                                                        Code</label>
                                                    <div class="">
                                                        <input class="form-control" placeholder="Post Code"
                                                            name="post_code" type="text" id="post_code"
                                                            value="{{ $member->post_code }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_post" class="col-form-label">Post Office</label>
                                                    <div class="">
                                                        {{-- <input class="form-control" placeholder="Name of present Village"
                                                            name="m_post" type="text" id="m_post"
                                                            value="{{ $member->m_post }}"> --}}
                                                        <select name="m_post" id="m_post" class="form-control">
                                                            <option value="">--select--</option>
                                                            @foreach ($post_offices as $post_office)
                                                                <option value="{{ $post_office->id }}" {{ $post_office->id == $member->m_post ? 'selected':'' }}>{{ $post_office->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_village" class="col-form-label">Village</label>
                                                    <div class="">
                                                        <input class="form-control" placeholder="Name of present Village"
                                                            name="m_village" type="text" id="m_village"
                                                            value="{{ $member->m_village }}">
                                                        {{-- <select name="m_village" id="m_village" class="form-control">
                                                            <option value="">--select--</option>
                                                            @foreach ($villages as $village)
                                                                <option value="{{ $village->id }}" {{ $village->id == $member->m_village ? 'selected':'' }}>{{ $village->title }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                </div>
                                                </div>
                                            </div>
                                        </div><div style="padding: 20px">
                                            <hr style="border: 1px solid">
                                        </div>
                                        <legend><span>Permanent Address
                                                <input type="checkbox" name="same" id="sameAddr"
                                                    onchange="setSameAddress();"
                                                    {{ old('same') ? 'checked' : '' }}><small>(same)</small>
                                            </span></legend>
                                        <div id="permanent_address">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="division"
                                                            class="col-form-label ">{{ __('Division') }}</label>
                                                        <div class="">
                                                            <select name="p_division" id="p_division"
                                                                class="form-control">
                                                                <option value="">--{{ __('Select') }}--</option>
                                                                @foreach ($divisions as $division)
                                                                    <option value="{{ $division->id }}"
                                                                        {{ $division->id == $member->p_division ? 'selected' : '' }}>
                                                                        {{ $division->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="p_district" class="col-form-label ">District</label>
                                                        <div class="">
                                                            <select name="p_district" id="p_district"
                                                                class="form-control">
                                                                <option value="">--Select--</option>
                                                                @foreach ($p_districts as $p_district)
                                                                    <option value="{{ $p_district->id }}"
                                                                        {{ $p_district->id == $member->p_district ? 'selected' : '' }}>
                                                                        {{ $p_district->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="p_thana" class="col-form-label ">Sub District</label>
                                                        <div class="">
                                                            <select name="p_thana" id="p_sub_district"
                                                                class="form-control">
                                                                <option value="">--Select--</option>
                                                                @foreach ($p_subdistricts as $p_subdistrict)
                                                                    <option value="{{ $p_subdistrict->id }}"
                                                                        {{ $p_subdistrict->id == $member->p_thana ? 'selected' : '' }}>
                                                                        {{ $p_subdistrict->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="p_post" class="col-form-label ">Post
                                                            Code</label>
                                                        <div class="">
                                                            <input class="form-control" placeholder="Post Code"
                                                                name="p_post_c" type="text" id="p_post_c"
                                                                value="{{ $member->p_post_c }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="p_post" class="col-form-label ">Post
                                                            Office</label>
                                                        <div class="">
                                                            <select name="p_post" id="p_post" class="form-control">
                                                                <option value="">--select--</option>
                                                                @foreach ($p_post_offices as $p_post_office)
                                                                    <option value="{{ $p_post_office->id }}" {{ $p_post_office->id == $member->p_post ? 'selected':'' }}>{{ $p_post_office->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="p_village" class="col-form-label ">Village</label>
                                                        <div class="">
                                                                {{-- <select name="p_village" id="p_village" class="form-control">
                                                                    <option value="">--select--</option>
                                                                    @foreach ($p_villages as $p_village)
                                                                        <option value="{{ $p_village->id }}" {{ $p_village->id == $member->p_village ? 'selected':'' }}>{{ $p_village->title }}</option>
                                                                    @endforeach
                                                                </select> --}}
                                                                <input type="text" name="p_village" id="p_village" class="form-control" placeholder="village" value="{{ $member->p_village }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding: 20px">
                                            <hr style="border: 1px solid">
                                        </div>
                                        <legend><span>Upload files</span></legend>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_photo"
                                                        title="Max filesize 500 kb, Dimension 450(w)X650(h)">Member Profile
                                                        Picture</label>
                                                    <input class="@error('m_photo') is-invalid @enderror form-control"
                                                        title="Max filesize 500 kb, Dimension 450(w)X650(h)"
                                                        name="m_photo" type="file" id="m_photo"
                                                        value="{{ old('m_photo', $member->m_photo) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_signature"
                                                        title="Max filesize 500 kb, Dimension 450(w)X650(h)">Signature
                                                        card</label>
                                                    <input class="@error('m_signature') is-invalid @enderror form-control"
                                                        title="Max filesize 500 kb, Dimension 450(w)X650(h)"
                                                        name="m_signature" type="file" id="m_signature"
                                                        value="{{ old('m_signature', $member->m_signature) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="nid_attachment"
                                                        title="Max filesize 500 kb, Dimension 450(w)X650(h)">Nation ID
                                                        Copy</label>
                                                    <input
                                                        class="@error('nid_attachment') is-invalid @enderror form-control"
                                                        title="Max filesize 500 kb, Dimension 450(w)X650(h)"
                                                        name="nid_attachment" type="file" id="nid_attachment"
                                                        value="{{ old('nid_attachment', $member->nid_attachment) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding: 20px">
                                            <hr style="border: 1px solid">
                                        </div>
                                        <legend><span>Membership Information</span></legend>
                                        {{-- <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="admission_fee">Admission Fee</label>
                                                    <input
                                                        class="@error('admission_fee') is-invalid @enderror form-control"
                                                        placeholder="Admission Fee" name="admission_fee" type="number"
                                                        id="admission_fee"
                                                        value="{{ old('admission_fee', $member->admission_fee) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="form_fee">Admission Form Fee</label>
                                                    <input class="@error('form_fee') is-invalid @enderror form-control"
                                                        placeholder="member.amount_for_admission_form_fee" name="form_fee"
                                                        type="number" id="form_fee"
                                                        value="{{ old('form_fee', $member->form_fee) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="total">Total</label>
                                                    <input class="@error('total') is-invalid @enderror form-control"
                                                        placeholder="Amount for admission form"
                                                        name="total" type="number" id="total"
                                                        value="{{ old('total', $member->total) }}">
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="admission_fee">Admission Fee</label>
                                                    <input class="form-control" placeholder="Admission Fee"
                                                        name="admission_fee" type="number" id="admission_fee"
                                                        value="{{ $member->admission_fee }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="form_fee">Admission Form Fee</label>
                                                    <input class="form-control" placeholder="Admission form fee"
                                                        name="form_fee" type="number" id="form_fee"
                                                        value="{{ $member->form_fee }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="totalfee">Total</label>
                                                    <input class="form-control" name="total" type="number"
                                                        disabled id="totalfee" value="{{  $member->form_fee + $member->admission_fee }}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="share_value">Share</label>
                                                    <input min="0" class="form-control" id="share_value"
                                                        placeholder="Share Value" name="share" type="number"
                                                        value="{{ $member->share }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="regular_savings">Savings Target / Day</label>
                                                    <input
                                                        class="@error('regular_savings') is-invalid @enderror form-control"
                                                        placeholder="Amount for regular savings" name="regular_savings"
                                                        type="number" id="regular_savings"
                                                        value="{{ old('regular_savings', $member->regular_savings) }}">
                                                </div>
                                            </div>
                                            {{-- <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="field_name">Charge for</label>
                                                    <input class="@error('field_name') is-invalid @enderror form-control"
                                                        placeholder="Charge for" name="field_name" type="text"
                                                        id="field_name"
                                                        value="{{ old('field_name', $member->field_name) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="field_value">Charge amount</label>
                                                    <input class="@error('field_value') is-invalid @enderror form-control"
                                                        placeholder="Charge amount" name="field_value" type="number"
                                                        id="field_value"
                                                        value="{{ old('field_value', $member->field_value) }}">
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="join">Joining Date</label>
                                                    <input class="@error('join') is-invalid @enderror form-control"
                                                        placeholder="No selection for today" name="join"
                                                        type="date" id="join"
                                                        value="{{ old('join', $member->join) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="account">Account Number</label>
                                                    <input class="@error('account') is-invalid @enderror form-control"
                                                        placeholder="Account Number" required="" name="account"
                                                        type="text" id="account"
                                                        value="{{ old('account', $member->account) }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="active">Account Activation</label>
                                                    <select class="form-control" id="active" name="active">
                                                        <option
                                                            value="0"{{ old('active', $member->active) ? ' selected' : '' }}>
                                                            Inactive</option>
                                                        <option
                                                            value="1"{{ old('active', $member->active) ? ' selected' : '' }}>
                                                            Active</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-buttons-w text-center">
                                                <button type="submit" class="btn btn-success disabled"
                                                    style="font-weight: bolder"> Update
                                                </button>
                                            </div>
                                            <div class="col-sm-6 form-buttons-w text-center">
                                                <a class="btn btn-primary step-trigger-btn" href="#nominee">Nominee</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-content" id="nominee"
                                        style="background:; padding-top: 15px; padding-bottom: 15px; border-radius: 5px">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="n_name">Nominee Name</label>
                                                    <input class="@error('n_name') is-invalid @enderror form-control"
                                                        placeholder="Nominee's Full Name" name="n_name" type="text"
                                                        id="n_name" value="{{ old('n_name', $member->n_name) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="select-form row">
                                                    <div class="col-md-12">
                                                        <label for="n_relation">Nominee relation with Member</label>
                                                        <div class="input-group mb-3 relation">
                                                            <select name="n_relation" id="n_relation"
                                                                class="form-control">
                                                                <option value="">-select-</option>
                                                                @foreach ($relations as $relation)
                                                                    <option value="{{ $relation->id }}"
                                                                        {{ $relation->id == $member->n_relation ? 'selected' : '' }}>
                                                                        {{ $relation->title }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-group-append">
                                                                <a type="button" class="btn btn-info"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="n_father">Nominee's Father Name</label>
                                                    <input class="@error('n_father') is-invalid @enderror form-control"
                                                        placeholder="Name of Nominee's Father" name="n_father"
                                                        type="text" id="n_father"
                                                        value="{{ old('n_father', $member->n_father) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="n_mother">Nominee's Mother Name</label>
                                                    <input class="@error('n_mother') is-invalid @enderror form-control"
                                                        placeholder="Nominee's Mother Name" name="n_mother"
                                                        type="text" id="n_mother"
                                                        value="{{ old('n_mother', $member->n_mother) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="n_nid">National ID Number</label>
                                                    <input class="@error('n_nid') is-invalid @enderror form-control"
                                                        placeholder="NID number of Nominee" name="n_nid" type="text"
                                                        id="n_nid" value="{{ old('n_nid', $member->n_nid) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="n_mobile">Mobile Number</label>
                                                    <input class="@error('n_mobile') is-invalid @enderror form-control"
                                                        placeholder="91XXXXXXXX" pattern="01[3-9]\d{8}" name="n_mobile"
                                                        type="tel" id="n_mobile"
                                                        value="{{ old('n_mobile', $member->n_mobile) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">`
                                                <div class="form-group">
                                                    <label for="n_photo">member.nominee's_photo_id</label>
                                                    <input class="@error('di') is-invalid @enderror form-control"
                                                        name="n_photo" type="file" id="n_photo">
                                                </div value="{{ old('di', $member->di) }}">
                                            </div>
                                        </div>
                                        <div style="padding: 20px">
                                            <hr style="border: 1px solid">
                                        </div>
                                        <legend><span>Nominee Address</span></legend>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="division"
                                                        class="col-form-label ">{{ __('Division') }}</label>
                                                    <div class="">
                                                        <select name="n_division" id="n_division" class="form-control">
                                                            @foreach ($divisions as $division)
                                                                <option value="{{ $division->id }}"
                                                                    {{ $division->id == $member->n_division ? 'selected' : '' }}>
                                                                    {{ $division->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="p_district" class="col-form-label ">District</label>
                                                    <div class="">
                                                        <select name="n_district" id="n_district" class="form-control">
                                                            <option value="">--Select--</option>
                                                            @foreach ($n_districts as $n_district)
                                                                <option value="{{ $n_district->id }}"
                                                                    {{ $n_district->id == $member->n_district ? 'selected' : '' }}>
                                                                    {{ $n_district->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="p_thana" class="col-form-label ">Sub District</label>
                                                    <div class="">
                                                        <select name="n_sub_district" id="n_sub_district"
                                                            class="form-control">
                                                            <option value="">--Select--</option>
                                                            @foreach ($n_subdistricts as $n_subdistrict)
                                                                <option value="{{ $n_subdistrict->id }}"
                                                                    {{ $n_subdistrict->id == $member->n_sub_district ? 'selected' : '' }}>
                                                                    {{ $n_subdistrict->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="n_post_code" class="col-form-label ">Post
                                                        Code</label>
                                                    <div class="">
                                                        <input class="form-control" placeholder="Post Code"
                                                            name="n_post_code" type="text" id="n_post_code"
                                                            value="{{ $member->c_post }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="p_post" class="col-form-label ">Post
                                                        Office</label>
                                                    <div class="">
                                                        <select name="n_post" id="n_post"
                                                        class="form-control">
                                                            <option value="">--Select--</option>
                                                            @foreach ($n_post_offices as $n_post_office)
                                                                <option value="{{ $n_subdistrict->id }}"
                                                                    {{ $n_post_office->id == $member->n_post ? 'selected' : '' }}>
                                                                    {{ $n_post_office->title }}</option>
                                                                    {{ $n_post_office->id }} <br>
                                                                    {{ $member->n_post }}
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="p_village" class="col-form-label ">Village</label>
                                                    <div class="">
                                                        {{-- <select name="n_village" id="n_village"
                                                    class="form-control">
                                                        <option value="">--Select--</option>
                                                        @foreach ($n_villages as $n_village)
                                                            <option value="{{ $n_subdistrict->id }}"
                                                                {{ $n_village->id == $member->n_village ? 'selected' : '' }}>
                                                                {{ $n_village->title }}</option>
                                                        @endforeach
                                                    </select> --}}
                                                    <input type="text" name="n_village" id="n_village"
                                                    class="form-control" placeholder="Village" value="{{ $member->n_village }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 form-buttons-w text-center">
                                                <a class="btn btn-primary step-trigger-btn" href="#member">Member</a>
                                            </div>
                                            <div class="col-sm-4 form-buttons-w text-center">
                                            </div>
                                            <div class="col-sm-4 form-buttons-w text-center">
                                                <button class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="" method="POST" id="addrelform">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Relation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="errormsg">

                        </div>

                        <div class="form-group">
                            <label for="title">Name</label>
                            <input class="form-control" placeholder="Relation Name" name="title" type="text"
                                id="title">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success add_relation">Save</button>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <script>
         //total amount
         $('#admission_fee').on('input', function() {
                total()
            });
            $('#form_fee').on('input', function() {
                total()
            });

            function total() {
                let admisison_fee = $('#admission_fee').val();
                let form_fee = $('#form_fee').val();
                var total = Number(admisison_fee) + Number(form_fee);
                $('#totalfee').val(Number(total));
            }
    </script>

    <script>
        function setSameAddress() {
            const isSameAddr = document.getElementById('sameAddr');
            $(function() {
                $('#permanent_address').show().slideDown('slow');
            })
            if (isSameAddr.checked) {
                $(function() {
                    $('#permanent_address').hide('slow').slideUp();
                })
            }
        }

        $(document).ready(function() {
            $(document).on('click', '.add_relation', function(e) {
                e.preventDefault();
                let title = $('#title').val();
                var url = "{{ route('relation.store') }}";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        'title': title
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#exampleModal').modal('hide');
                            $('#addrelform')[0].reset();
                            $('.relation').load(location.href + ' .relation');
                        }
                    },
                    error: function(error) {
                        for (var [el, message] of Object.entries(error.responseJSON.errors)) {
                            toastr.error(message);
                        }
                    }
                });
            })

            // present address
            $('#m_division').change(function() {
                var division = $('#m_division').val();
                var url = "{{ route('members.division') }}";
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        'division': division
                    },
                    success: function(data) {
                        $('#m_district').html(data);
                        $('#m_sub_district').html('');
                        $('#m_post').html('');
                        $('#m_village').html('');
                    }
                });
            });

            $('#m_district').change(function() {
                var sub_district = $('#m_district').val();
                var url = "{{ route('ajax.district') }}"
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        'sub_district': sub_district
                    },
                    success: function(data) {
                        $('#m_sub_district').html(data);
                        $('#m_post').html('');
                        $('#m_village').html('');
                    }
                });
            });

            $('#m_sub_district').change(function() {
                var sub_district = $('#m_sub_district').val();
                var url = "{{ route('ajax.sub_district') }}"
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        'sub_district': sub_district
                    },
                    success: function(data) {
                        $('#m_post').html(data);
                        $('#m_village').html('');
                    }
                });
            });

            $('#m_post').change(function() {
                var post_office = $('#m_post').val();
                var url = "{{ route('ajax.m_post') }}"
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        'post_office': post_office
                    },
                    success: function(data) {
                        $('#m_village').html(data);
                    }
                });
            });

            // parmanent address
            $('#p_division').change(function() {
                var division = $('#p_division').val();
                var url = "{{ route('members.division') }}";
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        'division': division
                    },
                    success: function(data) {
                        $('#p_district').html(data);
                        $('#p_sub_district').html('');
                        $('#p_post').html('');
                        $('#p_village').html('');
                    }
                });
            });

            $('#p_district').change(function() {
                var sub_district = $('#p_district').val();
                var url = "{{ route('ajax.district') }}"
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        'sub_district': sub_district
                    },
                    success: function(data) {
                        $('#p_sub_district').html(data);
                        $('#p_post').html('');
                        $('#p_village').html('');
                    }
                });
            });

            //p_post
            $('#p_sub_district').change(function() {
                var sub_district = $('#p_sub_district').val();
                var url = "{{ route('ajax.sub_district') }}"
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        'sub_district': sub_district
                    },
                    success: function(data) {
                        $('#p_post').html(data);
                        $('#p_village').html('');
                    }
                });
            });

            ////p_village
            $('#p_post').change(function() {
                var post_office = $('#p_post').val();
                var url = "{{ route('ajax.m_post') }}"
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        'post_office': post_office
                    },
                    success: function(data) {
                        $('#p_village').html(data);
                    }
                });
            });

            // nominne address
            $('#n_division').change(function() {
                var division = $('#n_division').val();
                var url = "{{ route('members.division') }}";
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        'division': division
                    },
                    success: function(data) {
                        $('#n_district').html(data);
                        $('#n_sub_district').html('');
                        $('#n_post').html('');
                        $('#n_village').html('');
                    }
                });
            });

            $('#n_district').change(function() {
                var sub_district = $('#n_district').val();
                var url = "{{ route('ajax.district') }}"
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        'sub_district': sub_district
                    },
                    success: function(data) {
                        $('#n_sub_district').html(data);
                        $('#n_post').html('');
                        $('#n_village').html('');
                    }
                });
            });

           //n_post
            $('#n_sub_district').change(function() {
                var sub_district = $('#n_sub_district').val();
                var url = "{{ route('ajax.sub_district') }}"
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        'sub_district': sub_district
                    },
                    success: function(data) {
                        $('#n_post').html(data);
                        $('#n_village').html('');
                    }
                });
            });

            //n_village
            $('#n_post').change(function() {
                var post_office = $('#n_post').val();
                var url = "{{ route('ajax.m_post') }}"
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        'post_office': post_office
                    },
                    success: function(data) {
                        $('#n_village').html(data);
                    }
                });
            });
        });
    </script>
@endsection
