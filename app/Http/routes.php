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
    Route::get('getClaimByCode/{code}','AdminController@getClaimByCode');
    Route::get('getAllClaim','AdminController@getAllClaim');
    Route::get('getAllSourceCode','AdminController@getAllSourceCode');
    Route::get('getAllClaimType','AdminController@getAllClaimType');

    Route::post('addNewAndUpdateEmployee','AdminController@addNewAndUpdateEmployee');
    Route::post('viewEmployeeDetailWhenChooseRowOfEventDoubleClick','AdminController@viewEmployeeDetailWhenChooseRowOfEventDoubleClick');
    Route::post('viewDetailEmployeeWhenUseEvenEnter','AdminController@viewDetailEmployeeWhenUseEvenEnter');
    Route::post('chooseClaimWhenUseEventEnter','AdminController@chooseClaimWhenUseEventEnter');
    Route::post('showInformationOfCustomer','AdminController@showInformationOfCustomer');
    Route::post('actionBillOfClaimViewTrialFee','AdminController@actionBillOfClaimViewTrialFee');
    Route::post('viewBillOfClaimByStatus','AdminController@viewBillOfClaimByStatus');
    Route::post('loadInformationOfBill','AdminController@loadInformationOfBill');
    Route::post('saveClaim/{claimId}','AdminController@saveClaim');

});

/*
 * User Route
 * */
Route::group(['middleware' => ['auth','user'],'prefix' => 'user'],function (){
    Route::get('dashboard','UserController@dashboard');
    Route::get('task','UserController@task');
    Route::get('profile','UserController@profile');
    Route::post('loadClaimByEventEnterKey','UserController@loadClaimByEventEnterKey');
    Route::post('assignmentTask','UserController@assignmentTask');
    Route::post('viewDetailTask','UserController@viewDetailTask');
    Route::post('loadViewDocketDetail','UserController@loadViewDocketDetail');
    Route::post('updateInformationOrChangePassword','UserController@updateInformationOrChangePassword');

});
