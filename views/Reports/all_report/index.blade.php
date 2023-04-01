@extends('layouts.frontend.app', ['pageTitle' => 'All Reports'])
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <main class="container mt-2">
                    <section>
                        <div class="row">
                            <div class="col">

                                <!-- table start -->
                                <table class="table table-hover table-bordered w-100">
                                    <!-- table header -->
                                    <thead class="bg-blue">
                                        <tr>
                                            <th class="text-center">SL</th>
                                            <th class="text-center">Report Title in English</th>
                                            <th class="text-center">Report Title in Bangla</th>
                                            <th class="text-center">Report</th>

                                        </tr>
                                    </thead>
                                    <!-- table body -->
                                    <tbody>
                                        <tr class="table_raw_style">
                                            <td class="text-center">1</td>
                                            <td>Admission Register</td>
                                            <td>ভর্তি সংক্রান্ত রেজিস্টার</td>
                                            <td class="text-center"><a type="button"
                                                    href="{{ route('report.admission-register.search') }}" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">2</td>
                                            <td>Member Balance</td>
                                            <td>সদস্যের ব্যালেন্স সংক্রান্ত</td>
                                            <td class="text-center"><a type="button"
                                                    href="{{ route('report.member-balance.search') }}" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">3</td>
                                            <td>User Collection (U.C)</td>
                                            <td>ইউজার কালেকশন সংক্রান্ত</td>
                                            <td class="text-center"><a type="button"
                                                    href="{{ route('reports.user-collection.search') }}" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">4</td>
                                            <td>User Collection Summary - (U.C.S)</td>
                                            <td>ইউজার কালেকশন সামারি</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">5</td>
                                            <td>Date Wise User Collection Summary - (D.W.U.C.S)</td>
                                            <td>তারিখ ভিত্তিক ইউজার কালেকশন সামারি</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">6</td>
                                            <td>General Ledger - (G.L)</td>
                                            <td>জেনারেল লেজার</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">7</td>
                                            <td>Debit Credit - (D.R)</td>
                                            <td>ডেবিট-ক্রেডিট রিপোর্ট</td>
                                            <td class="text-center"><a type="button"
                                                    href="{{ route('report.debit-credit.search') }}" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">8</td>
                                            <td>Performance Report - (P.R)</td>
                                            <td>পারফর্মেন্স রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">9</td>
                                            <td>Account Statement - (AC.S)</td>
                                            <td>একাউন্ট স্টেটমেন্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">10</td>
                                            <td>Bank Statement - (B.S)</td>
                                            <td>ব্যাংক স্টেটমেন্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">11</td>
                                            <td>Receive & Payment Report - (R,P)</td>
                                            <td>জমা / ফেরত রিপোর্ট</td>
                                            <td class="text-center"><a type="button"
                                                    href="{{ route('reports.receive-payment.search') }}" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">12</td>
                                            <td>Cash Position - (C.P)</td>
                                            <td>ক্যাশ পজিশন রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">13</td>
                                            <td>Profit & Loss Report - (P.L)</td>
                                            <td>লাভ-ক্ষতি রিপোর্ট সংক্রান্ত</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">14</td>
                                            <td>Loan Opening Closing - (L.O.C)</td>
                                            <td>লোন বিতারণ/বন্ধ সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">15</td>
                                            <td>Withdraw Request Report - (W.R.R)</td>
                                            <td>উত্তোলন আবেদন সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">16</td>
                                            <td>Salary Distribution - (S.D) Old System</td>
                                            <td>বেতন সংক্রান্ত রিপোর্ট (পুরাতন)</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">17</td>
                                            <td>Instalment Target Report - (I.T.R)</td>
                                            <td>ঋণের টার্গেট রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">18</td>
                                            <td>Voucher Report - (V.R)</td>
                                            <td>ভাউচার সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">19</td>
                                            <td>Fixed Asset Report - (F.A.R)</td>
                                            <td>স্থায়ী সম্পদ সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">20</td>
                                            <td>Fixed Asset Adjusts Report - (F.A.A.R)</td>
                                            <td>স্থায়ী সম্পদ সমন্নয় রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">21</td>
                                            <td>Director Report - (D.R)</td>
                                            <td>পরিচালক সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">22</td>
                                            <td>Director Transaction Report - (D.T.R)</td>
                                            <td>পরিচালক লেনদেন সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">23</td>
                                            <td>Asset Value Report - (A.V.R)</td>
                                            <td>সম্পদ এর মূল্যমান সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">24</td>
                                            <td>Monthly Savings Report - (M.S.R)</td>
                                            <td>মাসিক সঞ্চয় সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">25</td>
                                            <td>Fixed Deposit Report - (F.D.R)</td>
                                            <td>স্থায়ী আমানত সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">26</td>
                                            <td>Cash In Report - (C.I.R)</td>
                                            <td>ক্যাশ ইন সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">27</td>
                                            <td>Cash Out Report - (C.O.R)</td>
                                            <td>ক্যাশ আউট সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">28</td>
                                            <td>Month Wise Monthly Savings Collection - (M.W.M.S.C)</td>
                                            <td>মাস ভিত্তিক মাসিক সঞ্চয় জমা রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">29</td>
                                            <td>Monthly Savings Withdrawal Report - (M.S.C.W)</td>
                                            <td>মাস ভিত্তিক মাসিক সঞ্চয় উত্তোলন রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">30</td>
                                            <td>Monthly Top Sheet - (M.T.S)</td>
                                            <td>মাসিক টপ সিট স্ংক্রান্ত</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">31</td>
                                            <td>Area Wise Member Report - (A.W.M.R)</td>
                                            <td>এরিয়া ভিত্তিক সদস্য রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">32</td>
                                            <td>Monthly Balance Report - (M.B.R)</td>
                                            <td>মাসিক ব্যালেন্স সংক্রান্ত রিপোর্ট - অডিটের জন্য</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">33</td>
                                            <td>Member Wise Collection Summary Report - (M.W.C.S.R)</td>
                                            <td>সদস্য ভিত্তিক কালেকশন সামারি রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">34</td>
                                            <td>Collection Sheet - (C.S)</td>
                                            <td>কালেকশন শীট সংক্রান্ত</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">35</td>
                                            <td>Daily Closing Report - (D.C.R)</td>
                                            <td>দৈনিক ক্লোজিং সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">36</td>
                                            <td>Daily Summary Report - (D.S.C)</td>
                                            <td>দৈনিক সামারি সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">37</td>
                                            <td>Member Sheet - (M.S)</td>
                                            <td>সদস্য শীট সংক্রান্ত</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">38</td>
                                            <td>Daily Collection Sheet Print - (D.C.S.P)</td>
                                            <td>দৈনিক কালেকশন শীট প্রিন্ট করুন</td>
                                            <td class="text-center"><a type="button" href="{{ route('report.index') }}"
                                                    target="_blank" class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">39</td>
                                            <td>Staff Reports - (S.R)</td>
                                            <td>স্টাফ রিপোর্ট সংক্রান্ত</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">40</td>
                                            <td>Yearly Profit Distribution Report - (Y.P.D.R)</td>
                                            <td>বাৎসরিক প্রোফিট বিতরণ সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">41</td>
                                            <td>CC Accounts Report - (CC.A.R)</td>
                                            <td>সিসি একাউন্ট সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">42</td>
                                            <td>Staff Collection Report - (S.C.R)</td>
                                            <td>স্টাফ কালেকশন সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">43</td>
                                            <td>Date Wise Profit Summary - (D.W.P.S)</td>
                                            <td>তারিখ ভিত্তিক প্রোফিট সামারি</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">44</td>
                                            <td>Cash Closing - (C.C)</td>
                                            <td>ক্যাশ ক্লোজিং সংক্রান্ত</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">45</td>
                                            <td>Cash Transfer List - (C.T.L)</td>
                                            <td>ক্যাশ ট্রান্সফার লিস্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">46</td>
                                            <td>Area wise Loan Summary (A.W.L.S)</td>
                                            <td>এরিয়া ভিত্তিক ঋণ তথ্য (সর্বশেষ বিবরণী)</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">47</td>
                                            <td>Month Wise General Savings Deposit</td>
                                            <td>মাসিক ভিত্তিক সাধারন সঞ্চয় জমা রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">48</td>
                                            <td>Month Wise General Savings Withdraw</td>
                                            <td>মাসিক ভিত্তিক সাধারন সঞ্চয় উত্তোলন রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">49</td>
                                            <td>Day Wise Monthly Installment Collection Report (DW-MIC)</td>
                                            <td>দিন ভিত্তিক মাসিক কিস্তি আদায় রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">50</td>
                                            <td>Day Wise Monthly Savings Collection Report (DW-MSC)</td>
                                            <td>দিন ভিত্তিক মাসিক সঞ্চয় আদায়/উত্তলন রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">51</td>
                                            <td>Day Wise General Collection/Withdraw Report (DW-Saving)</td>
                                            <td>দিন ভিত্তিক সাধারন সঞ্চয় আদায়/উত্তলন রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">52</td>
                                            <td>Day Wise Share Collection/Withdraw Summary (DW-SCS)</td>
                                            <td>দিন ভিত্তিক শেয়ার আদায়/উত্তলন রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">53</td>
                                            <td>7/15 days Loan Collection Sheet</td>
                                            <td>৭/১৫ দিন ভিত্তিক ঋণ কালেকশন শিট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">54</td>
                                            <td>7/15 Days Monthly Savings Collection Sheet</td>
                                            <td>৭/১৫ দিন ভিত্তিক মাসিক সঞ্চয় কালেকশন শিট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">55</td>
                                            <td>7/15 Days General Savings Collection Sheet</td>
                                            <td>৭/১৫ দিন ভিত্তিক সাধারন সঞ্চয় কালেকশন শিট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">56</td>
                                            <td>Balance Sheet (Primary)</td>
                                            <td>ব্যালেন্স শিট (প্রাথমিক)</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">57</td>
                                            <td>Single Day Collection Sheet - (S.D.C.S)</td>
                                            <td>একদিনের কালেকশন শীট প্রিন্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">58</td>
                                            <td>Print Staff List</td>
                                            <td>স্টাফ তালিকা প্রিন্ট করুন</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">59</td>
                                            <td>Salary Distribution Report</td>
                                            <td>বেতন সংক্রান্ত রিপোর্ট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">60</td>
                                            <td>Partially Collection Sheet</td>
                                            <td>১৫ দিনের কালেকশন শীট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                        <tr class="table_raw_style">
                                            <td class="text-center">61</td>
                                            <td>Weekly Collection Sheet</td>
                                            <td>৭ দিনের কালেকশন শীট</td>
                                            <td class="text-center"><a type="button" href="" target="_blank"
                                                    class="btn btn-primary display-block">Report</a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
    <div class="display-type"></div>
@endsection
