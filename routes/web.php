<?php
use App\Rank;
use App\Cadre;
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


	// ADMIN PROCESSES GOES HERE
	Route::get('/administrator', 'AdminController@dashboard')->name('adminDashboard')->middleware('checkAdmin');
	Route::get('/administrator/applicants', 'AdminController@applicants')->name('applicants')->middleware('checkAdmin');



});