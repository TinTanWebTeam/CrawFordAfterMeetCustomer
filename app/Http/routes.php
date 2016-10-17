<?php

/*
 * Public Route
 * */
Route::get('/',function(){
    if(Auth::check()){
        if(Auth::user()->roleId == 1)
            return redirect('admin/dashboard');
        return redirect('user/dashboard');
    }
    return redirect('auth/login');
});
Route::get('auth/logout','Auth\AuthController@getLogout');
Route::group(['middleware' => ['guest']],function (){
    Route::get('auth/login','Auth\AuthController@getLogin');
    Route::post('auth/login','Auth\AuthController@postLogin');
});

/*
 * Admin Route
 * */
Route::group(['middleware' => ['auth','admin'],'prefix' => 'admin'],function (){
    Route::get('dashboard','AdminController@dashboard');
    Route::get('claim','AdminController@getViewClaim');
    Route::get('employee','AdminController@getViewEmployee');
    Route::get('trialFee','AdminController@getViewTrialFee');
    Route::get('invoice','AdminController@getViewInvoice');
    Route::get('report','AdminController@getViewReport');
    Route::get('docket','AdminController@getViewDocket');
    Route::get('reportTask','AdminController@reportTask');
    Route::get('getClaimByCode/{code}','AdminController@getClaimByCode');
    Route::get('getAllClaim','AdminController@getAllClaim');
    Route::get('getAllSourceCode','AdminController@getAllSourceCode');
    Route::get('getAllClaimType','AdminController@getAllClaimType');
    Route::get('getAllLossDesc','AdminController@getAllLossDesc');
    Route::get('getAllAdjuster','AdminController@getAllAdjuster');
    Route::get('getAllBranch','AdminController@getAllBranch');
    Route::get('getAllInsurerCode','AdminController@getAllInsurerCode');
    Route::get('getAllBrokerCode','AdminController@getAllBrokerCode');
    Route::get('getSearchTime','AdminController@getSearchTime');
    Route::get('getSearchExpense','AdminController@getSearchExpense');
    Route::get('getSearchInsurer','AdminController@getSearchInsurer');
    Route::get('getSearchClaimType','AdminController@getSearchClaimType');
    Route::get('getSearchLossDesc','AdminController@getSearchLossDesc');
    Route::get('getSearchBroker','AdminController@getSearchBroker');
    Route::get('getSearchAdjuster','AdminController@getSearchAdjuster');
    Route::get('getSearchBranch','AdminController@getSearchBranch');
    Route::get('getMaxCodeClaim','AdminController@getMaxCodeClaim');
    Route::get('getAllEmployees','AdminController@getAllEmployees');
    Route::get('getSearchNameOfEmployee','AdminController@getSearchNameOfEmployee');
    Route::get('getSearchEmailOfEmployee','AdminController@getSearchEmailOfEmployee');

    Route::post('addNewAndUpdateEmployee','AdminController@addNewAndUpdateEmployee');
    Route::post('viewEmployeeDetailWhenChooseRowOfEventDoubleClick','AdminController@viewEmployeeDetailWhenChooseRowOfEventDoubleClick');
    Route::post('viewDetailEmployeeWhenUseEvenEnter','AdminController@viewDetailEmployeeWhenUseEvenEnter');
    Route::post('chooseClaimWhenUseEventEnter','AdminController@chooseClaimWhenUseEventEnter');
    Route::post('showInformationOfCustomer','AdminController@showInformationOfCustomer');
    Route::post('Bill','AdminController@BillV3');
    Route::post('viewBillOfClaimByStatus','AdminController@viewBillOfClaimByStatus');
    Route::post('loadInformationOfBill','AdminController@loadInformationOfBill');
    Route::post('saveClaim/{claimId}','AdminController@saveClaim');
    Route::post('loadTaskDetailByDate','AdminController@loadTaskDetailByDate');
    Route::post('loadInvoiceByEventEnterKey','AdminController@loadInvoiceByEventEnterKey');
    Route::post('saveAddNewUpdateClaimType','AdminController@saveAddNewUpdateClaimType');
    Route::post('saveAddNewUpdateLossDesc','AdminController@saveAddNewUpdateLossDesc');
    Route::post('saveAddNewUpdateSourceCode','AdminController@saveAddNewUpdateSourceCode');
    Route::post('saveAddNewUpdateBranch','AdminController@saveAddNewUpdateBranch');
    Route::post('saveAddNewUpdateBranchType','AdminController@saveAddNewUpdateBranchType');
    Route::post('saveAddNewUpdateInsurer','AdminController@saveAddNewUpdateInsurer');
    Route::post('saveAddNewUpdateBroker','AdminController@saveAddNewUpdateBroker');
    
    Route::post('loadClaimByEventEnterKey','AdminController@loadClaimByEventEnterKey');
    Route::post('loadViewDocketDetail/{sort_type}','AdminController@loadViewDocketDetail');
    Route::post('loadListTimeCode','AdminController@loadListTimeCode');
    Route::post('loadListExpenseCode','AdminController@loadListExpenseCode');
    Route::post('submitAddNewAndUpdateCategory','AdminController@submitAddNewAndUpdateCategory');
    Route::post('assignmentTask','AdminController@assignmentTask');
    Route::post('viewDetailTask','AdminController@viewDetailTask');

    Route::post('checkTheSameNameWhenCreateEmployee','AdminController@checkTheSameNameWhenCreateEmployee');
    Route::get('getAllInvoiceByClaimId/{claim_id}','AdminController@getAllInvoiceByClaimId');
    Route::get('getReportData/{invoice_major_no}/{bill_id}/{claim_id}','AdminController@getReportData');
    Route::post('loadReportTask','AdminController@loadReportTask');
    Route::get('getTimeNowServer','AdminController@getTimeNowServer');
    //Route::post('getAllInvoiceByClaim','AdminController@getAllInvoiceByClaim');
    Route::post('deleteTask','AdminController@deleteTask');
    Route::post('saveInformationOfInvoiceAfterInReport','AdminController@saveInformationOfInvoiceAfterInReport');
    Route::post('viewDetailInvoiceByInvoice','AdminController@viewDetailInvoiceByInvoice');
    Route::post('getClaimHaveInvoiceOfTabInvoice','AdminController@getClaimHaveInvoiceOfTabInvoice');
    Route::post('discountBill','AdminController@discountBill');

});

