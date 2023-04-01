<ul class="main-menu">

    <li class=" has-sub-menu"><a href="#">
            <div class="icon-w">
                <div class="os-icon os-icon-plus-circle"></div>
            </div>
            <span>{{ __('New') }}</span>
        </a>
        <div class="sub-menu-w">
            <div class="sub-menu-i">
                <ul class="sub-menu">
                    <li><a href="{{ route('members.create') }}">{{ __('Add New Member') }}</a></li>
                    <li><a href="{{ route('general.search') }}">{{ __('New General Account') }}</a></li>
                    <li><a href="{{ route('current.search') }}">{{ __('New Current Account') }}</a></li>
                    <li><a href="{{ route('savings.create') }}">{{ __('New DPS Account') }}</a></li>
                    @role('admin')
                        <li><a href="{{ route('fixed-deposit.create') }}">{{ __('New Fixed Deposit Ac') }}</a></li>
                    @endrole
                    <li><a href="{{ route('loan.search') }}">{{ __('New Loan') }}</a></li>
                </ul>
            </div>
        </div>
    </li>

    <li class=" has-sub-menu">
        <a href="#">
            <div class="icon-w">
                <div class="os-icon os-icon-layers"></div>
            </div>
            <span>{{ __('Primary') }}</span>
        </a>
        <div class="sub-menu-w">
            <div class="sub-menu-i">
                <ul class="sub-menu">
                    <li><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>

                    @role('admin|manager')
                        <li><a href="{{ route('statistic') }}">{{ __('Statistics View') }}</a></li>
                        <li><a href="{{ route('staff.index') }}">{{ __('Staff List') }}</a></li>
                        <li><a href="{{ route('staff-fund-transaction.index') }}"> {{ __('Staff Fund Transactions') }}</a>
                        </li>
                        <li><a href="{{ route('banklist.index') }}">{{ __('Bank List') }}</a></li>

                        <li><a href="{{ route('director-list.index') }}">{{ __('Director List') }}</a></li>

                        {{-- <li><a href="{{ route('monthly-saving.index') }}">{{ __('Monthly Saving Scheme') }}</a></li> --}}

                        <li><a href="{{ route('outloan.index') }}">{{ __('Out Loan') }}</a></li>

                        @role('admin|manager|accountant')
                            <li><a href="{{ route('voucher.category.index') }}">{{ __('Voucher Category') }}</a></li>
                        @endrole

                        <li><a href="{{ route('loancategory.index') }}">{{ __('Loan category') }}</a></li>
                        <li><a href="{{ route('ccloancategory.index') }}">{{ __('CC Loan category') }}</a></li>

                        <li><a href="{{ route('savings.scheme.index') }}">{{ __('DPS Scheme') }}</a></li>

                        <li><a href="{{ route('fixed-diposit-scheme.index') }}">{{ __('Fixed Deposit Scheme') }}</a></li>

                        <li><a href="{{ route('asset.index') }}">{{ __('Asset') }}</a></li>
                    @endrole

                </ul>
            </div>
        </div>
    </li>

    <li class=" has-sub-menu">
        <a href="#">
            <div class="icon-w">
                <div class="os-icon os-icon-package"></div>
            </div>
            <span>{{ __('Accounts') }}</span>
        </a>
        <div class="sub-menu-w">
            <div class="sub-menu-i">
                <ul class="sub-menu">

                    <li><a href="{{ route('members.index') }}">{{ __('Members') }}</a></li>

                    <li><a href="{{ route('general-ac.index') }}">{{ __('All General A/c') }}</a></li>

                    <li><a href="{{ route('savings.index') }}">{{ __('All DPS A/c') }}</a></li>


                    <li><a href="{{ route('loan.index') }}">{{ __('All Loan A/c') }}</a></li>
                    <li><a href="{{ route('current-account.index') }}">{{ __('All Current A/c') }}</a></li>

                    @role('admin')
                    <li><a href="{{ route('fixed-deposit.index') }}">{{ __('All Fixed Deposit A/c') }}</a></li>
                    <li><a href="{{ route('share-account.index') }}">{{ __('All Share A/c') }}</a></li>
                    <li><a href="{{ route('cc_loan.search') }}">{{ __('Create New CC Acount') }}</a></li>
                    <li><a href="{{ route('cc_loan.index') }}">{{ __('All CC AC') }}</a></li>
                    <li><a href="{{ route('passbook-management.index') }}">{{ __('Passbook Management') }}</a></li>
                    <li><a href="{{ route('closing.index') }}">{{ __('DPS/FDR/Loan Closing') }}</a></li>
                    <li><a href="{{ route('loan-application.index') }}">{{ __('Loan Application list') }}</a></li>
                    @endrole
                </ul>
            </div>
        </div>
    </li>

    <li class=" has-sub-menu">
        <a href="#">
            <div class="icon-w">
                <div class="os-icon os-icon-file-text"></div>
            </div>
            <span>{{ __('Credits') }}</span>
        </a>
        <div class="sub-menu-w">
            <div class="sub-menu-i">
                <ul class="sub-menu">
                    <li><a href="{{ route('credits.common.search') }}">{{ __('Common Collection') }}</a></li>
                    <li><a href="{{ route('general-ac.search-deposit') }}">{{ __('Deposit to General AC') }}</a></li>
                    <li><a href="{{ route('loan.collect.index') }}">{{ __('Installment Collection') }}</a></li>
                    <li><a href="{{ route('savings.deposit.search') }}">{{ __('Deposit to DPS') }}</a></li>
                    <li><a href="{{ route('current-account.create') }}">{{ __('Deposit to Current Account') }}</a>
                    </li>
                    <li><a href="{{ route('today-collection.index') }}">{{ __('Today Collection') }}</a></li>
                    @role('admin')
                        <li><a href="{{ route('bank.withdraw') }}">{{ __('Bank Withdraw') }}</a></li>
                        <li><a href="{{ route('ccinst.collection.search') }}">{{ __('CC Inst. Collection') }}</a></li>
                        <li><a href="{{ route('cc_closing.search') }}">{{ __('CC Closing') }}</a></li>
                    @endrole
                </ul>
            </div>
        </div>
    </li>

    <li class=" has-sub-menu">
        <a href="#">
            <div class="icon-w">
                <div class="os-icon os-icon-life-buoy"></div>
            </div>
            <span>{{ __('Debits') }}</span>
        </a>
        <div class="sub-menu-w">
            <div class="sub-menu-i">
                <ul class="sub-menu">
                    @role('admin')
                    <li><a href="{{ route('general-ac.search-withdraw') }}">{{ __('General Savings Withdraw') }}</a>
                    </li>
                    <li><a href="{{ route('savings.withdraw.search') }}">{{ __('DPS Withdraw') }}</a></li>
                    
                        <li><a href="{{ route('fdr-withdraw.create') }}">{{ __('Fixed Deposit Profit Withdraw') }}</a>
                        </li>
                        
                        <li><a href="{{ route('bank.deposit') }}">{{ __('Bank Deposit') }}</a></li>
                        <li><a href="{{ route('fdr-balance-transaction.search') }}">{{ __('FDR Balance Deposite Withdraw') }}</a>
                        </li>

                    @endrole
                    <li><a href="{{ route('loan.withdraw.index') }}">{{ __('Withdraw Application') }}</a></li>


                </ul>
            </div>
        </div>
    </li>

    @role('admin|manager|accountant')
        <li class="has-sub-menu">
            <a href="#">
                <div class="icon-w">
                    <div class="os-icon os-icon-minus-square"></div>
                </div>
                <span>{{ __('Voucher') }}</span>
            </a>
            <div class="sub-menu-w">
                <div class="sub-menu-i">
                    <ul class="sub-menu">
                        <li><a href="{{ route('voucher.expense.index') }}">{{ __('General Expenditure') }}</a></li>
                        <li><a href="{{ route('voucher.income.index') }}">{{ __('General Income') }}</a></li>
                        <li><a href="{{ route('voucher.member-income.index') }}">{{ __('Member Income') }}</a></li>
                        <li><a href="">{{ __('Auto Profit Distribution') }}</a></li>
                        <li><a href="{{ route('auto.profit') }}">{{ __('Auto Profit Generation Monthly') }}</a></li>
                        <li><a href="{{ route('voucher.salary.distribution') }}">{{ __('Salary Distribution') }}</a>

                        <li><a href="{{ route('getoutloan.create') }}">{{ __('Get Out Loan') }}</a>
                        <li><a href="{{ route('returnoutloan.create') }}">{{ __('Return Out Loan') }}</a>


                        </li>
                        <li><a
                                href="{{ route('auto-profitditribution-history') }}">{{ __('Profit Distribution History') }}</a>
                        </li>
                        <li><a href="{{ route('staff-fund.deposit') }}">{{ __('Staff Fund Deposit') }}</a>
                        </li>
                        <li><a href="{{ route('staff-fund.withdraw') }}">{{ __('Staff Fund Withdraw') }}</a>
                        </li>
                        <li><a href="#">{{ __('For Approval') }}</a></li>
                        <li><a href="#">{{ __('Cash Transfer') }}</a></li>
                        <li><a href="{{ route('voucher.cash_closing') }}">{{ __('Cash Closing') }}</a></li>
                        <li><a href="#">{{ __('Give Special Loan') }}</a></li>
                    </ul>
                </div>
            </div>
        </li>
    @endrole





    @role('admin|manager|accountant')
        <li class="has-sub-menu">
            <a href="#">
                <div class="icon-w">
                    <div class="os-icon os-icon-minus-square"></div>
                </div>
                <span>{{ __('SMS') }}</span>
            </a>
            <div class="sub-menu-w">
                <div class="sub-menu-i">
                    <ul class="sub-menu">
                        <li><a href="{{ route('sms.singlesms') }}">{{ __('Send Single SMS') }}</a></li>
                        <li><a href="{{ route('sms.monthlysms') }}">{{ __('Send Month Ending SMS') }}</a></li>
                        <li><a href="{{ route('sms.smsreport') }}">{{ __('SMS Report') }}</a></li>
                    </ul>
                </div>
            </div>
        </li>
    @endrole




    {{-- Reports --}}
    <li>
        <a href="{{ route('all.index') }}">
            <div class="icon-w">
                <div class="os-icon os-icon-documents-03"></div>
            </div>
            <span>{{ __('Reports') }}</span>
        </a>
    </li>


    <li class="has-sub-menu">
        <a href="#">
            <div class="icon-w">
                <div class="os-icon os-icon-users"></div>
            </div>
            <span>{{ __('Profile') }}</span>
        </a>
        <div class="sub-menu-w">
            <div class="sub-menu-i d-flex">
                <ul class="sub-menu">
                    <li><a href="{{ route('user.change-password') }}">{{ __('Change Password') }}</a></li>
                    @role('admin')
                        <li><a href="{{ route('user.index') }}">{{ __('All User Account') }}</a></li>
                    @endrole

                    @role('field-officer')
                        <li><a
                                href="{{ route('staff-fund-transaction.show', Auth::user()->staff->id) }}">{{ __('My Fund') }}</a>
                        </li>
                    @endrole

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </ul>
            </div>
        </div>
    </li>

    <li class="has-sub-menu" style="margin-top:-3px;">
        <a href="#">
            <div class="icon-w">
                <i class="fa fa-cog"></i>
            </div>
            <span>{{ __('Setting') }}</span>
        </a>
        <div class="sub-menu-w">
            <div class="sub-menu-i d-flex">
                <ul class="sub-menu">
                    @role('admin')
                        <li><a href="{{ route('branch-list.index') }}">{{ __('Branch List') }}</a></li>
                        <li><a href="{{ route('area-list.index') }}">{{ __('Area List') }}</a></li>
                    @endrole
                    <li><a href="{{ route('division-list.index') }}">{{ __('Division List') }}</a></li>
                    <li><a href="{{ route('district.index') }}">{{ __('District List') }}</a></li>
                    <li><a href="{{ route('subdistrict.index') }}">{{ __('Sub District List') }}</a></li>
                    <li><a href="{{ route('postoffice.index') }}">{{ __('Post Office List') }}</a></li>
                    {{-- <li><a href="{{ route('village.index') }}">{{ __('Village List') }}</a></li> --}}
                    <li><a href="{{ route('relation.index') }}">{{ __('Relation List') }}</a></li>
                </ul>
            </div>
        </div>
    </li>

    <li class="has-sub-menu">
    <li>
        <a style="margin-top:2px;" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }} <span class="os-icon os-icon-log-out d-inline align-middle"></span>
        </a>
    </li>
    </div>
    </li>
</ul>
