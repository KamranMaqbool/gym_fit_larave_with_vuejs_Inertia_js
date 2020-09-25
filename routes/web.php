<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[App\Http\Controllers\WelcomeController::class, 'index']);

Route::group(['middleware' => 'auth'],function(){
	Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'index'])->name('dash');
	Route::get('/leads/add',[App\Http\Controllers\LeadController::class, 'create']);
	Route::get('/leads/list',[App\Http\Controllers\LeadController::class, 'index'])->name('lead.list');
	Route::get('/leads/view/{lead}',[App\Http\Controllers\LeadController::class, 'view'])->name('lead.view');
	Route::post('/leads/save',[App\Http\Controllers\LeadController::class, 'save']);
	Route::post('/leads/update',[App\Http\Controllers\LeadController::class, 'update'])->name('lead.update');

	Route::get('/leads/view/{lead}/reminder/add',[App\Http\Controllers\ReminderController::class, 'create'])->name('reminder.add');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