/*
 * User Route
 * */
Route::group(['middleware' => ['auth','user'],'prefix' => 'user'],function (){
    Route::get('dashboard','UserController@dashboard');
    Route::get('task','UserController@task');
    Route::get('profile','UserController@profile');
    Route::get('claim','UserController@claim');
    Route::get('report','UserController@report');
    Route::get('getSearchTime','UserController@getSearchTime');
    Route::get('getSearchExpense','UserController@getSearchExpense');
    Route::get('getTimeNowServer','UserController@getTimeNowServer');
    Route::get('getAllClaim','UserController@getAllClaim');

    Route::post('loadClaimByEventEnterKey','UserController@loadClaimByEventEnterKey');
    Route::post('assignmentTask','UserController@assignmentTask');
    Route::post('viewDetailTask','UserController@viewDetailTask');
    Route::post('loadViewDocketDetail/{sort_type}','UserController@loadViewDocketDetail');
    Route::post('updateInformationOrChangePassword','UserController@updateInformationOrChangePassword');
    Route::post('loadClaimByEventEnterKeyWhenUserSeeClaim','UserController@loadClaimByEventEnterKeyWhenUserSeeClaim');
    Route::post('loadExpenseCodeByType','UserController@loadExpenseCodeByType');
    Route::post('loadReport','UserController@loadReport');
    Route::post('deleteTask','UserController@deleteTask');
});
