<style>
    .bg_color{
        background-color: #13418d !important;
    }
</style>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" href="{{ route('general-ac.index') }}" style="background: white;">
            <div class="label card-header bg_color rounded-0 text-white">General Accounts</div>
            <div class="value text-center Amount countUp">{{ $report['general_savings'] }}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">বর্তমান সঞ্চয় স্থিতি - current savings status </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" href="{{ route('savings.index') }}" style="background:  ">
            <div class="label card-header bg_color rounded-0 text-white">DPS</div>
            <div class="value text-center Amount countUp">{{ $report['monthly_savings'] }}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">বর্তমান মাসিক সঞ্চয় স্থিতি - Current DPS status  </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Investment</div>
            <div class="value text-center Amount countUp">{{ $report['investment'] }}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">বর্তমান বিনিয়োগ স্থিতি - The current investment status</marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Return on investment</div>
            <div class="value text-center Amount countUp">{{ $report['investment_return'] }}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">বিনিয়োগের লভ্যাংশ - The return on investment profit</marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">FDR deposited</div>
            <div class="value text-center Amount countUp">{{ $report['fdr_deposit'] }}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">ফিক্সড ডিপোজিট স্থিতি - Fixed deposit status</marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Distributed FDR profit</div>
            <div class="value text-center Amount countUp">{{$report['fdr_profit_served']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">ফিক্সড ডিপোজিটের প্রোফিট বিতরণ স্থিতি - Profit distribution status of fixed deposit</marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Distributed DPS</div>
            <div class="value text-center Amount countUp">{{$report['total_monthly_savings_ac']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">মাসিক সঞ্চয়ের প্রোফিট বিতরণ স্থিতি - DPS profit distribution status</marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="{{ route('members.index') }}">
            <div class="label card-header bg_color rounded-0 text-white">Total members</div>
            <div class="value text-center Amount countUp">{{$report['total_member']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">ভর্তিকৃত মোট সদস্য - Total members admitted</marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="{{ route('area-list.index') }}">
            <div class="label card-header bg_color rounded-0 text-white">Total area</div>
            <div class="value text-center Amount countUp">{{$report['total_area']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">মোট এরিয়া/কেন্দ্র/গ্রুপ - The total area / center / group
                </marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="{{ route('staff.index') }}">
            <div class="label card-header bg_color rounded-0 text-white">Total Staff</div>
            <div class="value text-center Amount countUp">{{$report['total_staff']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">কর্মরত মোট স্ট্যাফ - Total staff working
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Staff Fund</div>
            <div class="value text-center Amount countUp">{{ $report['total_staff_fund'] }}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left"> স্ট্যাফ তহবিল - Total staff Fund
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="{{ route('branch-list.index') }}">
            <div class="label card-header bg_color rounded-0 text-white">Total Branch</div>
            <div class="value text-center Amount countUp">{{$report['total_branch']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">মোট ব্রাঞ্চ - Total branch
                </marquee>
            </div>
        </a>
    </div>



    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Total Voucher</div>
            <div class="value text-center Amount countUp">0</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left"> আপনার প্রতিষ্ঠানে মোট ভাউচার  ক্যাটাগরি - Total voucher category in your organization
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Sell Of Shaire</div>
            <div class="value text-center Amount countUp">0</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left"> আপনার প্রতিষ্ঠানে বিক্রিত মোট শেয়ার - Total shares sold in your organization
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="{{ route('voucher.income.index') }}">
            <div class="label card-header bg_color rounded-0 text-white">Voucher Income</div>
            <div class="value text-center Amount countUp">{{ $report['total_voucher_income'] }}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">আপনার প্রতিষ্ঠানে আয়ের ভাউচার স্থিতি - Income voucher status in your organization
                </marquee>
            </div>
        </a>
    </div>



    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Voucher Expenses</div>
            <div class="value text-center Amount countUp">{{ $report['total_voucher_expense'] }}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">আপনার প্রতিষ্ঠানে ব্যয়ের ভাউচার স্থিতি - Expense voucher status at your organization
                </marquee>
            </div>
        </a>
    </div>




    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">SHARE PRICE</div>
            <div class="value text-center Amount countUp">0</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">আপনার প্রতিষ্ঠানে মোট শেয়ার স্থিতি - Total share status in your organization
                </marquee>
            </div>
        </a>
    </div>









    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Savings Account</div>
            <div class="value text-center Amount countUp">{{$report['total_savings_ac']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">বর্তমান সঞ্চয়ী একাউন্ট/হিসাব - Current savings account
                </marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">DPS AC</div>
            <div class="value text-center Amount countUp">{{$report['total_monthly_savings_ac']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">বর্তমান মাসিক সঞ্চয়ী একাউন্ট/ হিসাব - Current DPS account
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">LOAN AC</div>
            <div class="value text-center Amount countUp">0</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left"> আপনার প্রতিষ্ঠানের মোট আউটলোন একাউন্ট - Your Total Out Loan Accounts
                </marquee>
            </div>
        </a>
    </div>



    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">CC AC</div>
            <div class="value text-center Amount countUp">0</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">আপনার প্রতিষ্ঠানে বর্তমান সিসি একাউন্ট/ হিসাব - Current CC account in your organization
                </marquee>
            </div>
        </a>
    </div>



    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Total Director</div>
            <div class="value text-center Amount countUp">{{$report['total_director']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">মোট ডিরেক্টর/ পরিচালকের সংখ্যা - Total number of directors
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Director Due</div>
            <div class="value text-center Amount countUp">0</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">আপনার প্রতিষ্ঠানে পরিচালকের জমার স্থিতি - Director's deposit status in your organization
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Male member</div>
            <div class="value text-center Amount countUp">{{$report['total_male_member']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">ভর্তিকৃত মোট পুরুষ সদস্য - Total male members admitted
                </marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Female member</div>
            <div class="value text-center Amount countUp">{{$report['total_female_member']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">ভর্তিকৃত মোট মহিলা সদস্য - Total female members admitted
                </marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Inactive member</div>
            <div class="value text-center Amount countUp">{{$report['total_inactive_member']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">নিষ্ক্রীয় সদস্য - Current Inactive members
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Counting Assets</div>
            <div class="value text-center Amount countUp">0</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left"> আপনার প্রতিষ্ঠানের মোট সম্পদের গণনা - Calculate the total assets of your organization
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">The Value Of the property</div>
            <div class="value text-center Amount countUp">0</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">আপনার প্রতিষ্ঠানের মোট সম্পদের পরিমাণ - The total assets of your organization
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Transaction CALCULATION</div>
            <div class="value text-center Amount countUp">0</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">আপনার প্রতিষ্ঠানের টোটাল লেনদেনের কাউন্ট/গণনা/ পরিমাণ - Count / calculation / amount of total transactions of your organization
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">out loan balance</div>
            <div class="value text-center Amount countUp">0</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">আপনার প্রতিষ্ঠানের মোট আউটলোন টাকার পরিমান - Your Total Out Loan Amount
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Security Money</div>
            <div class="value text-center Amount countUp">0</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">আপনার প্রতিষ্ঠানের স্টাফদের সিকিউরিটি ডিপোজিটের মোট টাকার পরিমান - Your Total Staff Security Deposit Amount
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Total Outloan</div>
            <div class="value text-center Amount countUp">{{$report['total_outloan_account']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left"> মোট আউটলোন একাউন্ট - Your Total Out Loan Accounts</marquee>
            </div>
        </a>
    </div>


    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg_color rounded-0 text-white">Total Loan Opening Fee</div>
            <div class="value text-center Amount countUp">{{$report['total_loan_opening_fee']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left"> মোট লোন খোলার ফী -  Total Loan Opening Fee</marquee>
            </div>
        </a>
    </div>
