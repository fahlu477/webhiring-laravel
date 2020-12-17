<?php

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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about','AboutController@index')->name('about');
Route::get('/fasilitas','FasilitasController@index')->name('fasilitas');
Route::get('/kontak','KontakController@index')->name('kontak');
// Career
Route::resource('career','CareerController')->only(['index', 'show']);
// User
Route::resource('user', 'UserController')->only(['index', 'store'])->middleware('auth');
Route::get('/user/apply', 'UserController@apply')->name('user.apply')->middleware('auth', 'verified');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin', 'as' => 'admin.'], static function(){
    // Home
    Route::get('/','HomeController@index')->name('home');
    // User
    Route::resource('user','UserController');
    Route::get('user/_/data-table/', 'UserController@user')->name('user.data_table');
    // Experience
    Route::resource('experience','ExperienceController');
    Route::get('experience/_/data-table', 'ExperienceController@experience')->name('experience.data_table');
    // Program Studies
    Route::resource('program-study','ProgramStudyController')->names('program_study');
    Route::get('program-study/_/data-table', 'ProgramStudyController@dataTable')->name('program_study.data_table');
    // Job
    Route::resource('job','JobController');
    Route::get('job/_/data-table', 'JobController@dataTable')->name('job.data_table');
    // Apply
    Route::resource('apply','ApplyController')->only(['index', 'show']);
    Route::get('apply/_/data-table', 'ApplyController@apply')->name('apply.data_table');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
