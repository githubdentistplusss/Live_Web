<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:dapi')->get('/duser', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:dapi'], function(){
    //-------------- Messages --------
    Route::get('messages','ApiMessagesController@indexD');  
    Route::get('thread/{id}','ApiMessagesController@show'); 
     Route::post('messages/{id}','ApiMessagesController@update');
    Route::post('attach_file','ApiMessagesController@attach_file');
     Route::get('unread_msgs_count','ApiMessagesController@unread');  

});
Route::group(['middleware' => 'auth:api','prefix' => 'clnt'], function(){
    //-------------- Messages --------
    Route::get('messages','ApiMessagesController@indexC'); 
    Route::get('thread/{id}','ApiMessagesController@show');  
    Route::get('unread_msgs_count','ApiMessagesController@unread');  
   Route::post('messages/{id}','ApiMessagesController@update');
   Route::post('attach_file','ApiMessagesController@attach_file');

});

Route::get('getThreadId','ApiMessagesController@getThreadId');

Route::namespace('Api')->group(function () {	});


Route::get('/countries', 'ApiUserController@countries')->name('countries');
Route::get('/cities', 'ApiUserController@cities')->name('cities');
Route::post('/contact', 'ApiUserController@contact');

Route::get('/terms', 'ApiUserController@terms')->name('terms');


Route::post('/cLogin', 'ApiUserController@Login')->name('clientlogin');
Route::post('/registerClient', 'ApiUserController@registerAction')->name('clientRegister');
Route::get('/userLoginFTime', 'ApiUserController@userLoginFTime')->name('userLoginFTime');
Route::get('/clientDashboard/{user_id}', 'ApiUserController@account')->name('clientDashboard');
Route::get('/deleteDevice', 'ApiUserController@deleteDevice')->name('deleteDevice');
 Route::post('forgetPassword', 'ApiUserController@forgetPassword')->name('ApiForgetPassword');
 Route::post('/Uprofileform','ApiUserController@profileAction')->name('userpostprofile');
 Route::get('/UReservation/{user_id}','ApiEventController@Upcoming_Reserv')->name('UReservation');
 Route::get('/prevReservation','ApiEventController@prev_Reserv')->name('prevReservation'); 
 Route::get('/searchReservation', 'ApiEventController@reservationFormGet')->name('searchReservation');
  Route::get('/Uaccepet/{id}', 'ApiEventController@userAccepet')->name('accepetArr'); 
  Route::get('/UNeglect/{id}', 'ApiEventController@userNeglect')->name('neglectArr'); 
  
  Route::get('/gethospitals/{city}/{service}', 'ApiEventController@gethospitals')->name('gethospitals'); 
 
 Route::get('/details/{id}', 'ApiEventController@details')->name('deatils'); 
 
Route::post('/registerFClient', 'ApiFollowerController@registerActionFollower')->name('followerRegister');
  Route::get('/getFollower/{id}', 'ApiFollowerController@getFollower')->name('getFollower'); 
 

//Dentist login
Route::get('/Dlogout', 'ApiDentistController@logout')->name('Dlogout');
Route::get('/LoginFirstTime', 'ApiDentistController@LoginFirstTime')->name('LoginFirstTime');
Route::post('/dLogin', 'ApiDentistController@Login')->name('dentistlogin');
Route::post('/updatedevice', 'ApiDentistController@updatedevice')->name('updatedevice');





Route::post('/registerCreate', 'ApiDentistController@registerAction')->name('dentistRegister');

Route::get('/dentistDashboard', 'ApiDentistController@account')->name('dentistaccount');
Route::get('/deleteDeviceD', 'ApiDentistController@deleteDevice')->name('deleteDeviceD');
 Route::post('/Dprofileform','ApiDentistController@profileAction')->name('vendorpostprofile');
 Route::post('/hospitalUpdate','ApiDentistController@hospitalUpdate')->name('hospitalUpdate');
 //Route::get('/hospitals','ApiDentistController@hospitals')->name('hospitals');
 Route::get('/DlanguageUpdate/{dentist}','ApiDentistController@languageUpdate')->name('DlanguageUpdate');
 Route::get('/ClanguageUpdate/{user}','ApiUserController@languageUpdate')->name('ClanguageUpdate');

Route::post('Dforgetpassword', 'ApiDentistController@forgetPassword')->name('DApiForgetPassword');
//Dentist add service

