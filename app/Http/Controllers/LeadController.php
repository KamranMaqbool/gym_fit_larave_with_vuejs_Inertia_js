<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class LeadController extends Controller
{
    public function create()
    {
    	return Inertia::render('Leads/Add');
    }
}
