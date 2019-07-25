<?php
use App\Rank;
use App\Cadre;
use App\State;
use App\Lga;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/get-lgoo/{id}', function($id) {
    $data = State::find($id)->lgas;
    return response()->json($data);
});

Route::get('/get-lgor/{id}', function($id) {
    $data = State::find($id)->lgas;
    return response()->json($data);
});

Route::get('/get-ranks/{cadre}', function($cadre) {
    $data = Cadre::find($cadre)->ranks;
    return response()->json($data);
});

Route::get('/', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);
// Auth::routes(['verify' => true]);
Route::get('/register', function () {
	return redirect('/#formArea');
})->name('register');

Route::get('/login', function () {
	return redirect('/#formArea');
})->name('login');


Route::post('/login',  'AuthController@login')->name('login');
Route::get('/logout',  'AuthController@logout')->name('logout');


Route::get('/applicant/get_users_by_rank/{id}', function ($id) {
	$users = Rank::find($id)->users;
	return $users;
});

Route::get('/applicant/get_users_by_cadre/{id}', function ($id) {
	$users = Cadre::find($id)->users;
	return $users;
});



// LOGGED IN PROCESSES START HERE


Route::get('/applicant', 'ApplicantController@index')->name('applicant');
Route::post('/applicant/image/store', 'ApplicantController@store')->name('storeImage');

// PRINT-OUT FORM 
Route::get('/applicant/printout/application-form', 'PrintoutController@applicationForm')->name('applicationForm');
Route::get('/applicant/printout/referee-form', 'PrintoutController@refereeForm')->name('refereeForm');

Route::middleware(['checkSubmitted'])->group(function () {

	Route::get('/applicant/personal-data', 'PersonalDataController@index')->name('showPersonal');
	Route::post('/applicant/personal-data/store', 'PersonalDataController@store')->name('storePersonal');


	Route::get('/applicant/contact-data', 'ContactDataController@index')->name('showContact');
	Route::post('/applicant/contact-data/store', 'ContactDataController@store')->name('storeContact');


	Route::get('/applicant/medical-data', 'MedicalDataController@index')->name('showMedical');
	Route::post('/applicant/medical-data/store', 'MedicalDataController@store')->name('storeMedical');


	Route::get('/applicant/next-of-kin-data', 'NOKDataController@index')->name('showNOK');
	Route::post('/applicant/next-of-kin-data/store', 'NOKDataController@store')->name('storeNOK');
	Route::delete('/applicant/next-of-kin-data/delete/{id}', 'NOKDataController@destroy')->name('deleteNextofkin');


	Route::get('/applicant/primary-school', 'PrimaryDataController@index')->name('showPrimary');
	Route::post('/applicant/primary-school/store', 'PrimaryDataController@store')->name('storePrimary');
	Route::delete('/applicant/primary-school/delete/{id}', 'PrimaryDataController@destroy')->name('deletePrimary');


	Route::get('/applicant/secondary-school', 'SecondaryDataController@index')->name('showSecondary');
	Route::post('/applicant/secondary-school/store', 'SecondaryDataController@store')->name('storeSecondary');
	Route::delete('/applicant/secondary-school/delete/{id}', 'SecondaryDataController@destroy')->name('deleteSecondary');


	Route::get('/applicant/tertiary-institution', 'TertiaryDataController@index')->name('showTertiary');
	Route::post('/applicant/tertiary-institution/store', 'TertiaryDataController@store')->name('storeTertiary');
	Route::delete('/applicant/tertiary-institution/delete/{id}', 'TertiaryDataController@destroy')->name('deleteTertiary');



	Route::get('/applicant/certification', 'CertificationDataController@index')->name('showCertification');
	Route::post('/applicant/certification/store', 'CertificationDataController@store')->name('storeCertifiacation');
	Route::delete('/applicant/certification/delete/{id}', 'CertificationDataController@destroy')->name('deleteCertification');



	Route::get('/applicant/experience', 'ExperienceDataController@index')->name('showExperience');
	Route::post('/applicant/experience/store', 'ExperienceDataController@store')->name('storeExperience');
	Route::delete('/applicant/experience/delete/{id}', 'ExperienceDataController@destroy')->name('deleteExperience');



	Route::get('/applicant/review', 'ReviewDataController@index')->name('showReview')->middleware('checkCompleted');
	Route::post('/applicant/review/submit-application', 'ReviewDataController@store')->name('submitApplication');

});


// ADMIN PROCESSES GOES HERE
Route::post('administrator/applicants/shortListApplicants', 'AdminController@shortListApplicants')->name('shortListApplicants')->middleware('checkAdmin');
Route::get('/administrator', 'AdminController@dashboard')->name('adminDashboard')->middleware('checkAdmin');

Route::get('/administrator/applicants/gl-09', 'AdminController@showASCI')->name('showASCI')->middleware('checkAdmin');
Route::get('/administrator/applicants/gl-09/getData', 'AdminController@getASCI')->name('getASCI')->middleware('checkAdmin');


Route::get('/administrator/applicants/gl-08', 'AdminController@showASCII')->name('showASCII')->middleware('checkAdmin');
Route::get('/administrator/applicants/gl-08/getData', 'AdminController@getASCII')->name('getASCII')->middleware('checkAdmin');


Route::get('/administrator/applicants/gl-07', 'AdminController@showIC')->name('showIC')->middleware('checkAdmin');
Route::get('/administrator/applicants/gl-07/getData', 'AdminController@getIC')->name('getIC')->middleware('checkAdmin');


Route::get('/administrator/applicants/gl-06', 'AdminController@showAIC')->name('showAIC')->middleware('checkAdmin');
Route::get('/administrator/applicants/gl-06/getData', 'AdminController@getAIC')->name('getAIC')->middleware('checkAdmin');


Route::get('/administrator/applicants/gl-05', 'AdminController@showCAI')->name('showCAI')->middleware('checkAdmin');
Route::get('/administrator/applicants/gl-05/getData', 'AdminController@getCAI')->name('getCAI')->middleware('checkAdmin');


Route::get('/administrator/applicants/gl-04', 'AdminController@showCAII')->name('showCAII')->middleware('checkAdmin');
Route::get('/administrator/applicants/gl-04/getData', 'AdminController@getCAII')->name('getCAII')->middleware('checkAdmin');


Route::get('/administrator/applicants/gl-03', 'AdminController@showCAIII')->name('showCAIII')->middleware('checkAdmin');
Route::get('/administrator/applicants/gl-03/getData', 'AdminController@getCAIII')->name('getCAIII')->middleware('checkAdmin');


Route::get('/administrator/shortlisted', 'AdminController@showShortlisted')->name('showShortlisted')->middleware('checkAdmin');
Route::get('/administrator/shortlisted/getData', 'AdminController@getShortlisted')->name('getShortlisted')->middleware('checkAdmin');

// Route::get('administrator/getstates', function () {
// 	$states = State::all();
// 	$state_array = [];
// 	foreach($states as $state){
// 		// array_push($state_array, ucwords($state['state_name']));
// 		echo "'".ucwords($state['state_name'])."',";
// 	}
// 	// print_r($state_array);
// });