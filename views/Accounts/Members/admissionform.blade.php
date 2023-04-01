<!DOCTYPE html>
<!-- saved from url=(0057)http://ngo.jerp.xyz/deposit/client_info_Print?bookno=1000 -->
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <title>Member Admission Form</title>
    
    <style>
        .table.table-bordered td,
        .table.table-bordered th {
            border: 1px solid black;
            padding: 2px 4px;
        }

        table {
            border-collapse: collapse;
        }

        table.full {
            width: 100%;
        }

        .image-name {
            font-size: 10px;
            padding: 0;
            margin: -10px 0 0 0;
            font-style: italic;
        }
    </style>
</head>

<body>
    <center>
        <br>
        <div id="div_print" style="width: 850px">
            <div class="nomargin" style="float: right; width: 100%">
                <table style="width: 100%; background-color: lightgrey; border-radius: 10px 10px 0 0">
                    <tr>
                        <td style="text-align: left; padding-left: 10px">
                            <h2 style="margin: 0">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h2>
                            <p style="margin: 1px; line-height: 20px">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                            <p style="margin: 1px; line-height: 20px">bluestar261k@gmail.com
                                , 01911904312, 01701298350</p>
                        </td>
                        <td style="text-align: right; padding-right: 10px">
                            <img src="{{ asset('images/logo.png') }}" height="77px" max-width="200px"
                                alt="ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ">
                        </td>
                    </tr>
                </table>
                <hr>
            </div>
            <div style="float: left; width: 30%">
                <table class="table" style="font-size: 14px; width: 100%">
                    <tbody>
                        <tr>
                            <td class="text-left" width="25%">Account:</td>
                            <td class="text-left" width="30%">{{ $members->account }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <center style="float: left; width: 40%">
                <center style="border: 0.5px solid black; border-radius: 10px; width: 200px; text-align: center">
                    <h4 style="margin: 0">Admission Form</h4>
                </center>
            </center>
            <div style="float: right; width: 30%">
                <table class="table" style="font-size: 14px; width: 100%">
                    <tbody>
                        <tr>
                            <td class="text-left" width="25%">Adimtion Date:</td>
                            <td class="text-left" width="30%">{{ $members->join ?? $members->created_at->toFormattedDateString() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: 100%; float: left">
                <hr>
                <table width="100%">
                    <tr style="text-align: right">
                        <td>
                            <p style="text-align: left">
                                <b>To</b>
                                <br> Chairman
                                <br> ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ
                                <br>
                            </p>
                            <p style="font-size: 12px; text-align: left; margin-top: -8px;">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                        </td>
                        <td>
                            <img src="{{ $members->m_photo?  asset('storage/uploads/members/' . $members->m_photo) : asset('images/default_member_image.jpg') }}" width="100px" height="108px"
                                alt="Profile Picture">
                            <p class="image-name" style="margin-top: 1px">Member Photo</p>
                        </td>
                        <td>
                            <img src="{{ $members->n_photo?  asset('storage/uploads/members/' . $members->n_photo) : asset('images/default_member_image.jpg') }}" width="100px" height="108px"
                                alt="Nominee Picture">
                            <p class="image-name" style="margin-top: 1px">Nominee Photo</p>
                        </td>
                        <td>
                            <img src="{{ $members->m_signature?  asset('storage/uploads/members/' . $members->m_signature) : asset('images/default_member_image.jpg') }}" width="100px" height="108px"
                                alt="Member Signature">
                            <p class="image-name" style="margin-top: 1px">Member Signature</p>
                        </td>
                    </tr>
                </table>
                <hr>
            </div>
            <div style="width: 100%; float: left">
                <p style="text-align: left; text-align: justify; font-size:14px;">
                    আমি নিম্ন স্বাক্ষরকারী ব্লু ষ্টার সঞ্চয় ও ঋণদান সমবায় সমিতি লিঃ....
                        অফিসের উদ্যোগে গঠিত দৈনিক সঞ্চয় চলতি সঞ্চয়/এককালিন/মেয়াদি হিসাব প্রকল্পের সদস্য/সদস্যা হইতে
                        ইচ্ছুক।
                        আমি অঙ্গিকার করিতেছি যে, সমিতির সমস্ত নিয়মকানুন ও উল্লেখিত শর্তাবলী যথাযথভাবে পালন করিব মেনে চলিতে
                        বাধ্য থাকিবাে।members
                        স্বার্থ বিরােধী বলিয়া বিবেচিত হইতে পারে । নিম্নে আমার ব্যাক্তিগত তথ্য ও জীবন বৃত্তান্ত বর্ণনা
                        করিলাম :
                </p>
            </div>
            <div style="float: left; width: 100%">
                <table class="table table-bordered full" style="font-size: 14px;">
                    <tbody>
                        <tr>
                            <td class="text-left" width="20%">নাম</td>
                            <td class="text-left" width="30%">{{ $members->m_name }}</td>
                            <td class="text-left" width="20%">পিতা/স্বামীর নাম</td>
                            <td class="text-left">{{ $members->m_companion }}</td></td>
                        </tr>
                        <tr>
                            <td class="text-left" width="20%">বাবার নাম</td>
                            <td class="text-left" width="30%">{{ $members->m_father }}</td>
                            <td class="text-left" width="20%">মাতার নাম</td>
                            <td class="text-left" width="30%">{{ $members->m_mother }}</td>
                        </tr>
                        <tr>
                            <td class="text-left" width="20%">গ্রাম</td>
                            <td class="text-left" width="30%">{{ $members->Village->title ?? null }}</td>
                            <td class="text-left" width="20%">ডাকঘর</td>
                            <td class="text-left" width="30%">{{ $members->PostOffice->title ?? null }}</td>
                        </tr>
                        <tr>
                            <td class="text-left" width="20%">উপজেলা</td>
                            <td class="text-left" width="30%">{{ $members->SubDistrict->title ?? null }}</td>
                            <td class="text-left" width="20%">জেলা</td>
                            <td class="text-left" width="30%">{{ $members->district->title ?? null }}</td>
                        </tr>
                        <tr>
                            <td class="text-left" width="20%">লিঙ্গ</td>
                            <td class="text-left" width="30%">{{ $members->m_gender == 1 ? 'male' : 'female' }}</td>
                            <td class="text-left" width="20%">জাতি</td>
                            <td class="text-left" width="30%">{{ $members->m_nation }}</td>
                        </tr>
                        <tr>
                            <td class="text-left" width="20%">বৈবাহিক অবস্থা</td>
                            <td class="text-left" width="30%">{{ $members->m_marital == 1 ? "Married":"Unmarried" }}</td>
                            <td class="text-left" width="20%">পেশা</td>
                            <td class="text-left" width="30%">{{ $members->profession }}</td>
                        </tr>
                        <tr>
                            <td class="text-left" width="20%">ব্যবসা প্রতিষ্ঠানের নাম</td>
                            <td class="text-left">{{ $members->business }}</td>
                            <td class="text-left" width="20%">আইডি নং</td>
                            <td class="text-left" width="20%">{{ $members->m_nid }}</td>
                        </tr>
                    </tbody>
                </table>

                <div style="float: left; width: 100%; margin-bottom:10px;">
                    <h4 style="margin-bottom: 0">Nominee Information</h4>
                    <br>
                    <table class="table table-bordered" style="font-size: 14px" width="100%">
                        <tbody>
                        <tr>
                            <td class="text-left" width="20%">নমিনীর নাম</td>
                            <td class="text-left" width="30%">{{ $members->n_father }}</td>
                            <td class="text-left" width="20%">সম্পর্ক</td>
                            <td class="text-left" width="30%">{{ $members->relation->title ?? null }}</td>
                        </tr>
    
                        <tr>
                            <td class="text-left" width="20%">নমিনীর মোবাইল নাম্বার</td>
                            <td class="text-left" width="30%">{{ $members->n_mobile }}</td>
                            <td class="text-left" width="20%">আইডি নং</td>
                            <td class="text-left" width="30%">{{ $members->n_nid }}</td>
                        </tr>
    
                        <tr>
                            <td class="text-left" width="20%">নমিনীর পিতার নাম</td>
                            <td class="text-left" width="30%">{{ $members->n_father }}</td>
                            <td class="text-left" width="20%">নমিনীর পিতার নাম</td>
                            <td class="text-left" width="30%">{{ $members->n_mother }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <table class="table table-bordered" style="font-size: 14px; margin-top:15px;">
                    <tr>
                        <td rowspan="2" style="text-align:center">দৈনিক জমার পরিমাণ</td>
                        <td colspan="2" style="text-align:center">৩ বছর</td>
                        <td colspan="2" style="text-align:center">৬ বছর</td>
                        <td colspan="2" style="text-align:center">৯ বছর</td>
                        <td colspan="2" style="text-align:center">১২ বছর</td>
                    </tr>
                    <tr>
                        <td style="text-align:center">মােট জমা </td>
                        <td style="text-align:center">মুনাফা সহ প্রদান </td>
                        <td style="text-align:center">মােট জমা </td>
                        <td style="text-align:center">মুনাফা সহ প্রদান </td>
                        <td style="text-align:center">মােট জমা </td>
                        <td style="text-align:center">মুনাফা সহ প্রদান </td>
                        <td style="text-align:center">মােট জমা </td>
                        <td style="text-align:center">মুনাফা সহ প্রদান </td>
                    </tr>
                    <tr>
                        <td >২০(টাকা)</td>
                        <td >২১,৬০০</td>
                        <td >২৫,০২০</td>
                        <td >৪৩,২০০</td>
                        <td >৬১,৯৩০</td>
                        <td >৬৪,৮০০</td>
                        <td >১,১৮,১৯০</td>
                        <td >৮৬,৪০০</td>
                        <td >২,০১,০০০</td>
                    </tr>
                    <tr>
                        <td >৫০(টাকা)</td>
                        <td >৫৪,৪০০</td>
                        <td >৬২,৫৫০</td>
                        <td >১,০৮,০০০</td>
                        <td >১,৫৪,৮২৫</td>
                        <td >১,৬২,০০০</td>
                        <td >২,৯৫,৪৭৫</td>
                        <td >২,১৬,০০০</td>
                        <td >৫,০২,৫০০</td>
                    </tr>
                    <tr>
                        <td >১০০(টাকা)</td>
                        <td >১,০৮,০০০</td>
                        <td >১,২৫,১০০</td>
                        <td >২,১৬,৩০০</td>
                        <td >৩,০৯,৬৫০</td>
                        <td >৩,২৪,০০০</td>
                        <td >৫,৯০,৯৫০</td>
                        <td >৪,৩২৩,০০০</td>
                        <td >১০,০৫,০০০</td>
                    </tr>
                </table>
                
            </div>
            <!-- table-responsive -->
            <div style="width: 100%; float: left">
                <div style="text-align: left; text-align: justify; font-size:14px;">
                <h4 style="margin-top: 5px; margin-left: 203px; font-size: 15px;">বি: দ্র: ঈদ, পূজা উপলক্ষে বছরের ৫ দিনের আদায় বন্ধ থাকিবে।</h4>
                <h3 style="margin-top: -15px; margin-bottom: 0px; font-size: 15px; margin-left: 350px; background: #1e295c; display: inline-block; padding: 9px 28px 9px 28px; border-radius: 20px; color: white;">শর্তাবলীঃ</h3>
                   <ul>
                    <li>জমাকৃত সঞ্চয়ের টাকা নির্ধারিত মেয়াদ ছাড়া কোন প্রকার ভাংশ্য/ মুনাফা প্রদান করা হবে না। </li>
                        <li>যে অংকের (২০,৩০,৫০,১০০) হিসাব-ই চালু হউক, প্রতি মাসে ৩০ দিনের হিসাবের সম পরিমাণ টাকা / সঞ্চয়
                            জমা
                            হতে হবে। যেমন- ২০/=
                            টাকার হিসাব (৩০X২০=৬০০/=)টাকা জমা হতে হবে।</li>
                        <li>পর পর তিন মাস প্রতি মাসে সম পরিমাণ সঞ্চয়/টাকা জমা হলে মেয়াদ শেষে মুনাফা প্রদানের ক্ষেত্রে ০৫%
                            কর্তন হবে। </li>
                        <li>সদস্য/সদস্যা পদ লাভের জন্য ভর্তি ফি ১৫০/= যা অফেরতযােগ্য।</li>
                        <li>সঞ্চয় এর ক্ষেত্রে নূন্যতম মেয়াদের পূর্বে বা ০১বছরের পর হিসাব বন্ধ/ভাঙ্গতে হলে, কোন প্রকার
                            মুনাফা
                            প্রদান করা হবে না ।</li>
                        <li> ০২ বছরের পূর্বে বা ০১ বছরের পর হিসাব বন্ধ করলে, সেক্ষেত্রে প্রতিষ্ঠান প্রদত্ত শর্ত প্রযােজ্য
                            হবে।
                            এবং ০১ বছরের পূর্বে বা ০৬ মাসের পর।
                            হিসাব বন্ধ করলে প্রতিষ্ঠান কোন প্রকার লভ্যাংশ প্রদান করবেন না।</li>
                        <li>মেয়াদী হিসাবের ক্ষেত্রে মেয়াদের পূর্বে হিসাব বন্ধ করলে জমাকৃত টাকার ৫০%কর্তন করা হবে ।</li>
                        <li>মনে রাখতে হবে উল্লেখিত সঞ্চয় প্রকল্পের পূর্ণ মেয়াদ ১/২/৩ বছর। সে ক্ষেত্রে ০৩ মাসের মধ্যে যদি
                            আপনার
                            হিসাব কোন কারণ বশত: বন্ধ।।
                            স্থগিত হয়ে যায় তবে উক্ত প্রকল্পের হিসাব বাতিল বলিয়া গণ্য করা হবে। কোন প্রকার আর্থিক লেনদেন
                            প্রযােজ্য হবে না বা ফেরত হবে না।</li>

                        <li>এই প্রকল্পের সদস্য গুণ আর্থিক প্রয়ােজনে ঋণ সুবিধা পাবেন, ঋণ গ্রহণের ক্ষেত্রে অফিসের সকল
                            শর্তাবলী
                            মেনে ঋণ গ্রহণ করতে হবে। উক্ত
                            ঋণের টাকা দৈনিক কিস্তিতে পর পর ১২০ দিনে পরিশােধ করতে হবে। প্রতিষ্ঠান প্রদত্ত সার্ভিস চার্জ
                            প্রযােজ্য
                            হবে। </li>
                        <li>মুনাফা হিসাব ১০%,১২%,১৩%,১৪%, হারে নির্ধারিত হবে , মেয়াদন্তে প্রতি মাসের ২০ তারিখের মধ্যে আবেদন
                            করতে হবে। পরবর্তী মাসের
                            ২০ তারিখের মধ্যে টাকা ফেরত প্রদান করা হবে।</li>
                        <li>উল্লেখিত শর্তাবলীতে যাহা কিছু থাকুক না কেন সরকার প্রদত্ত সা: চার্জ হিসাবের পরিবর্তন হলে অত্র
                            প্রকল্পের মুনাফা প্রদানের ক্ষেত্রে কমবেশি হবে। (১৭/১৮ অর্থ বছরের হিসাব মতে প্রস্তুত)
                            সর্বক্ষেত্রে
                            ভ্যাট প্রযােজ্য। </li>
                   </ul>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>

            <div style="width: 30%; float: left; margin-left:27px;">
                <div style="text-align: left; text-align: center; font-size:14px; ">
                    <hr class="border border-dark w-50">আবেদনকারীর স্বাক্ষর
                </div>
            </div>

            <div style="width: 30%; float: left; margin-left:27px;">
                <div style="text-align: left; text-align: center; font-size:14px; ">
                    <hr class="border border-dark w-50">ফিল্ড অফিসারের স্বাক্ষর
                </div>
            </div>

            <div style="width: 30%; float: left; margin-left:28px;">
                <div style="text-align: left; text-align: center; font-size:14px; ">
                    <hr class="border border-dark w-50">অফিস প্রধান স্বাক্ষর
                </div>
            </div>

            <div style="width: 30%; float: left; margin-left:28px; margin-top:28px; margin-bottom:28px;">
                <div style="text-align: left; text-align: center; font-size:14px; ">
                    <hr class="border border-dark w-50">সাধারণ সম্পাদকের স্বাক্ষর
                </div>
            </div>

            <div style="width: 30%; float: right;">
                <div style="text-align: left; text-align: center; font-size:14px; margin-top:28px; margin-bottom:28px;">
                    <hr class="border border-dark w-50">পরিচালক সমন্বয়কারীর স্বাক্ষর
                </div>
            </div>
        </div>
    </center>
</body>
</html>