Route::get('showcalander', 'ApiDentist_calanderController@showCalanderForm')->name('showcalnder');
Route::get('showcalander2', 'ApiDentist_calanderController@showCalanderForm2')->name('showcalnder2');
Route::post('add_calander', 'ApiDentist_calanderController@calanderAction')->name('createCalander');
Route::post('updatecalnder', 'ApiDentist_calanderController@calanderAction2')->name('showcalander2');
Route::get('deleteCalander', 'ApiDentist_calanderController@destroy')->name('deleteCalander');
Route::get('selectDate', 'ApiDentist_calanderController@selectDay')->name('selectDay');
Route::get('selectDate2', 'ApiDentist_calanderController@selectDay2')->name('selectDay2');
Route::get('selectDate3', 'ApiDentist_calanderController@selectDay3')->name('selectDay3');
Route::get('getServices', 'ApiDentist_calanderController@getServices')->name('getServices');
Route::get('NotificationByDentist', 'ApiNotificationController@NotificationByDentist')->name('NotificationByDentist');
Route::get('NotificationByUser', 'ApiNotificationController@NotificationByUser')->name('NotificationByUser');


//Dentist resrvation
//upcoming accepted reservation for dentist



    Route::get('/dUAReservation','ApiEventController@Upcoming_Reserv_acceptedD')->name('upcommingAcceptedReservation');
	//Next Reservation 
	  Route::get('/dUReservation','ApiEventController@Upcoming_Reserv_D')->name('upcommingReservation');
	// Pending reservation for dentist
    Route::get('/dPReservation','ApiEventController@pending_ReservD')->name('PendingReservation');
	// pervious reservation for dentist
  Route::get('/dprevReservation','ApiEventController@prev_ReservD')->name('prevReservationD');   
  Route::get('/accepet/{id}', 'ApiEventController@accepet')->name('accepetReservation'); 
  Route::get('/Neglect/{id}', 'ApiEventController@neglect')->name('neglectReservation'); 
  Route::get('/approve/{id}', 'ApiEventController@approveArrival')->name('approveArrival'); 
  
  Route::post('/addReservation', 'ApiEventController@store')->name('createReservation'); 
  
  
  //offer
 Route::get('/offers', 'ApiOfferController@index')->name('getOffers'); 
 Route::get('/getclinics', 'ApiOfferController@getclinics')->name('getclinics');
  Route::get('/details', 'ApiOfferController@details')->name('offerDetails');  
  
   Route::get('/getcategories', 'ApiOfferController@getcategories')->name('getcategories');
   
    Route::get('/getcategoriesbyclinic/{id}', 'ApiOfferController@getcategoriesbyclinic')->name('getcategoriesbyclinic');
    
     Route::get('/getcatservicesbyclinic/{id}', 'ApiOfferController@getcatservicesbyclinic')->name('getcatservicesbyclinic');
     
       Route::get('/getservicesbyclinic/{id}', 'ApiOfferController@getservicesbyclinic')->name('getservicesbyclinic');
   
    Route::get('/bookedoffers/{user}', 'ApiOfferController@bookedoffers')->name('bookedoffers');
    
     Route::get('/bookedservices/{user}', 'ApiOfferController@bookedservices')->name('bookedservices');
   
    Route::get('/getoffers', 'ApiOfferController@getoffers')->name('getoffers'); 
    
    Route::get('/getoffersbyclinic/{id}', 'ApiOfferController@getoffersbyclinic')->name('getoffersbyclinic');
    
     Route::post('/bookoffer', 'ApiOfferController@bookoffer')->name('bookoffer'); 
     
     Route::post('/bookservice', 'ApiOfferController@bookservice')->name('bookservice'); 
     
    
    Route::get('/offerNeglect/{id}', 'ApiOfferController@offerNeglect')->name('neglectoffer'); 
    Route::get('/serviceNeglect/{id}', 'ApiOfferController@serviceNeglect')->name('serviceNeglect'); 
    
    
    
    Route::get('/getcities', 'ApiOfferController@getcities')->name('getcities'); 
  
  //services
 Route::get('/services', 'ApiServiceController@index')->name('getservices'); 
  Route::get('/hospitalsByServic', 'ApiServiceController@hospitalByService')->name('gethospitalByservices');  
  Route::get('/hospitals', 'ApiServiceController@hospitals')->name('gethospitals');  
  Route::get('/servicesByCode', 'ApiServiceController@servicesByCode')->name('servicesByCode');  
  Route::get('/searchBycode', 'ApiServiceController@searchBycode')->name('searchBycode');  
 
 