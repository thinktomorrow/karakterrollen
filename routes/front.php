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
Route::get('/', function(){
    return view('pages.dashboard');
});
Route::get('/mail', function(){
    return view('mails.register');
});
Route::get('/samenstelling', ['as' => 'pages.dashboard',function() {
    return view('pages.dashboard');
}]);
Route::get('/teamleden', ['as' => 'pages.members',function() {
    return view('pages.members');
}]);
Route::get('/informatie', ['as' => 'pages.info',function() {
    return view('pages.info');
}]);



Route::post('/contact/store', ['as' => 'contact.store', 'uses' => ContactFormController::class.'@store'])->middleware('honeypot');

Route::get('/contact/thanks', ['as' => 'contactform.thanks', function(){
    if(session()->has('submitted')){
        return view('pages.contact.thanks');
    }else{
        return redirect()->to(route('pages.show', '/'));
    }
}]);
