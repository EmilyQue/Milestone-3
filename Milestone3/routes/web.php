<?php
//Milestone 1
//Login Module
//Emily Quevedo
//January 20, 2019
//This is my own work

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

Route::get('/', function () {
    return view('welcome');
});

/*Route is mapped to the '/register' URI and will return the Register view */
Route::get('/register', function() {
    return view('register');
});
        
/*Fetches the post parameters of registration*/
Route::post('/register', 'RegistrationController@index');
      
/*Route is mapped to the '/login' URI and will return the Login view */
Route::get('login', function () {
    return view('login');
        });
      
/*Fetches the post parameters of login*/
Route::post('/login', 'LoginController@index');

Route::get('/logout', 'LoginController@logout');

/*temporary route that is mapped to the '/start' URI and will return the job list view*/
Route::get('start', function() {
    return view('jobList');
});
        
/* Route is mapped to the '/profile' URI and will return the user Profile view*/
Route::get('/profile', 'ProfileController@findProfile');


/*  USER CONTACT INFO   */
/*Route is mapped to the '/contact' URI and will return the contact info form*/
Route::get('/contact', function() {
    return view('contact');
});
    
/*Fetches the post parameters of user contact info*/
Route::post('/contact', 'ProfileController@createContactInfo');

/*Route is mapped to the '/editContact' URI and will return the edit contact info form */
Route::get('/editContact', 'ProfileController@findContactInfo');

/*Fetches the post parameters of updated user contact info*/
Route::post('/updateContact', 'ProfileController@updateContactInfo');

/*Fetches the get parameters of deleteContact method in Profile controller*/
Route::get('/deleteContact', 'ProfileController@deleteContact');


/*  USER EDUCATION   */
/*Route is mapped to the 'education' URI and will return new education form*/
Route::get('/education', function() {
    return view('education');
});

/*Fetches post parameters of new education*/
Route::post('education', 'ProfileController@createEducation');
    
/*Route is mapped to the 'editEducation' URI and will return edit education form*/
Route::get('/editEducation', 'ProfileController@findEducation');

/*Fetches post parameters of updated user education*/
Route::post('updateEducation', 'ProfileController@updateEducation');

/*Fetches get parameters of deleteEducation method in Profile controller*/
Route::get('/deleteEducation', 'ProfileController@deleteEducation');


/*  USER SKILLS   */
/*Route is mapped to the 'skills' URI and will return new skills form*/
Route::get('/skills', function() {
    return view('skills');
});
    
/*Fetches post parameters of new skills*/
Route::post('skills', 'ProfileController@createSkills');
    
/*Route is mapped to the 'editSkills' URI and will return edit skills form */
Route::get('/editSkills', 'ProfileController@findSkills');

/*Route is mapped to the 'updateSkills' URI and will return a form to edit skills*/
Route::get('/updateSkills', function() {
    return view('editSkills');
});
    
/*Fetches post parameters of updated skills*/
Route::post('/updateSkills', 'ProfileController@updateSkill');

/*Fetches get parameters of deleteSkill method in Profile controller*/
Route::get('/deleteSkills', 'ProfileController@deleteSkill');


/*  USER JOB HISTORY  */
/*Route is mapped to the 'jobHistory' URI and returns the job history form */
Route::get('/jobHistory', function() {
    return view('jobHistory');
});

/*Fetches post parameters of new job history */
Route::post('/jobHistory', 'ProfileController@createJobHistory');

/*Route is mapped to the 'editHistory' URI and will return edit job history form*/
Route::get('/editHistory', 'ProfileController@findJobHistory');

/*Fetches post parameters of updated job history*/
Route::post('/updateHistory', 'ProfileController@updateJobHistory');

/*Fetches get parameters of deleteHistory method in Profile controller*/
Route::get('/deleteHistory', 'ProfileController@deleteJobHistory');


/*  ADMIN JOB POSTING   */
/*Route is mapped to the 'jobPosting' URI and will return the job post form*/
Route::get('jobPosting', function() {
    return view('jobPosting');
});

/*Fetches post parameters of new job posting*/
Route::post('jobPosting', 'AdminController@addJobPosting');

/*Fetches the get parameters of job post admin*/
Route::get('/jobAdmin', 'AdminController@displayAllJobs');

/*Fetches the get parameters of jobDelete method in Admin controller*/
Route::get('/jobDelete', 'AdminController@deleteJob');

/*Fetches the get parameters of jobEdit method in Admin controller*/
Route::get('/jobEdit', 'AdminController@findJobPosting');

/*Fetches the post parameters of jobUpdate method in Admin controller*/
Route::post('/jobUpdate', 'AdminController@updateJobPosting');

/*  ADMIN USERS   */
/*Fetches the get parameters of users admin*/
Route::get('/usersAdmin', 'AdminController@index');

/*Fetches the get parameters of deleteUser method in the Admin controller*/
Route::get('/adminDelete', 'AdminController@deleteUser');

/*Fetches the get parameters of suspendUser method in the Admin controller*/
Route::get('/adminSuspend', 'AdminController@suspendUser');

/*Fetches the get parameters of unsuspendUser method in the Admin controller*/
Route::get('/adminUnsuspend', 'AdminController@unsuspendUser');
