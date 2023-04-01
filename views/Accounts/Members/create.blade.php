@extends('layouts.frontend.app', ['pageTitle' => 'Add Members'])
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="element-wrapper">
                    <div class="col-md-12 mb-2 mt-3">
                        <p class="card-header my-0"><strong>Note:</strong> The fields marked with ( <strong
                                class="text-danger">*</strong> ) are required.</p>
                    </div>
                    <div class="element-box">
                        <form method="POST" action="{{ route('members.store') }}" accept-charset="UTF-8" id="formValidate"
                            note="Have you provide all information properly?" enctype="multipart/form-data"
                            novalidate="true">
                            @csrf
                            <div class="steps-w">
                                <div class="step-triggers">
                                    <a class="step-trigger active text-white pt-3" href="#member"
                                        style="background:rgb(10, 17, 116);">{{ __('Member') }}</a>
                                    <a class="step-trigger text-white pt-3" href="#nominee"
                                        style="background:rgb(39, 87, 7);">Nominee</a>
                                </div>
                                <div class="step-contents">
                                    <div class="step-content active" id="member"
                                        style="background:; padding-top: 15px; padding-bottom: 15px; border-radius: 5px">
                                        <div class="row">

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_name">Member Name</label>
                                                    <strong class="text-danger">*</strong>
                                                    <input data-error="Name can't be blank" class="form-control"
                                                        placeholder="Member's Full Name" autofocus="" required=""
                                                        name="m_name" type="text" id="m_name"
                                                        value="{{ old('m_name') }}">

                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="area">Select Area</label>
                                                    <strong class="text-danger">*</strong>
                                                    <select class="form-control" required="" id="area"
                                                        name="area_id" required>
                                                        <option value="">Select an Area</option>
                                                        @foreach ($areas as $area)
                                                            <option {{ $area->id == old('area_id') ? 'selected' : '' }}
                                                                value="{{ $area->id }}"
                                                                data-area_code="{{ $area->area_code }}">
                                                                {{ $area->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_mobile">Mobile Number</label>
                                                    <input class="form-control" placeholder="01XXXXXXXXX"
                                                        pattern="01[3-9]\d{8}" name="m_mobile" type="tel" id="m_mobile"
                                                        value="{{ old('m_mobile') }}">
                                                    @error('m_mobile')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_birthday">Date of Birth</label>
                                                    <input class="form-control" name="m_birthday" type="date"
                                                        id="m_birthday" value={{ old('m_birthday') }}>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_father">Member's Father</label>
                                                    <input class="form-control" placeholder="Name of Member's Father"
                                                        name="m_father" type="text" id="m_father"
                                                        value="{{ old('m_father') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_mother">Member's Mother</label>
                                                    <input class="form-control" placeholder="Name of Member's Mother"
                                                        name="m_mother" type="text" id="m_mother"
                                                        value="{{ old('m_mother') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_companion">Husband / Spouse</label>
                                                    <input class="form-control" placeholder="Name of life partner"
                                                        name="m_companion" type="text" id="m_companion"
                                                        value="{{ old('m_companion') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_nid">National ID Number</label>
                                                    <input class="form-control" placeholder="NID number of member"
                                                        name="m_nid" type="number" id="m_nid"
                                                        value="{{ old('m_nid') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_gender">Gender of member</label>
                                                    <strong class="text-danger">*</strong>
                                                    <select class="form-control" id="m_gender" name="m_gender" required>
                                                        <option value="1"
                                                            {{ old('m_gender') == '1' ? 'selected' : '' }}>Male</option>
                                                        <option value="2"
                                                            {{ old('m_gender') == '2' ? 'selected' : '' }}>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="second_mobile">Secondary Number</label>
                                                    <input class="form-control" placeholder="Additional Mobile Number"
                                                        pattern="01[3-9]\d{8}" name="second_mobile" type="tel"
                                                        id="second_mobile" value="{{ old('second_mobile') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="profession">Profession</label>
                                                    <input class="form-control" placeholder="Like Business / Farmer"
                                                        name="profession" type="text" id="profession"
                                                        value="{{ old('profession') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="business">Member Business Name</label>
                                                    <input class="form-control" placeholder="Member business if available"
                                                        name="business" type="text" id="business"
                                                        value="{{ old('business') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="nation">Religion</label>
                                                    <input class="form-control" placeholder="religion"
                                                        name="nation" type="text" id="nation"
                                                        value="{{ old('nation') }}">
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="marital">Marital Status</label>
                                                    <strong class="text-danger">*</strong>
                                                    <select class="form-control" id="marital" name="marital" required>
                                                        <option value="1"
                                                            {{ old('marital') == '1' ? 'selected' : '' }}>Married</option>
                                                        <option value="2"
                                                            {{ old('marital') == '2' ? 'selected' : '' }}>Unmarried</option>
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="mtype">Member Type</label>
                                                    <strong class="text-danger"></strong>
                                                    <select class="form-control" id="mtype" name="mtype">
                                                        <option value="0"
                                                            {{ old('mtype') == '0' ? 'selected' : '' }}>Select Item</option>
                                                        <option value="1"
                                                            {{ old('mtype') == '1' ? 'selected' : '' }}>Daily</option>
                                                        <option value="2"
                                                            {{ old('mtype') == '2' ? 'selected' : '' }}>Weekly</option>
                                                            <option value="3"
                                                            {{ old('mtype') == '3' ? 'selected' : '' }}>Half Monthly</option>
                                                            <option value="4"
                                                            {{ old('mtype') == '4' ? 'selected' : '' }}>Yearly</option>
                                                    </select>
                                                </div>
                                            </div> --}}



                                        </div>
                                        <div style="padding: 20px">
                                            <hr style="border: 1px solid">
                                        </div>
                                        <div style="background:;">
                                            <legend><span>Present Address</span></legend>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="division"
                                                            class="col-form-label">{{ __('Division') }}</label>
                                                        <div class="">
                                                            <select name="m_division" id="m_division"
                                                                class="form-control">
                                                                <option value="">--{{ __('Select') }}--</option>
                                                                @foreach ($divisions as $division)
                                                                    <option value="{{ $division->id }}">
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
                                                            <select name="m_district" id="m_district"
                                                                class="form-control">
                                                                <option value="">--select--</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="m_thana" class="col-form-label">Sub District</label>
                                                        <div class="">
                                                            <select name="m_thana" id="m_sub_district"
                                                                class="form-control">
                                                                <option value="">--select--</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">



                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="m_post" class="col-form-label">Post Office</label>
                                                        <div class="">
                                                            <select name="m_post" id="m_post" class="form-control">
                                                                <option value="">--select--</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="m_post" class="col-form-label">Post Code</label>
                                                        <div class="">
                                                            <input class="form-control" placeholder="Post code"
                                                                name="post_code" type="text" id="post_code"
                                                                value="{{ old('post_code') }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="m_village" class="col-form-label">Village</label>
                                                        <div class="">
                                                            {{-- <select name="m_village" id="m_village" class="form-control">
                                                                <option value="">--select--</option>
                                                            </select> --}}
                                                            <input type="text" name="m_village" id="m_village" class="form-control" placeholder="Village">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div style="padding: 20px">
                                                <hr style="border: 1px solid">
                                            </div>
                                            <legend><span>Permanent Address
                                                    <input type="checkbox" name="same" id="sameAddr"
                                                        onchange="setSameAddress();"
                                                        {{ old('same') ? 'checked' : '' }}><small>(same)</small>
                                                </span></legend>

                                            <div id="permanent_address" style="background:;">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="division"
                                                                class="col-form-label ">{{ __('Division') }}</label>
                                                            <div class="">
                                                                <select name="p_division" id="p_division"
                                                                    class="form-control">
                                                                    <option value="">--{{ __('Select') }}--
                                                                    </option>
                                                                    @foreach ($divisions as $division)
                                                                        <option value="{{ $division->id }}">
                                                                            {{ $division->title }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="p_district"
                                                                class="col-form-label ">District</label>
                                                            <div class="">
                                                                <select name="p_district" id="p_district"
                                                                    class="form-control">
                                                                    <option value="">--Select--</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="p_thana" class="col-form-label ">Sub
                                                                District</label>
                                                            <div class="">
                                                                <select name="p_thana" id="p_sub_district"
                                                                    class="form-control">
                                                                    <option value="">--Select--</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="p_post" class="col-form-label ">Post
                                                                Office</label>
                                                            <div class="">
                                                                <select name="p_post" id="p_post"
                                                                    class="form-control">
                                                                    <option value="">--Select--</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="p_post" class="col-form-label ">Post
                                                                Code</label>
                                                            <div class="">
                                                                <input class="form-control" placeholder="Post Code"
                                                                    name="p_post_c" type="text" id="p_post_c"
                                                                    value="{{ old('p_post_c') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="p_village" class="col-form-label ">Village</label>
                                                            <div class="">
                                                                {{-- <select name="p_village" id="p_village"
                                                                    class="form-control">
                                                                    <option value="">--Select--</option>
                                                                </select> --}}
                                                                <input type="text" name="p_village" id="p_village"
                                                                class="form-control" placeholder="Village">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div style="padding: 20px">
                                                <hr style="border: 1px solid">
                                            </div>
                                            <div style="background:;">
                                                <legend><span>Upload files</span></legend>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="m_photo"
                                                                title="Max filesize 500 kb, Dimension 450(w)X650(h)">Member
                                                                Profile
                                                                Picture</label>
                                                            <input class="form-control"
                                                                title="Max filesize 500 kb, Dimension 450(w)X650(h)"
                                                                name="m_photo" type="file" id="m_photo">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="m_signature"
                                                                title="Max filesize 500 kb, Dimension 450(w)X650(h)">Signature
                                                                card</label>
                                                            <input class="form-control"
                                                                title="Max filesize 500 kb, Dimension 450(w)X650(h)"
                                                                name="m_signature" type="file" id="m_signature">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="nid_attachment"
                                                                title="Max filesize 500 kb, Dimension 450(w)X650(h)">Nation
                                                                ID
                                                                Copy</label>
                                                            <input class="form-control"
                                                                title="Max filesize 500 kb, Dimension 450(w)X650(h)"
                                                                name="nid_attachment" type="file" id="nid_attachment">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="padding: 20px">
                                                <hr style="border: 1px solid">
                                            </div>
                                            <legend><span>Membership Information</span></legend>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="admission_fee">Admission Fee</label>
                                                        <input class="form-control" placeholder="Admission Fee"
                                                            name="admission_fee" type="number" id="admission_fee"
                                                            value="{{ old('admission_fee') }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="form_fee">Admission Form Fee</label>
                                                        <input class="form-control" placeholder="Admission form fee"
                                                            name="form_fee" type="number" id="form_fee"
                                                            value="{{ old('form_fee') }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="totalfee">Total</label>
                                                        <input class="form-control" name="total" type="number"
                                                            disabled id="totalfee">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="charge_amount">Charge Amount</label>
                                                        <strong class="text-danger"></strong>
                                                        <input class="form-control" placeholder="Charge Amount"
                                                             name="charge_amount" type="text"
                                                            value="{{ old('charge_amount') }}" id="charge_amount">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="charge_for">Charge For</label>
                                                        <strong class="text-danger"></strong>
                                                        <input class="form-control" placeholder="Charge For"
                                                             name="charge_for" type="text"
                                                            value="{{ old('charge_for') }}" id="charge_for">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="regular_savings">Share</label>
                                                        <input class="form-control" name="share" type="number"
                                                            id="share" value="{{ old('share') }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="join">Joining Date</label>
                                                        <input class="form-control" placeholder="No selection for today"
                                                            name="join" type="date" id="join"
                                                            value="{{ date('Y-m-d') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                               
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account">Account Number</label>
                                                        <strong class="text-danger">*</strong>
                                                        <input class="form-control" placeholder="Account Number"
                                                            required="" name="account" type="text"
                                                            value="{{ old('account') }}" id="account">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="active">Account Activation</label>
                                                        <select class="form-control" id="active" name="active">
                                                            <option value="1"
                                                                value="{{ old('active', 1) == '1' ? 'selected' : '' }}">
                                                                Active
                                                            </option>
                                                            <option value="0"
                                                                value="{{ old('active') == '0' ? 'selected' : '' }}">
                                                                Inactive
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>


                                            </div>

                                            <div style="padding: 20px">
                                                <hr style="border: 1px solid">
                                            </div>

                                            <legend><span>Authentication Info</span></legend>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input class="form-control" placeholder="Email Address"
                                                            name="email" type="text" id="email"
                                                            value="{{ old('email') }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input class="form-control" name="password" type="password"
                                                            id="password" placeholder="password...">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-buttons-w text-center">
                                                    <button type="submit" class="btn btn-success disabled"
                                                        style="font-weight: bolder; width: 100%;"> Submit
                                                    </button>
                                                </div>
                                                <div class="col-sm-6 form-buttons-w text-center">
                                                    <a style="width: 100%;" class="btn btn-primary step-trigger-btn"
                                                        href="#nominee">Nominee</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-content" id="nominee"
                                        style="background:; padding-top: 15px; padding-bottom: 15px; border-radius: 5px">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="n_name">Nominee Name</label>
                                                    <input class="form-control" placeholder="Nominee's Full Name"
                                                        name="n_name" type="text" id="n_name"
                                                        value="{{ old('n_name') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="select-form row">
                                                    <div class="col-md-12">
                                                        <label for="n_relation">Nominee relation with Member</label>
                                                        <div class="input-group mb-3 relation">
                                                            <select name="n_relation" id="n_relation"
                                                                class="form-control">
                                                                @foreach ($relations as $relation)
                                                                    <option value="{{ $relation->id }}">
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
                                                    <input class="form-control" placeholder="Name of Nominee's Father"
                                                        name="n_father" type="text" id="n_father"
                                                        value="{{ old('n_father') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="n_mother">Nominee's Mother Name</label>
                                                    <input class="form-control" placeholder="Nominee's Mother Name"
                                                        name="n_mother" type="text" id="n_mother"
                                                        value="{{ old('n_mother') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="n_nid">National ID Number</label>
                                                    <input class="form-control" placeholder="NID number of Nominee"
                                                        name="n_nid" type="text" id="n_nid"
                                                        value="{{ old('n_nid') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="n_mobile">Mobile Number</label>
                                                    <input class="form-control" placeholder="91XXXXXXXX"
                                                        pattern="01[3-9]\d{8}" name="n_mobile" type="tel"
                                                        id="n_mobile" value="{{ old('n_mobile') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="n_photo">Member nominee phoot</label>
                                                    <input class="form-control" name="n_photo" type="file"
                                                        id="n_photo">
                                                </div>
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
                                                            <option value="">-select-</option>
                                                            @foreach ($divisions as $division)
                                                                <option value="{{ $division->id }}">
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
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="p_post" class="col-form-label ">Post
                                                        code</label>
                                                    <div class="">
                                                        <input class="form-control" placeholder="Post Code"
                                                            name="c_post" type="text" id="c_post"
                                                            value="{{ old('c_post') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="p_post" class="col-form-label ">Post
                                                        Office</label>
                                                    <div class="">
                                                        <select name="n_post" id="n_post" class="form-control">
                                                            <option value="">--Select--</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="p_village" class="col-form-label ">Village</label>
                                                    <div class="">
                                                        {{-- <select name="n_village" id="n_village" class="form-control">
                                                            <option value="">--Select--</option>
                                                        </select> --}}
                                                        <input type="text" name="n_village" id="n_village" class="form-control" placeholder="Nominee Village">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-buttons-w text-center">
                                                <a style="width: 100%;" class="btn btn-info step-trigger-btn" href="#member">Member</a>
                                            </div>
                                           
                                            <div class="col-sm-6 form-buttons-w text-center">
                                                <button style="width: 100%;" class="btn btn-primary">Submit Form</button>
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
        });
    </script>

    <script>
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
        const last_account_num = "{{ $last_account_num }}";
        $('#area').on('change', function() {
            var area_id = $(this).val();
            var url = "{{ route('get_last_account_number_by_area') }}";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    'area_id': area_id
                },
                success: function(response) {
                    if (response) {
                        $('#account').val(response)
                    } else {
                        $('#account').val('')
                    }
                },
                error: function(error) {

                }
            });
        });

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
    </script>

    <!---present address--->
    <script>
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

        //m_post
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

        ////m_village
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

        ////n_village
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
    </script>
@endsection
@push('javascripts')
    {{-- <script>
 $(".js-example-tokenizer").select2({
    tags: true,
    tokenSeparators: [',', ' ']
})
</script> --}}
    <script>
        $(document).ready(function() {
            // Select2 Multiple
            $('.js-example-tokenizer').select2({
                placeholder: "Select",
                allowClear: true
            });

        });
    </script>
@endpush
