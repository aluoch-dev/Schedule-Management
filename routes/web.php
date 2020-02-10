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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login')->name('login');

Route::resource('users', 'UserController');

Route::resource('appointments', 'AppointmentController');

Route::resource('customers', 'CustomerController');
                   
Route::resource('systems', 'SystemController');

Route::resource('tasks', 'TaskController');

//Assign routes
Route::resource('assigns', 'AssignController');

//search 
Route::any('/search/results',function(){
    $q = Input::get ( 'q' );
    $appointment = Appointment::where('customer_name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    if(count($appointment) > 0)
        return view('appointment.search')->withDetails($user)->withQuery ( $q );
    else return view ('appointment.search')->withMessage('No Details found. Try to search again !');
});

Auth::routes();
Route::get('/home', 'AppointmentController@index');

//setting the home page to prevent backhistory after log out
Route::group(['middleware' => 'auth', 'PreventBackHistory'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
}); 

//Route::any('/appointments/{id}', 'AssignController@create')->name('assign');
   
Route::get('/ajax-email', function(){

    $user_id =Input::get('user_id');

    $users= User::where('user_id', '=', user_id)->get();
    return Response::json($users);
});
 