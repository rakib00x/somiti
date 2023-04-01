@extends('layouts.frontend.app')
@section('content')
    <div class="content-box">
        <link rel="stylesheet" href="./Dashboard _ ব্লু স্টার সঞ্চয় ও ঋণ দান সমবায় সমিতি_files/font-awesome.min(1).css">

        <div class="row container mx-auto" style="background-color: lightgrey; padding: 10px 0; border-radius: 15px 15px 0 0">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-3" style="width: 20%">
                        <img style="display: block; margin: auto;" alt="LOGO"
                            src="./Dashboard _ ব্লু স্টার সঞ্চয় ও ঋণ দান সমবায় সমিতি_files/SquareLogo.jpg" height="60">
                    </div>

                    <div class="col-sm-6 text-center" style="width: 60%">
                        <div style="font-weight: bolder; font-size: 24px; line-height: 24px">ব্লু স্টার সঞ্চয় ও
                            ঋণ দান সমবায় সমিতি</div>
                        <div>বেকারত্ব আর দারিদ্রের দুর্বিপাকে কর্মমুখী করবো মোরা জগৎটাকে</div>
                        <div style="font-size: 14px">House 3, Road 9/B, Sector 5, Uttara, Dhaka</div>
                        <div style="font-size: 12px">
                            <i class="fa fa-phone"></i> 01689655055 , 01670849008
                            <i class="fa fa-envelope"></i> softwarebazar17@gmail.com
                            <i class="fa fa-globe"></i> www.somitykeeper.com
                        </div>
                    </div>
                    <div class="col-sm-3 text-right" style="width: 10%">

                        <p style="position:relative;bottom:0;"></p>

                        <style type="text/css">
                            @media print {
                                #backbtn {
                                    display: none;

                                }
                            }

                        </style>


                        <input id="backbtn" type="button" value="Go Back" onclick="history.back(-1)">



                        <style type="text/css">
                            @media print {
                                #printbtn {
                                    display: none;
                                }
                            }

                        </style>

                        <input id="printbtn" type="button" value="Print" onclick="window.print();">


                    </div>

                </div>

            </div>
        </div>

        <!--Container-->
        <div class="container border border-info">
            <div class="row py-5 px-5" style="background-color: rgba(255, 255, 255, 0.712);">
                <div class="col-sm-12">
                    <p><strong>স্বারক নং- ব্লু স্টার সঞ্চয় ও ঋণ দান সমবায় সমিতি : ২৯০৬-২১০ ( ব্যক্তিগত ও গোপনীয় )</strong></p>
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td>নাম</td>
                            <td>:</td>
                            <td>{{$staffPage->name}}</td>
                        </tr>
                        <tr>
                            <td>পিতার নাম</td>
                            <td>:</td>
                            <td>{{$staffPage->father}}</td>
                        </tr>
                        <tr>
                            <td>মাতার নাম</td>
                            <td>:</td>
                            <td>{{$staffPage->mother}}</td>
                        </tr>
                    </table>
                    <br>
                    <h5><strong>বিষয়: নিয়োগ পত্র।</strong></h5>
                    <p class="text-justify"> ২৯ জুন ২০২১ইং তারিখে <b> “ব্লু স্টার সঞ্চয় ও ঋণ দান সমবায় সমিতি”</b>, House 3, Road 9/B, Sector 5, Uttara, Dhaka ,প্রধান কার্যলয়, নিয়োগ পরীক্ষার ফলাফল ও  ব্যবস্থাপনা কতৃপক্ষের সিদ্ধান্ত ক্রমে আপনাকে  ২৯ জুন ২০২১ইং তারিখে রোজ
                        মঙ্গলবার থেকে Field Officer পদে নিম্ন লিখিত শর্ত সাপেক্ষে নিয়োগ প্রদান করা হল।</p>
                    <h5 class="text-center"><u>আপনার বেতন কাঠামো নিম্নরূপ</u></h5>
                    <table class="table table-bordered table-hover text-center">
                        <tbody><tr class="table-primary">

                            <th scope="col">মূল বেতন</th>
                            <th scope="col">বাড়ি ভাড়া</th>
                            <th scope="col">চিকিৎসা ভাতা</th>
                            <th scope="col">যাতায়ত বাবদ</th>
                            <th scope="col">মোবাইল বিল</th>
                            {{-- <th scope="col">ইন্টারনেট বিল</th> --}}
                            <th scope="col">মোট বেতন</th>
                        </tr>
                        <tr class="table-primary">

                            <td>{{$staffPage->salary}}</td>
                            <td>{{$staffPage->house}}</td>
                            <td>{{$staffPage->medical}}</td>
                            <td>{{$staffPage->transport}}</td>
                            <td>{{$staffPage->mobile_bill}}</td>
                            {{-- <td>৪০০</td> --}}
                            <td>{{$staffPage->salary + $staffPage->house + $staffPage->medical + $staffPage->transport + $staffPage->mobile_bill}}</td>
                        </tr>
                    </tbody></table>
                    <p>১। 	আপনার শিক্ষানবিশ কাল হবে ৬ মাস । এই ভাতা যোগদানের পরবর্তি মাস হতে কার্যকর।</p>
                    <p>২। 	চাকুরীতে য্গোদানের সময় শিক্ষাগত যোগ্যতার সকল মূল সনদ এবং জামানত বাবদ ০/= (
                        শূন্য) প্রতিষ্ঠানে জমা দিতে হবে যা ফেরত যোগ্য। তবে কর্মস্থলে যোগদান না করলে জামানতের টাকা অফেরত যোগ্য বলে বিবেচিত হবে। </p>
                    <p>৩। 	আপনার কর্মস্থল হবে “ব্লু স্টার সঞ্চয় ও ঋণ দান সমবায় সমিতি”। আপনার কাজের জন্য সরাসরি শাখাব্যবস্থাপকের নিকট দায়বদ্ধ থাকবেন।</p>
                    <p>৪। 	আপনার কর্মতালিকা নিয়োগপত্রের সাথে সংযুক্ত করা হল। সেচ্ছায় চাকুরী হতে অব্যহতি নিলে ৩ মাস পূর্বে মৌখিক ভাবে ও ১ মাস পূর্বে লিখিত ভাবে কতৃপক্ষকে অবহতি করতে হবে। অন্যথায় ১ মাসের সমপরিমান বেতন সংস্থায় জমা দিতে হবে। এছাড়াও ১ মাস পূর্বে চিঠি দিয়ে নিয়োগকারী কর্তৃপক্ষ আপনাকে চাকুরী হতে অব্যহতি দেওয়ার ক্ষমতা রাখে।</p>
                    <p>৫। 	বিনা অনুমতিতে কর্মে ও কর্মস্থলে অনুপস্তিত থাকলে আপনার ঐদিনে বেতন কর্তন করা হবে এবং এরূপ অনুপস্থিত থাকার জন্য আপনার বিরুদ্ধে প্রতিষ্ঠান এর বিধিমালা অনুসারে যথাযথ ব্যবস্থা গ্রহন করা হবে।</p>
                    <p>৬।	অত্র প্রতিষ্ঠান এর বিধিমালা অনুযায়ী সঠিক ভাবে ও নিষ্ঠার সহিত কার্যক্রম দায়িত্বের সাথে পরিচালনা করতে হবে। অন্যথায় যে কোন মূহুর্তে  আপনাকে চাকুরী হতে অব্যহতি দেওয়ার ক্ষমতা রাখে।</p>
                    <p>৭। 	সফলতার সহিত শিক্ষানবিশ কাল সম্পন্ন করলে চাকুরী স্থায়ী করনের সম্মতি পাবেন।</p>
                    <p>৮। 	প্রয়োজনে উর্দ্ধতন কর্তৃপক্ষের নির্দেশ অনুযায়ী আপনার কাজের সাথে সংযোজন অথবা বিয়োজন করে যে কোন কাজ করতে বাধ্য থাকবেন।</p>
                    <p>৯। <strong>	“ব্লু স্টার সঞ্চয় ও ঋণ দান সমবায় সমিতি” </strong>-এর যাবতীয় লক্ষ্য মাত্রা ১০০% পূরণ করতে হবে। সঠিক লক্ষ্যমাত্রা পূরনে সময়মত বেতন প্রদান করা হইবে। অন্যথায় সঠিক লক্ষমাত্রা পূরনে ব্যর্থ হলে প্রয়োজনে বেতন ভাতা বিলম্ব হইতে পারে। </p><br>
                    <p>শিক্ষানবিশ কাল উত্তীর্ন হওয়ার পর উপরিউক্ত শর্ত সমূহ পূরন করতে না পারলে প্রতিষ্ঠানের চাকুরীর বিধিমালা অনুযায়ী কোন কারণ দর্শানো ব্যতিরেকে চাকুরীচ্যুত করা হবে।</p><br>
                    <p>আপনাকে  ২৯ জুন ২০২১ইং তারিখে রোজ মঙ্গলবার সকাল ১০ ঘটিকায় <strong>“ব্লু স্টার সঞ্চয় ও ঋণ দান সমবায় সমিতি”</strong>-এর প্রধান কার্যালয় উপস্থিত হয়ে শাখা ব্যবস্থাপক এর নিকট যোগদানপত্র দাখিল করার জন্য বলা হল।</p><br><br>
                    <div class="row justify-content-start">
                        <div class="col-sm-6 pl-5">
                            <h5>কর্মীর দস্তখত:</h5>
                            <span>নাম:</span><br>
                            <span>তারিখ:</span><br>
                            <span>অনুলিপি:</span><br>
                        </div>
                        <div class="col-sm-6 text-right pr-5">
                            <h5 class="">কর্মকর্তার দস্তখত</h5>
                            <span>প্রধান নির্বাহী কর্মকর্তা,</span><br>
                            <span>ব্লু স্টার সঞ্চয় ও ঋণ দান সমবায় সমিতি</span><br>
                            <span>অফিস নথি</span><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Container End-->
        <p style="page-break-after: always;">&nbsp;</p>
        <p style="page-break-before: always;">&nbsp;</p>
        <!-- Second Container Start-->
        <div class="container border border-info">
            <div class="row py-5 mb-5 mb-5" style="background-color: rgba(255, 255, 255, 0.712);">
                <div class="col-sm-12 px-5">
                    <br><br><br><br>
                    <h2 class="text-center pb-5"><u> অভিভাবকের সম্মতিপত্র</u></h2>
                    <p class="text-justify" style="line-height: 2;"> <span class="pl-5"></span> এই মর্মে প্রত্যয়ন করা যাইতেছে যে, <b>
                            {{$staffPage->name}}, বাবার নাম - {{$staffPage->father}} , মায়ের নাম - {{$staffPage->mother}} , এবং ঠিকানা  - {{$staffPage->address}},</b>, সে আমার সন্তান / পোষ্য।  তাহাকে <b> “ব্লু স্টার সঞ্চয় ও ঋণ দান সমবায় সমিতি”-এ “ {{$staffPage->user_role}} ”</b> পদে নিয়োগের জন্য স্ব-জ্ঞানে সম্মতি প্রদান করিলাম। তাহার এই নিয়োগের ব্যাপারে আমার বা আমার পরিবারের কাহারো কোন আপত্তি নাই। প্রকাশ থাকে যে, সে যদি উক্ত প্রতিষ্ঠানে কর্মরতাবস্থায় কোন প্রকার অনিয়ম / দুর্নীতি করে তাহলে আমি এবং আমার পরিবার তাহার সকল দায়ভার বহন করিবো। তাহাতে কাহারো কোন আপত্তি থাকিবে না।</p> <br> <br>
                    <p class="pl-5"> আমি তাহার সর্বাঙ্গীন উন্নতি ও সাফল্য কামনা করি।</p>
                    <div class="row mt-5 pt-5 px-5 mb-5">
                        <div class="col-sm-6"><h4> তারিখ: {{$staffPage->created_at->todatestring()}}</h4></div>
                        {{-- | {{date('d-m-Y',strtotime($staffPage->created_at))}} --}}
                        <div class="col-sm-6 text-right"><h4> <b> অভিভাবকের সাক্ষর</b></h4></div>
                    </div>

                </div>
            </div>
        </div>
@endsection
