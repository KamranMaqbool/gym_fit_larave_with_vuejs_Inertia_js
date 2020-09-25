<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Lead;

class ReminderController extends Controller
{
    public function create(Lead $lead)
    {
    	return Inertia::render('Leads/LeadReminderAdd',[
    		'lead' => $lead,
    	]);
    }
}
