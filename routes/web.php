<?php

use App\Http\Controllers\Admin\Accounts\CcLoanCategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Primary
use App\Http\Controllers\TestController;
use App\Http\Controllers\SavingsSchemeController;
use App\Http\Controllers\SavingsDipositController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Accounts\LoanController;
use App\Http\Controllers\Admin\Primary\AssetController;

use App\Http\Controllers\Admin\Primary\StaffController;
use App\Http\Controllers\Admin\Primary\OutloanController;
use App\Http\Controllers\Admin\Accounts\ClosingController;
use App\Http\Controllers\Admin\Accounts\CurrentAccountController;
use App\Http\Controllers\Admin\Accounts\MembersController;
use App\Http\Controllers\Admin\Accounts\SavingsController;

// Accounts
use App\Http\Controllers\Admin\Primary\AreaListController;
use App\Http\Controllers\Admin\Accounts\ReferralController;
use App\Http\Controllers\Admin\Accounts\CcLoanController;

// Savings
use App\Http\Controllers\Admin\Primary\BankListController;
use App\Http\Controllers\Admin\Primary\StaffRoleController;

use App\Http\Controllers\Admin\Accounts\GeneralAcController;
use App\Http\Controllers\Admin\Primary\BranchListController;
use App\Http\Controllers\Admin\Primary\StaffPrintController;
use App\Http\Controllers\Admin\Primary\StaffStatusController;

//Credits
use App\Http\Controllers\Admin\Primary\DirectorListController;
use App\Http\Controllers\Admin\Primary\LoanCategoryController;
use App\Http\Controllers\Admin\Accounts\FixedDipositController;

// Debits
use App\Http\Controllers\Admin\Primary\VoucherCategoryController;
use App\Http\Controllers\Admin\Accounts\LoanApplicationController;
use App\Http\Controllers\Admin\Accounts\PassbookManagementController;
use App\Http\Controllers\Admin\Accounts\ShareAccountController;

use App\Http\Controllers\Admin\Accounts\ProfitController;
use App\Http\Controllers\Admin\Credit\CommonCollectionController;
use App\Http\Controllers\Admin\Credit\TodayCollectionController;
use App\Http\Controllers\Admin\credits\BankWithdrawController;
use App\Http\Controllers\Admin\credits\CashCreditController;
use App\Http\Controllers\Admin\Debits\ApplicationController;
use App\Http\Controllers\Admin\Debits\BankDepositController;
use App\Http\Controllers\Admin\Debits\FixedDepositBalanceTransactionController;
// Voucher
use App\Http\Controllers\Admin\Primary\FixedDipositSchemeController;

