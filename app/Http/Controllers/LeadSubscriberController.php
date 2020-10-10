<?php

namespace App\Http\Controllers;
use App\Models\Lead;
use Inertia\Inertia;
use Illuminate\Http\Request;

class LeadSubscriberController extends Controller
{
    public function view(Lead $lead)
    {
    	info($lead);
    	$packages = \App\Models\Package::query()
                    ->whereStatus('active')
                    ->orderByDesc('id')
                    ->get();
                    
    	return Inertia::render("Subscribers/SubscriberAdd",[
    		'lead' => $lead,
    		'packages' => $packages,
    	]);
    }
}
