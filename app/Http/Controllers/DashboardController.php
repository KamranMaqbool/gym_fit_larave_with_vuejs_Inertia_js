<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Reminder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    	$reminders = Reminder::query()
    				->with(['lead'])
    				->where('reminders.reminder_date',now()->format('Y-m-d'))
    				->where('reminders.status','pending')
    				->where('user_id',\Auth::user()->id)
    				->get();
    	$data = [
    		'name' => 'kamran Maqbool',
    		'degree' => 'BSIT',
    		'contact' => '+92 343 6744420',
    		'reminders' => $reminders,
    	];


    	return Inertia::render('Dashboard/index',$data);
    }
}
