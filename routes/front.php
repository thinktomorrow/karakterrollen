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
    return view('pages/home');
});

Route::post('/contact/store', ['as' => 'contact.store', 'uses' => ContactFormController::class.'@store'])->middleware('honeypot');

Route::get('/contact/thanks', ['as' => 'contactform.thanks', function(){
    if(session()->has('submitted')){
        return view('pages.contact.thanks');
    }else{
        return redirect()->to(route('pages.show', '/'));
    }
}]);