// Reports
use App\Http\Controllers\Admin\Debits\FixedDepositProfitWithdrawController;
use App\Http\Controllers\Admin\Primary\DistrictController;
use App\Http\Controllers\Admin\Primary\DivisionController;
use App\Http\Controllers\Admin\Primary\PostofficeController;
use App\Http\Controllers\Admin\Primary\RelationController;
use App\Http\Controllers\Admin\Primary\StaffFundTransactionController;
use App\Http\Controllers\Admin\Primary\StatisticController;
use App\Http\Controllers\Admin\Primary\SubDistrictController;
use App\Http\Controllers\Admin\Primary\VillageController;
use App\Http\Controllers\Admin\Reports\ReportController;
use App\Http\Controllers\Admin\Reports\CurrentAccountReportController;
use App\Http\Controllers\Admin\Reports\DpsReportController;
use App\Http\Controllers\Admin\Reports\FdrReportController;
use App\Http\Controllers\Admin\Reports\GeneralReportController;
use App\Http\Controllers\Admin\Reports\LoanReportController;
use App\Http\Controllers\Admin\Reports\VoucherReportController;
use App\Http\Controllers\Admin\Reports\AdmissionRegisterReportController;
use App\Http\Controllers\Admin\Reports\MemberBalanceReportController;
use App\Http\Controllers\Admin\Reports\DebitCreditReportController;
use App\Http\Controllers\Admin\Reports\ReceivePaymentReportController;
use App\Http\Controllers\Admin\Reports\UserCollectionReportController;
use App\Http\Controllers\Admin\Sms\SmsController;
use App\Http\Controllers\Admin\Voucher\ApprovalController;
use App\Http\Controllers\Admin\Voucher\CashController;
use App\Http\Controllers\Admin\Voucher\ExpenseController;
use App\Http\Controllers\Admin\Voucher\GetOutLoanController;
use App\Http\Controllers\Admin\Voucher\IncomeController;
use App\Http\Controllers\Admin\Voucher\ReturnOutLoanController;
use App\Http\Controllers\Admin\Voucher\SalaryDistributionController;
use App\Http\Controllers\Admin\Voucher\StaffFundController;
use App\Http\Controllers\Admin\Voucher\StaffDepositPurposeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SavingsWithdrawController;
use App\Http\Controllers\StaffUserController;
use App\Http\Controllers\VoucherController;
use Illuminate\Console\Application;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Contracts\Role;

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::middleware(['auth'])->group(function () {

    // Route::get('test', [TestController::class, 'index']);


    Route::middleware(['role:field-officer|admin'])->group(function () {
        Route::get('/staff-fund-transaction/{staff}', [StaffFundController::class, 'show'])->name('staff-fund-transaction.show');
    });

    // Primary
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/storage-link', [DashboardController::class, 'storage_link'])->name('storage-link');
    Route::get('/migrate', [DashboardController::class, 'migrate'])->name('migrate');
    Route::get('/autoload', [DashboardController::class, 'dump_autoload'])->name('dump_autoload');
    Route::get('primary/statistic', [StatisticController::class, 'index'])->name('statistic');

    //Application withdraw
    Route::get('debit/withdraw/application/index', [ApplicationController::class, 'withdraw_index'])->name('loan.withdraw.index');
    Route::get('debit/withdraw/application/search', [ApplicationController::class, 'search'])->name('withdraw.search');
    Route::post('debit/withdraw/application/create', [ApplicationController::class, 'search_post'])->name('withdraw.search.post');
    Route::post('debit/withdraw/application/store', [ApplicationController::class, 'withdraw_store'])->name('withdraw.application.store');
    Route::get('debit/withdraw/application/destroy/{id}', [ApplicationController::class, 'withdraw_application_delete'])->name('withdraw.application.destroy');

    Route::get('debit/withdraw/application/{t_id}/{status}', [ApplicationController::class, 'withdraw_application_status_change'])->name('withdraw_application.status.change');
    Route::post('debit/withdraw/application/status_rejected/post', [ApplicationController::class, 'withdraw_status_rejected'])->name('withdraw_status.rejected');

    Route::middleware(['role:admin|manager'])->group(function () {
        // staff
        Route::get('/staff/pad-print/{id}', [StaffController::class, 'padPrint'])->name('staff.Pad.Print');
        Route::get('/staff/page-print/{id}', [StaffController::class, 'pagePrint'])->name('staff.Page.Print');
        Route::get('/staff/id-print/{id}', [StaffController::class, 'idPrint'])->name('staff.ID.Print');
        Route::get('/staff/status', [StaffStatusController::class, 'index'])->name('staff-status.index');
        Route::get('/staff/status/active/{id}', [StaffStatusController::class, 'active'])->name('staff-status.active');
        Route::get('/staff/status/inactive/{id}', [StaffStatusController::class, 'inactive'])->name('staff-status.inactive');
        Route::get('/print-all-staff', [StaffPrintController::class, 'index'])->name('print-all-staff.index');
        Route::get('/print-all-reports', [StaffPrintController::class, 'reports'])->name('print-all-staff.reports');
        Route::resource('staff', StaffController::class);
        Route::get('staff/idcard/{id}', [StaffController::class, 'idcard'])->name('staff.idcard');
        Route::resource('staff-role', StaffRoleController::class);

        // staff fund transaction
        Route::resource('staff-fund-transaction', StaffFundTransactionController::class);


        //staff deposit purpose


        Route::get('/staff-deposit-purpose', [StaffDepositPurposeController::class, 'index'])->name('staff-deposit-purpose.index');
        Route::post('/add-staff-deposit-purpose', [StaffDepositPurposeController::class, 'store'])->name('staff-deposit-purpose.store');
        Route::get('/staff-deposit-purpose/edit/{id}', [StaffDepositPurposeController::class, 'edit'])->name('staff-deposit-purpose.edit');
        Route::put('/staff-deposit-purpose/update/{id}', [StaffDepositPurposeController::class, 'update'])->name('staff-deposit-purpose.update');
        Route::delete('/staff-deposit-purpose/destroy/{id}', [StaffDepositPurposeController::class, 'destroy'])->name('staff-deposit-purpose.destroy');


        // staff fund deposit & withdraw

        Route::get('/staff-fund/deposit', [StaffFundController::class, 'staff_deposit'])->name('staff-fund.deposit');
        Route::post('/staff-fund/deposit/store', [StaffFundController::class, 'staff_deposit_store'])->name('staff-fund.deposit.store');
        Route::get('/staff-fund/withdraw', [StaffFundController::class, 'staff_withdraw'])->name('staff-fund.withdraw');
        Route::post('/staff-fund/withdraw/store', [StaffFundController::class, 'staff_withdraw_store'])->name('staff-fund.withdraw.store');
        Route::post('/staff-fund/get-members-by-area', [StaffFundController::class, 'get_members_by_area'])->name('staff-fund.members');
        Route::post('/staff-fund/get-staff-fund-amount', [StaffFundController::class, 'get_staff_fund_amount'])->name('staff-fund.amount');

        // staff fund transaction
        Route::get('/staff-fund-transaction', [StaffFundController::class, 'index'])->name('staff-fund-transaction.index');

        Route::delete('/staff-fund-transaction/destroy/{id}', [StaffFundController::class, 'destroy'])->name('staff-fund-transaction.destroy');

        // branch list
        Route::prefix('/branch-list')->group(function () {
            Route::get('', [BranchListController::class, 'index'])->name('branch-list.index');
            Route::get('/create', [BranchListController::class, 'create'])->name('branch-list.create');
            Route::post('/store', [BranchListController::class, 'store'])->name('branch-list.store');
            Route::get('/edit/{id}', [BranchListController::class, 'edit'])->name('branch-list.edit');
            Route::post('/update', [BranchListController::class, 'update'])->name('branch-list.update');
            Route::delete('/delete/{id}', [BranchListController::class, 'delete'])->name('branch-list.delete');
        });

        // area list
        Route::prefix('/area-list')->group(function () {
            Route::get('', [AreaListController::class, 'index'])->name('area-list.index');
            Route::get('/create', [AreaListController::class, 'create'])->name('area-list.create');
            Route::post('/store', [AreaListController::class, 'store'])->name('area-list.store');
            Route::get('/edit/{id}', [AreaListController::class, 'edit'])->name('area-list.edit');
            Route::post('/update', [AreaListController::class, 'update'])->name('area-list.update');
            Route::delete('/delete/{id}', [AreaListController::class, 'delete'])->name('area-list.delete');
            Route::post('/get_area_by_branch', [AreaListController::class, 'get_area_by_branch'])->name('get_area_by_branch');
        });

        // director list
        Route::resource('director-list', DirectorListController::class);

        Route::get('director/withdrow', [DirectorlistController::class, 'director_withdraw'])->name('director.withdraw');
        Route::post('director/withdrow/store', [DirectorlistController::class, 'director_withdraw_store'])->name('directorWithdraw.store');

        Route::get('director/deposit', [DirectorlistController::class, 'director_deposit'])->name('director.deposit');
        Route::post('director/deposit/store', [DirectorlistController::class, 'director_deposit_store'])->name('directordeposit.store');
        Route::get('directorTransactionList/delete/{id}', [DirectorlistController::class, 'directorTransactionList_delete'])->name('directorTransactionList.delete');

        Route::get('/get_director_amount', [DirectorlistController::class, 'get_director_amount'])->name('director.amount');

        //outloan
        Route::resource('outloan', OutloanController::class);
        Route::get('/outloan-active/{id}', [OutloanController::class, 'active'])->name('outloan-active');
        Route::get('/outloan-inactive/{id}', [OutloanController::class, 'inactive'])->name('outloan-inactive');
        Route::get('/outloan_transaction/delete/{id}', [OutloanController::class, 'outloan_transaction_delete'])->name('outloan_transaction.delete');

        // get out loan
        Route::get('/voucher/Getoutloan/create', [GetOutLoanController::class, 'create'])->name('getoutloan.create');
        Route::post('/voucher/Getoutloan/store', [GetOutLoanController::class, 'store'])->name('getoutloan.store');
        Route::get('/getoutloan_amount', [GetOutLoanController::class, 'getoutloan_amount'])->name('outloan.balance');

        // Return out loan
        Route::get('/voucher/returnoutloan/create', [ReturnOutLoanController::class, 'create'])->name('returnoutloan.create');
        Route::post('/voucher/returnoutloan/store', [ReturnOutLoanController::class, 'store'])->name('returntoutloan.store');

        // bank list
        Route::resource('banklist', BankListController::class);
        Route::get('/bank-active/{id}', [BankListController::class, 'active'])->name('bank-active');
        Route::get('/bank-inactive/{id}', [BankListController::class, 'inactive'])->name('bank-inactive');
        Route::get('/bank-transaction-list/{id}', [BankListController::class, 'BanktransactionList'])->name('BanktransactionList');
        Route::get('/getBankAmount', [BankDepositController::class, 'getBankAmount'])->name('bank.amount');

        //bank deposit/withdraw
        Route::get('/debit/bank-deposit/create', [BankDepositController::class, 'create'])->name('bank.deposit');
        Route::post('/debit/bank-deposit/store', [BankDepositController::class, 'store'])->name('bankDeposit.store');

        Route::get('/credit/bank-withdraw/create', [BankWithdrawController::class, 'create'])->name('bank.withdraw');
        Route::post('/credit/bank-withdraw/store', [BankWithdrawController::class, 'store'])->name('bankwithdraw.store');





        //CC Loan category
        Route::resource('ccloancategory', CcLoanCategoryController::class);
        //CC Loan 
        Route::prefix('cc_loan')->group(function(){

            Route::get('list', [CcLoanController::class, 'index'])->name('cc_loan.index');

            Route::get('create/search', [CcLoanController::class, 'search'])->name('cc_loan.search');
            Route::post('create/search', [CcLoanController::class, 'postSearch'])->name('cc_loan.search');
            Route::get('{account}/create', [CcLoanController::class, 'create'])->name('cc_loan.create');
            Route::get('/transaction/{loan}/show', [CcLoanController::class, 'transaction_show'])->name('cc_loan.transaction.show');
            Route::get('/transaction/{loan}/report', [CcLoanController::class, 'transaction_report'])->name('cc_loan.transaction.report');
            Route::post('store', [CcLoanController::class, 'store'])->name('cc_loan.store');
            Route::delete('delete/{id}', [CcLoanController::class, 'delete'])->name('cc_loan.destroy');
        });

            //Cash Credit (cc)
            Route::get('/credit/cc_inst._collection/search', [CcLoanController::class, 'installment_search'])->name('ccinst.collection.search');
            Route::post('/credit/cc_inst._collection/search', [CcLoanController::class, 'installment_post_search'])->name('ccinst.collection.search');
            Route::get('/credit/cc_inst._collection/{account}/list', [CcLoanController::class, 'installment_index'])->name('ccinst.collection.index');
            Route::get('/credit/cc_inst._collection/{account}/create/{loan}', [CcLoanController::class, 'installment_create'])->name('ccinst.collection.create');
            Route::post('/credit/cc_inst._collection/store', [CcLoanController::class, 'installment_store'])->name('ccinst.collection.store');
            Route::delete('/credit/cc_inst._collection/{installment}/delete', [CcLoanController::class, 'installment_destroy'])->name('ccinst.collection.destroy');
            

       
            Route::get('/credit/cc_closing/search', [CcLoanController::class, 'closing_search'])->name('cc_closing.search');
            Route::post('/credit/cc_closing/search', [CcLoanController::class, 'closing_post_search'])->name('cc_closing.search');
            Route::get('/credit/cc_closing/{account}/list', [CcLoanController::class, 'closing_index'])->name('cc_closing.index');
            Route::get('/credit/cc_closing/{account}/create/{loan}', [CcLoanController::class, 'closing_create'])->name('cc_closing.create');
            Route::post('/credit/cc_closing/store', [CcLoanController::class, 'closing_store'])->name('cc_closing.store');

       






        // voucher category
        Route::group(['prefix' => 'voucher', 'as' => 'voucher.', 'middleware' => 'role:admin|manager|accountant'], function () {
            Route::resource('expense', ExpenseController::class);
            Route::resource('income', IncomeController::class);
            Route::get('member-income/list', [IncomeController::class, 'member_income'])->name('member-income.index');

            Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
                Route::get('', [VoucherCategoryController::class, 'index'])->name('index');
                Route::post('', [VoucherCategoryController::class, 'store'])->name('store');
                Route::get('edit/{id}', [VoucherCategoryController::class, 'edit'])->name('edit');
                Route::put('update/{id}', [VoucherCategoryController::class, 'update'])->name('update');
                Route::delete('destroy/{id}', [VoucherCategoryController::class, 'destroy'])->name('destroy');

                Route::get('active/{id}', [VoucherCategoryController::class, 'active'])->name('active');
                Route::get('inactive/{id}', [VoucherCategoryController::class, 'inactive'])->name('inactive');
            });

            Route::group(['prefix' => 'salary'], function () {
                Route::get('distribution', [SalaryDistributionController::class, 'distribution'])->name('salary.distribution');
                Route::get('sheet', [SalaryDistributionController::class, 'sheet'])->name('salary.sheet');
                Route::get('distribution-sheet', [SalaryDistributionController::class, 'distribution_sheet'])->name('salary.distribution.sheet');
                Route::post('distribute-save', [SalaryDistributionController::class, 'distribution_save'])->name('salary.distribution.save');
                Route::delete('distribute-delete/{id}', [SalaryDistributionController::class, 'delete'])->name('salary.distribution.delete');
            });
        });

        Route::get('voucher/approval', [ApprovalController::class, 'approve'])->name('voucher.forapproval');
        //Cash
        Route::get('voucher/cashclosing', [CashController::class, 'cash'])->name('voucher.cash_closing');
        Route::get('voucher/cashclosing/create', [CashController::class, 'create'])->name('voucher.cash_closing.index');

        //Auto Profit Distribution/generation
        Route::get('voucher/auto-profit-generation/index', [ProfitController::class, 'index'])->name('auto.profit');
        Route::get('voucher/auto-profit-distribution/index', [ProfitController::class, 'dishistory'])->name('auto-profitditribution-history');

        //salary distribution



        Route::resource('voucher', VoucherController::class);

        Route::resource('loancategory', LoanCategoryController::class);

        Route::resource('fixed-diposit-scheme', FixedDipositSchemeController::class);

        Route::resource('asset', AssetController::class);
    });

    // division
    Route::resource('division-list', DivisionController::class);
    Route::get('division-list/status/{id}', [DivisionController::class, 'status'])->name('division-list.status');

    //district
    Route::resource('district', DistrictController::class);
    Route::get('district/status/{id}', [DistrictController::class, 'status'])->name('district.status');

    //SubDistrict--
    // Route::post('getdivision', [SubDistrictController::class, 'getdivision'])->name('district.division');
    Route::resource('subdistrict', SubDistrictController::class);
    Route::get('subdistrict/status/{id}', [SubDistrictController::class, 'status'])->name('subdistrict.status');

    //Post Office
    Route::resource('postoffice', PostofficeController::class);
    Route::get('postoffice/status/{id}', [PostofficeController::class, 'status'])->name('postoffice.status');


    //Village
    Route::resource('village', VillageController::class);
    Route::get('village/status/{id}', [VillageController::class, 'status'])->name('Village.status');


    // relation--
    Route::get('/relation', [RelationController::class, 'index'])->name('relation.index');
    Route::post('/add-relation', [RelationController::class, 'store'])->name('relation.store');
    Route::get('/relation/edit/{id}', [RelationController::class, 'edit'])->name('relation.edit');
    Route::put('/relation/update/{id}', [RelationController::class, 'update'])->name('relation.update');
    Route::delete('/relation/destroy/{id}', [RelationController::class, 'destroy'])->name('relation.destroy');



    // Member
    Route::post('getDivision', [MembersController::class, 'getdivision'])->name('members.division');
    Route::post('getdistrict', [MembersController::class, 'getdistrict'])->name('ajax.district');
    Route::post('getsubdistrict', [MembersController::class, 'getsubdistrict'])->name('ajax.sub_district');
    Route::post('getpostoffice', [MembersController::class, 'getpostoffice'])->name('ajax.m_post');
    Route::get('members/details/{id}', [MembersController::class, 'details'])->name('members.details');
    Route::get('members/admissionform/{id}', [MembersController::class, 'admissionform'])->name('members.admissionform');

    Route::post('get_last_account_number_by_area', [MembersController::class, 'get_last_account_number_by_area'])->name('get_last_account_number_by_area');
    Route::get('get-member-by-account', [MembersController::class, 'get_member_by_account'])->name('get-member-by-account');
    Route::resource('members', MembersController::class);

    //Referrals
    Route::resource('referrals', ReferralController::class)->only('index', 'store', 'destroy');


    // Savings -> routes
    Route::prefix('savings/scheme')->group(function () {
        Route::get('', [SavingsSchemeController::class, 'getScheme'])->name('savings.scheme.index');
        Route::post('/store', [SavingsSchemeController::class, 'storeScheme'])->name('savings.scheme.store');
        Route::get('/edit/{id}', [SavingsSchemeController::class, 'editScheme'])->name('savings.scheme.edit');
        Route::put('/update/{id}', [SavingsSchemeController::class, 'updateScheme'])->name('savings.scheme.update');
        Route::delete('/delete/{id}', [SavingsSchemeController::class, 'deleteScheme'])->name('savings.scheme.delete');
    });

    Route::prefix('savings')->group(function () {
        Route::post('new', [SavingsController::class, 'postNew'])->name('savings.new');
        Route::get('new/{id}', [SavingsController::class, 'getNew'])->name('savings.add');
        Route::get('closed-account', [SavingsController::class, 'closed'])->name('savings.closed');
        Route::get('paid-account', [SavingsController::class, 'paid'])->name('savings.paid');
    });

    Route::prefix('savings/deposit')->group(function () {
        Route::get('{account}/list', [SavingsDipositController::class, 'index'])->name('savings.deposit.index');
        Route::get('search', [SavingsDipositController::class, 'search'])->name('savings.deposit.search');
        Route::post('search', [SavingsDipositController::class, 'postSearch'])->name('savings.deposit.search');
        Route::get('{id}/create', [SavingsDipositController::class, 'create'])->name('savings.deposit.create');
        Route::post('store', [SavingsDipositController::class, 'store'])->name('savings.deposit.store');
    });

    Route::prefix('savings/withdraw')->group(function () {
        Route::get('{account}/list', [SavingsWithdrawController::class, 'index'])->name('savings.withdraw.index');
        Route::get('search', [SavingsWithdrawController::class, 'search'])->name('savings.withdraw.search');
        Route::post('search', [SavingsWithdrawController::class, 'postSearch'])->name('savings.withdraw.search');
        Route::get('{account}/{id}/create', [SavingsWithdrawController::class, 'create'])->name('savings.withdraw.create');
        Route::post('store', [SavingsWithdrawController::class, 'store'])->name('savings.withdraw.store');
    });

    Route::get('savings/{id}/transactions', [SavingsController::class, 'shows'])->name('savings.transactions');
    Route::delete('savings/transactions/delete/{id}', [SavingsController::class, 'transactionsDetete'])->name('savings.transactions.detele');
    Route::resource('savings', SavingsController::class);

    //Monthly savings
    Route::get('monthly-saving-schema/index', [SavingsSchemeController::class, 'monthlysaving'])->name('monthly-saving.index');
    Route::get('monthly-saving-deposit/index', [SavingsSchemeController::class, 'msd'])->name('monthly-saving-deposit.index');

    //Today Collection
    Route::get('today-collection/index', [TodayCollectionController::class, 'todaycollect'])->name('today-collection.index');


    //sms
    Route::get('sms/singlesms', [SmsController::class, 'singlesms'])->name('sms.singlesms');
    Route::post('sms/singlesms/send', [SmsController::class, 'singlesms_send'])->name('sms.singlesms.send');
    Route::get('sms/monthlysms', [SmsController::class, 'monthlysms'])->name('sms.monthlysms');
    Route::get('sms/smsreport', [SmsController::class, 'smsreport'])->name('sms.smsreport');

    // all ajax calls
    Route::prefix('ajax')->group(function () {
        Route::post('get/scheme-sequence', [SavingsSchemeController::class, 'ajaxSchemeSequence'])->name('ajax.scheme.sequence');
    });

    Route::prefix('general/account')->group(function () {
        Route::get('', [GeneralAcController::class, 'index'])->name('general-ac.index');
        //create general account
        Route::get('create/{id}', [GeneralAcController::class, 'create_general_account'])->name('general.create');
        Route::post('store/{id}', [GeneralAcController::class, 'store_general_account'])->name('general.account.store');
        Route::get('member/search/', [GeneralAcController::class, 'search_account'])->name('general.search');
        Route::post('member/search/', [GeneralAcController::class, 'post_general_search'])->name('post.general.search');

        Route::get('edit/{account_id}', [GeneralAcController::class, 'edit'])->name('generalAc.edit');
        Route::post('update', [GeneralAcController::class, 'update'])->name('general-ac.update');

        Route::get('deposit/search', [GeneralAcController::class, 'getSearchDeposit'])->name('general-ac.search-deposit');
        Route::post('deposit/search', [GeneralAcController::class, 'postSearchDeposit'])->name('general-ac.search-deposit');
        Route::get('withdraw/search', [GeneralAcController::class, 'getSearchWithdraw'])->name('general-ac.search-withdraw');
        Route::post('withdraw/search', [GeneralAcController::class, 'postSearchWithdraw'])->name('general-ac.search-withdraw');

        Route::get('{account}/transactions', [GeneralAcController::class, 'transactions'])->name('general-ac.transactions');
        Route::get('{account}/deposit', [GeneralAcController::class, 'getDeposit'])->name('general-ac.deposit');
        Route::post('{account}/deposit', [GeneralAcController::class, 'postDeposit'])->name('general-ac.deposit');
        Route::get('{account}/withdraw', [GeneralAcController::class, 'getWithdraw'])->name('general-ac.withdraw');
        Route::post('{account}/withdraw', [GeneralAcController::class, 'postWithdraw'])->name('general-ac.withdraw');
        Route::delete('transactions/delete/{id}', [GeneralAcController::class, 'transactionsDelete'])->name('general-ac.transactions.delete');
    });


    // fixed deposit
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('fixed-deposit', FixedDipositController::class);
    });

    Route::prefix('fdr')->group(function () {
        Route::post('search', [FixedDipositController::class, 'postNewDiposit'])->name('fixed-diposit.fdn_new');
        Route::get('create/{scheme}/{member}', [FixedDipositController::class, 'getNewDipositId'])->name('fixed-diposit.fdn_get');

        Route::get('statememt/{id}', [FixedDipositController::class, 'statememt'])->name('fixed-diposit.statememt');
        Route::get('account/{id}', [FixedDipositController::class, 'account'])->name('fixed-diposit.account');
        Route::get('certificate/{id}', [FixedDipositController::class, 'certificate'])->name('fixed-diposit.certificate');
        Route::post('profit/{id}', [FixedDipositController::class, 'makeProfit'])->name('fixed-diposit.makeProfit');
    });

    Route::resource('fdr-withdraw', FixedDepositProfitWithdrawController::class);
    Route::post('/fdr-withdraw/search/', [FixedDepositProfitWithdrawController::class, 'postAccountNumber'])->name('fdr-withdraw.search');
    Route::get('/fdr-withdraw/withdraw/{id}', [FixedDepositProfitWithdrawController::class, 'getAccountNumber'])->name('fdr-withdraw.getAccNumber');


    //Fixed Deposit Balance Transaction


    Route::get('/fixed-deposit/balance-transaction/search', [FixedDepositBalanceTransactionController::class, 'search'])->name('fdr-balance-transaction.search');

    Route::post('/fixed-deposit/balance-transaction/search', [FixedDepositBalanceTransactionController::class, 'postSearch'])->name('fdr-balance-transaction.search');

    Route::get('/fixed-deposit/balance-transaction/{account}/create', [FixedDepositBalanceTransactionController::class, 'create'])->name('fdr-balance-transaction.create');

    Route::post('/fixed-deposit/balance-transaction/store', [FixedDepositBalanceTransactionController::class, 'store'])->name('fdr-balance-transaction.store');

    Route::get('/fixed-deposit/balance-transaction/{account}/show', [FixedDepositBalanceTransactionController::class, 'show'])->name('fdr-balance-transaction.show');

    Route::delete('/fixed-deposit/balance-transaction/{id}/delete', [FixedDepositBalanceTransactionController::class, 'destroy'])->name('fdr-balance-transaction.destroy');

    // loan
    Route::prefix('loan')->group(function () {
        Route::get('invest', [LoanController::class, 'index'])->name('loan.index');
        Route::get('invest/{loanId}/show', [LoanController::class, 'show'])->name('loan.show');

        Route::get('create/search', [LoanController::class, 'search'])->name('loan.search');
        Route::post('create/search', [LoanController::class, 'postSearch'])->name('loan.search');


        Route::get('{account}/create', [LoanController::class, 'create'])->name('loan.create');
        Route::post('store', [LoanController::class, 'store'])->name('loan.store');
        Route::post('update-loan-status', [LoanController::class, 'update_loan_status'])->name('loan.update.status');
        Route::delete('destroy/{id}', [LoanController::class, 'delete'])->name('loan.destroy');

        // credit menu -> installment collection
        Route::get('collect/search', [LoanController::class, 'collectIndex'])->name('loan.collect.index');
        Route::post('collect/search', [LoanController::class, 'postCollectSearch'])->name('loan.collect.search');
        Route::get('collect/{account}/search', [LoanController::class, 'getCollectSearch'])->name('loan.collect.loan_list');
        Route::get('install/{loanId}/collect', [LoanController::class, 'createInstallment'])->name('loan.collect.create');
        Route::post('install/{loanId}/collect', [LoanController::class, 'storeInstallment'])->name('loan.collect.store');
        Route::delete('install/delete/{id}', [LoanController::class, 'deleteInstallment'])->name('loan.collect.delete');
    });
    Route::resource('loan-application', LoanApplicationController::class);

    //all share account
    Route::prefix('share-account')->middleware(['role:admin'])->group(function () {
        Route::get('index', [ShareAccountController::class, 'index'])->name('share-account.index');
        Route::get('new-transaction/{id}', [ShareAccountController::class, 'new_transaction'])->name('new.transaction');
        Route::get('delete/{id}', [ShareAccountController::class, 'destroy'])->name('shareAccount.delete');
        Route::post('new-transaction/store', [ShareAccountController::class, 'transaction_store'])->name('transaction.store');
        Route::get('share_certificate/{id}', [ShareAccountController::class, 'share_certificate'])->name('share.certificate');
        Route::get('share_statement/{id}', [ShareAccountController::class, 'share_statement'])->name('share.statement');
        Route::get('Transactionlist/{id}', [ShareAccountController::class, 'transaction_list'])->name('shareTransaction.list');
        Route::post('Transactionlist/update', [ShareAccountController::class, 'transaction_list_update'])->name('transactions_list.update');
        Route::get('shareTransactionlist/delete/{id}', [ShareAccountController::class, 'transaction_list_delete'])->name('shareTransactionlist.delete');
    });

    //all share account
    Route::prefix('passbook-management')->middleware(['role:admin'])->name('passbook-management.')->group(function () {
        Route::get('index', [PassbookManagementController::class, 'index'])->name('index');
    });
    // Comon collections
    Route::prefix('accounts')->group(function () {
        Route::get('{account}/collection', [CommonCollectionController::class, 'index'])->name('credits.common.index');
        Route::get('{account}/collections', [CommonCollectionController::class, 'test']);
        Route::get('collection/search', [CommonCollectionController::class, 'search'])->name('credits.common.search');
        Route::post('collection/search', [CommonCollectionController::class, 'postSearch'])->name('credits.common.search');
        Route::post('common-collection/store/{account}', [CommonCollectionController::class, 'commoncollection_store'])->name('common.collection.store');
    });

    Route::middleware(['role:admin'])->group(function () {
        // account closings
        Route::resource('closing', ClosingController::class);
        Route::post('/closing/search', [ClosingController::class, 'closingSearch'])->name('closing.search');
        Route::get('/fdr/closing/get/{id}', [ClosingController::class, 'getClosing'])->name('closing.get');

        // this is for loan closing
        Route::get('/loan/closing/get/{id}', [ClosingController::class, 'getLoanClosing'])->name('loan.closing.get');
        Route::post('loan/closing', [ClosingController::class, 'storeLoanClosing'])->name('loan.closing.store');

        // this is for dps closing
        Route::get('dps/closing/get/{id}', [ClosingController::class, 'getDPSClosing'])->name('dps.closing.get');
        Route::post('dps/closing', [ClosingController::class, 'storeSavingsClosing'])->name('dps.closing.store');
    });
   
    // current account controller

    Route::resource('current-account', CurrentAccountController::class);

    Route::prefix('/current/account')->group(function () {

        Route::get('', [CurrentAccountController::class, 'current_account_search'])->name('current.search');
        Route::post('search/post', [CurrentAccountController::class, 'current_account_search_post'])->name('current.search.post');
        Route::get('/create/{id}', [CurrentAccountController::class, 'current_account_create'])->name('currentaccount.create');
       // Route::post('/store/{id}', [CurrentAccountController::class, 'current_account_store'])->name('current.account.store');
        
        Route::post('/store/{id}', [CurrentAccountController::class, 'current_account_store'])->name('current.account.store');
        
        Route::get('/edit/{account_id}', [CurrentAccountController::class, 'current_account_edit'])->name('current_account.edit');
        Route::post('/update', [CurrentAccountController::class, 'current_account_update'])->name('current_account.update');


        Route::get('/search', [CurrentAccountController::class, 'getSearch'])->name('current-account.create');
        Route::post('/search', [CurrentAccountController::class, 'getAccount'])->name('current-account.search');
        Route::get('/use/{account}', [CurrentAccountController::class, 'useAccount'])->name('current-account.use');
        Route::get('/withdraw/{id}', [CurrentAccountController::class, 'withdrawRoute'])->name('current-account.withdraw');
        Route::post('/amount/withdraw/{id}', [CurrentAccountController::class, 'withdraw'])->name('current-amount.withdraw');
        Route::get('transaction/{id}', [CurrentAccountController::class, 'transaction'])->name('current-amount.transaction');
        Route::get('transaction/delete/{id}', [CurrentAccountController::class, 'current_transaction_delete'])->name('current-account.transactions.delete');
    });
    // Reports
    Route::prefix('reports')->group(function () {

        Route::get('/collection/daily', [ReportController::class, 'index'])->name('report.index');
        Route::post('/collection/daily', [ReportController::class, 'report'])->name('report.show');

        // general report controller
        Route::get('/general/search', [GeneralReportController::class, 'generalSearch'])->name('report.general.search');
        Route::get('/general/{account}', [GeneralReportController::class, 'index'])->name('report.general.index');
        Route::post('/general/find', [GeneralReportController::class, 'generalSearchAccount'])->name('report.general.search.post');
        // general report controller

        //dps report controller
        // Route::resource('/dps', DpsReportController::class);
        Route::get('/dps/search', [DpsReportController::class, 'dpsSearch'])->name('report.dps.search');
        Route::get('/dps/{account}', [DpsReportController::class, 'index'])->name('report.dps.index');
        Route::post('/dps/find', [DpsReportController::class, 'searchAccount'])->name('report.dps.search.post');
        //dps report controller

        //current account report controller
        // Route::resource('/dps', DpsReportController::class);
        Route::get('/current/account/search', [CurrentAccountReportController::class, 'caccountSearch'])->name('report.caccount.search');
        Route::get('/current/account/{account}', [CurrentAccountReportController::class, 'index'])->name('report.caccount.index');
        Route::post('/current/account/find', [CurrentAccountReportController::class, 'searchAccount'])->name('report.caccount.search.post');
        //current account report controller

        // loan report controller
        Route::get('/loan/search', [LoanReportController::class, 'loanSearch'])->name('report.loan.search');
        Route::get('/loan/{acount}', [LoanReportController::class, 'index'])->name('report.loan.index');
        Route::post('/loan/find', [LoanReportController::class, 'loanSearchAccount'])->name('report.loan.search.post');
        // loan report controller

        //dps report controller
        // Route::resource('/dps', DpsReportController::class);
        Route::get('/fdr/search', [FdrReportController::class, 'fdrSearch'])->name('report.fdr.search');
        Route::get('/fdr/{account}', [FdrReportController::class, 'index'])->name('report.fdr.index');
        Route::post('/fdr/find', [FdrReportController::class, 'searchAccount'])->name('report.fdr.search.post');
        //dps report controller


        //addmission register report controller
        Route::get('admission-register/search', [AdmissionRegisterReportController::class, 'search'])->name('report.admission-register.search');
        Route::post('admission-register/result', [AdmissionRegisterReportController::class, 'index'])->name('report.admission-register.index');

        //member balance report controller
        Route::get('member-balance/search', [MemberBalanceReportController::class, 'search'])->name('report.member-balance.search');
        Route::post('member-balance/result', [MemberBalanceReportController::class, 'index'])->name('report.member-balance.index');

        //debit credit report controller
        Route::get('debit-credit/search', [DebitCreditReportController::class, 'search'])->name('report.debit-credit.search');
        Route::post('debit-credit/result', [DebitCreditReportController::class, 'index'])->name('report.debit-credit.index');

        //receive payment report controller
        Route::get('receive-payment/search', [ReceivePaymentReportController::class, 'search'])->name('reports.receive-payment.search');
        Route::post('receive-payment/result', [ReceivePaymentReportController::class, 'index'])->name('reports.receive-payment.index');

        //receive payment report controller
        Route::get('user-collection/search', [UserCollectionReportController::class, 'search'])->name('reports.user-collection.search');
        Route::post('user-collection/result', [UserCollectionReportController::class, 'index'])->name('reports.user-collection.index');

        //Report Null
        Route::get('memberbalance.index', function () {
            return view('Reports.all_report.member_balance.index');
            
        });

        //voucher report controller
        Route::get('/voucher/search', [VoucherReportController::class, 'voucherSearch'])->name('report.voucher.search');
        //Route::post('/voucher', [VoucherReportController::class, 'index'])->name('report.voucher.index');
        Route::post('/voucher/find', [VoucherReportController::class, 'searchAccount'])->name('report.voucher.search.post');

        //voucher report controller
        //all report
        Route::get('all_reports/index', [VoucherReportController::class, 'index'])->name('all.index');
    });
    // staff user account
    Route::get('users', [StaffUserController::class, 'index'])->name('user.index')->middleware('role:admin');

    Route::group(['prefix' => 'user'], function () {
        Route::middleware(['role:admin'])->group(function () {
            Route::get('create', [StaffUserController::class, 'create'])->name('user.create');
            Route::get('form/{staffId}', [StaffUserController::class, 'form'])->name('user.form');
            Route::post('store/{staffId}', [StaffUserController::class, 'store'])->name('user.store');
            Route::delete('delete/{user}', [StaffUserController::class, 'delete'])->name('user.delete');

            Route::get('roles', [StaffUserController::class, 'roles'])->name('user.role.index');
            Route::get('role/create', [StaffUserController::class, 'roleCreate'])->name('user.role.create');
            Route::delete('role/{id}', [StaffUserController::class, 'roleDelete'])->name('user.role.delete');

            Route::get('{user}/role/assign', [StaffUserController::class, 'assignRole'])->name('user.role.assign');
            Route::post('{user}/role/save', [StaffUserController::class, 'assignRoleSave'])->name('user.role.save');
            // Route::get('{user}/permission/give', [StaffUserController::class, 'show'])->name('user.give.permission');

        });

        Route::get('change-password', [StaffUserController::class, 'changePassword'])->name('user.change-password');
        Route::post('change-password/{id}', [StaffUserController::class, 'saveNewPassword'])->name('user.save-password');
    });

    Route::get('link-fs', function () {
        return Artisan::call('storage:link');
    })->middleware('role:admin');
});

// middleware end



// Route::get('test/cc', [TestController::class, 'create']);
// Route::get('test/r', [TestController::class, 'show']);
// Route::get('test/p', [TestController::class, 'profit']);
Route::get('test/d', [TestController::class, 'date']);
Route::get('test/dps', [TestController::class, 'dps']);
Route::get('test', [TestController::class, 'test']);
