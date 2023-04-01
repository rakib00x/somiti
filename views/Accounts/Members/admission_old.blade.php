@section('content')
    <div class="container mt-4" id="printArea" style="border-radius:0px;">
        <div class="content-i">
            <div class="nomargin" style="float: right; width: 100%">
                <table style="width: 100%; background-color:rgba(195, 151, 151, 0.392); border-radius: 10px 10px 0 0">
                    <tr>
                        <td style="text-align: left; padding-left: 10px">
                            <h2 style="margin:2px; font-weight:600;">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h2>
                            <p style="margin: 5px; line-height: 20px">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                            <p style="margin: 5px; line-height: 20px">bluestar261k@gmail.com
                                , 01911904312, 01701298350</p>
                        </td>
                        <td style="text-align: right; padding-right: 10px">
                            <img src="{{ asset('images/logo.png') }}" height="77px" max-width="200px" alt="সমিতি কিপার সঞ্চয় ও ঋণ দান সমবায় সমিতি">
                        </td>
                    </tr>
                </table>

                <hr>
            </div>
            <div style="width: 100%; float: left">
                <hr>
                <table width="100%">
                    <tr style="text-align: right">
                        <td >
                            <p style="text-align:left" >
                                <b> To</b>
                                <br> Chairman
                                <br> ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ
                                <br>
                            </p>
                            <p style="font-size: 12px; text-align: left; margin-top: -8px;">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                        </td>
                        <td>
                            <img src="{{ asset('storage/uploads/members/' . $members->m_photo) }}" width="100px" height="108px" alt="Profile Picture">
                            <p class="image-name" style="margin-top: 1px">Member Photo</p>
                        </td>
                        <td>
                            <img src="{{ asset('storage/uploads/members/' . $members->n_photo) }}" width="100px" height="108px" alt="Nominee Picture">
                            <p class="image-name" style="margin-top: 1px">Nominee Photo</p>
                        </td>
                        <td>
                            <img src="{{ asset('storage/uploads/members/' . $members->m_signature) }}" width="100px" height="108px" alt="Member Signature">
                            <p class="image-name" style="margin-top: 1px">Member Signature</p>
                        </td>
                    </tr>
                </table>
                <hr>
            </div>

            <div class="row" style="background-color: ">
                <br>
                <div class="container" style="padding-top: 5px">
                    <p class="text-center">আমি নিম্ন স্বাক্ষরকারী ব্লু ষ্টার সঞ্চয় ও ঋণদান সমবায় সমিতি লিঃ....
                        অফিসের উদ্যোগে গঠিত দৈনিক সঞ্চয় চলতি সঞ্চয়/এককালিন/মেয়াদি হিসাব প্রকল্পের সদস্য/সদস্যা হইতে
                        ইচ্ছুক।
                        আমি অঙ্গিকার করিতেছি যে, সমিতির সমস্ত নিয়মকানুন ও উল্লেখিত শর্তাবলী যথাযথভাবে পালন করিব মেনে চলিতে
                        বাধ্য থাকিবাে।members
                        স্বার্থ বিরােধী বলিয়া বিবেচিত হইতে পারে । নিম্নে আমার ব্যাক্তিগত তথ্য ও জীবন বৃত্তান্ত বর্ণনা
                        করিলাম ।</p>
                </div>
                <br>
                <div class="container" style="margin-left:-0px">
                    <table class="table-sm mt-1 mb-5 small" style="width:100%; border-top:2px;">
                        <tr>
                            <td style="width:100px">নাম</td>
                            <td style="width:200px">{{ $members->m_name }}</td>
                            <td style="width:100px">পিতা/স্বামীর নাম</td>
                            <td style="width:200px">{{ $members->m_father }}</td>
                        </tr>
                        <tr>
                            <td style="width:100px">মাতার নাম</td>
                            <td style="width:200px">{{ $members->m_mother }}</td>
                            <td style="width:100px">বাবার নাম</td>
                            <td style="width:200px">{{ $members->m_father }}</td>
                        </tr>
                        <tr>
                            <td style="width:100px">মোবাইল নাম্বার </td>
                            <td style="width:200px">{{ $members->m_mobile }}, {{ $members->second_mobile }}</td>
                            <td style="width:100px">ঠিকানাঃ</td>
                            <td style="width:200px">{{ $members->Village->title ?? null }},
                                {{ $members->PostOffice->title ?? null }}, {{ $members->SubDistrict->title ?? null }},
                                {{ $members->district->title ?? null }}</td>
                        </tr>
                        <tr>
                            <td style="width:100px">জাতি</td>
                            <td style="width:200px">{{ $members->m_nation }}</td>
                            <td style="width:100px">বৈবাহিক অবস্থা</td>
                            <td style="width:200px">{{ $members->m_marital == 1? "Married":"Single" }}</td>
                        </tr>
                        <tr>
                            <td style="width:100px">পেশা</td>
                            <td style="width:200px">{{ $members->profession }}</td>
                            <td style="width:100px">ব্যবসা প্রতিষ্ঠানের নাম</td>
                            <td style="width:200px">{{ $members->business }}</td>
                        </tr>
                        <tr>
                            <td style="width:100px">জন্ম তারিখ </td>
                            <td style="width:200px">{{ $members->m_birthday }}</td>
                            <td style="width:100px">আইডি নং</td>
                            <td style="width:200px">{{ $members->m_nid }}</td>
                        </tr>
                    </table>
                    <table class="table-sm mt-1 mb-5 small" style="width: 100%; margin-top:0px;">
                        <tr>
                            <td style="width:100px">নমিনীর নাম </td>
                            <td style="width:200px">{{ $members->n_name }}</td>
                            <td style="width:100px">সম্পর্ক</td>
                            <td style="width:200px">{{ $members->relation->title ?? null }}</td>
                        </tr>
                        <tr>
                            <td style="width:100px">নমিনীর পিতার নাম</td>
                            <td style="width:200px">{{ $members->n_father }}</td>
                            <td style="width:100px">নমিনীর পিতার নাম</td>
                            <td style="width:200px">{{ $members->n_mother }}</td>
                        </tr>
                        <tr>
                            <td style="width:100px">নমিনীর মোবাইল নাম্বার</td>
                            <td style="width:200px">{{ $members->n_mobile }}</td>
                            <td style="width:100px">আইডি নং</td>
                            <td style="width:200px">{{ $members->n_nid }}</td>
                        </tr>
                    </table>
                    <br>
                    <table class="table-sm mt-1 mb-5 small" style="width: 100%; margin-top:0px;">
                        <tr>
                            <td rowspan="2"class="text-center">দৈনিক জমার পরিমাণ</td>
                            <td colspan="2" class="text-center">৩ বছর।</td>
                            <td colspan="2" class="text-center">৬ বছর।</td>
                            <td colspan="2" class="text-center">৯ বছর</td>
                            <td colspan="2" class="text-center">১২ বছর।</td>

                        </tr>
                        <tr>
                            <td class="text-center">মােট জমা </td>
                            <td class="text-center">মুনাফা সহ প্রদান </td>
                            <td class="text-center">মােট জমা </td>
                            <td class="text-center">মুনাফা সহ প্রদান </td>
                            <td class="text-center">মােট জমা </td>
                            <td class="text-center">মুনাফা সহ প্রদান </td>
                            <td class="text-center">মােট জমা </td>
                            <td class="text-center">মুনাফা সহ প্রদান </td>
                        </tr>
                        <tr>
                            <td class="text-center">২০(টাকা)</td>
                            <td class="text-center">২১,৬০০</td>
                            <td class="text-center">২৫,০২০</td>
                            <td class="text-center">৪৩,২০০</td>
                            <td class="text-center">৬১,৯৩০</td>
                            <td class="text-center">৬৪,৮০০</td>
                            <td class="text-center">১,১৮,১৯০</td>
                            <td class="text-center">৮৬,৪০০</td>
                            <td class="text-center">২,০১,০০০</td>
                        </tr>
                        <tr>
                            <td class="text-center">৫০(টাকা)</td>
                            <td class="text-center">৫৪,৪০০</td>
                            <td class="text-center">৬২,৫৫০</td>
                            <td class="text-center">১,০৮,০০০</td>
                            <td class="text-center">১,৫৪,৮২৫</td>
                            <td class="text-center">১,৬২,০০০</td>
                            <td class="text-center">২,৯৫,৪৭৫</td>
                            <td class="text-center">২,১৬,০০০</td>
                            <td class="text-center">৫,০২,৫০০</td>
                        </tr>
                        <tr>
                            <td class="text-center">১০০(টাকা)</td>
                            <td class="text-center">১,০৮,০০০</td>
                            <td class="text-center">১,২৫,১০০</td>
                            <td class="text-center">২,১৬,৩০০</td>
                            <td class="text-center">৩,০৯,৬৫০</td>
                            <td class="text-center">৩,২৪,০০০</td>
                            <td class="text-center">৫,৯০,৯৫০</td>
                            <td class="text-center">৪,৩২৩,০০০</td>
                            <td class="text-center">১০,০৫,০০০</td>
                        </tr>
                    </table>
                </div>
                <div class="row">

                </div>
            </div>
            <div class="row" style="background-color:";>

                <div class="col-md-12">
                    <h2 class="text-center" style="padding-top: 5px"><strong>বি: দ্র: ঈদ, পূজা উপলক্ষে বছরের ৫ দিনের আদায়
                            বন্ধ থাকিবে।</strong></h2>

                </div>
                <div>


                    <div style="width:200px; display: block; margin-left:450px;">
                        <h2 class="text-center" style="background-color:; ">শর্তাবলীঃ</h2>
                    </div>
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

        </div>

        <div class="row" style="background-color:">
            <div class="col-md-12">
                <h6 class="text-center font-weight-bold">আমি অবগত হয়ে সহি সম্পদন করিলাম। </h6>
            </div>
            <div class="col-md-12 grid-container">
                <div class="grid-item">
                    <hr class="border border-dark w-50 mt-0"> আবেদনকারীর স্বাক্ষর
                </div>
                <div class="grid-item"></div>
                <div class="grid-item">
                    <hr class="border border-dark w-50 mt-0">ফিল্ড অফিসারের স্বাক্ষর
                </div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item">
                    <hr class="border border-dark w-50 mt-0"> অফিস প্রধান স্বাক্ষর
                </div>
                <div class="grid-item">
                    <hr class="border border-dark w-50 mt-0">সাধারণ সম্পাদকের স্বাক্ষর
                </div>
                <div class="grid-item">
                    <hr class="border border-dark w-50 mt-0">পরিচালক সমন্বয়কারীর স্বাক্ষর
                </div>
            </div>
        </div>
    </div>


    <div id="options" class="text-center">
        <input class="btn btn-danger" id="printpagebutton" type="button" value="Print" onclick="window.print();" />
    </div>




@endsection --}}
