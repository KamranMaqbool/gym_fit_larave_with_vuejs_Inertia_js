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
	Route::get('/leads/add',[App\Http\Controllers\LeadController::class, 'create'])->name('lead.add');
	Route::get('/leads/list',[App\Http\Controllers\LeadController::class, 'index'])->name('lead.list');
	Route::get('/leads/view/{lead}',[App\Http\Controllers\LeadController::class, 'view'])->name('lead.view');
	Route::post('/leads/save',[App\Http\Controllers\LeadController::class, 'save']);
	Route::post('/leads/update',[App\Http\Controllers\LeadController::class, 'update'])->name('lead.update');

	Route::get('/leads/view/{lead}/reminder/add',[App\Http\Controllers\ReminderController::class, 'create'])->name('reminder.add');
	Route::post('/leads/view/reminder/save',[App\Http\Controllers\ReminderController::class, 'store'])->name('reminder.save');
	Route::get('/leads/view/{lead}/reminder/{reminder}/view',[App\Http\Controllers\ReminderController::class, 'view'])->name('reminder.view');
	Route::post('/leads/view/reminder/update',[App\Http\Controllers\ReminderController::class, 'updateOrCreate'])->name('reminder.update');
	Route::post('/leads/view/reminder/close',[App\Http\Controllers\ReminderController::class, 'close'])->name('reminder.close');
	Route::get('/leads/view/{lead}/reminder/{reminder}/note',[App\Http\Controllers\ReminderController::class, 'addNote'])->name('reminder.note');

	Route::get('/leads/subscribe/{lead}',[App\Http\Controllers\LeadSubscriberController::class, 'view'])->name('lead.subscribe');
	Route::post('leads/subscribe/save',[App\Http\Controllers\LeadSubscriberController::class, 'store'])->name('lead.subscribe.add');

	Route::get('/packages/list',[App\Http\Controllers\PackageController::class, 'index'])->name('package.list');
	Route::post('/packages/save',[App\Http\Controllers\PackageController::class, 'store'])->name('package.save');
	Route::get('/packages/view/{package}',[App\Http\Controllers\PackageController::class, 'view'])->name('package.view');
	Route::post('/packages/update',[App\Http\Controllers\PackageController::class, 'update'])->name('package.update');

	Route::get('/subscribers/list',[App\Http\Controllers\SubscriberController::class,'index'])->name('subscribers.list');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
