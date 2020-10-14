<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SubscriberController extends Controller
{
    public function index()
    {
    	$subscribers = \App\Models\Subscriber::query()
    					->orderBy('renewal_date')
    					->paginate(2);

    	return Inertia::render('Subscribers/index',[
    		'subscribers' => $subscribers,
    	]);
    }
}
