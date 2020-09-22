<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Lead;

class LeadController extends Controller
{
    public function create()
    {
    	return Inertia::render('Leads/Add');
    }

    public function index()
    {
    	$leads = \App\Models\Lead::query()
    			->where('branch_id',1)
    			->orderByDesc('id')
    			->get();

    	return Inertia::render('Leads/Index',[
    		'leads' => $leads,
    	]);
    }

    public function save(Request $request)
    {
    	$data = $this->validate($request,[
    		'name' => 'required',
    		'email' => 'required|email',
    		'phone' => 'required',
    		'dob' => 'required',
    	]);

    	$pacakge='';
    	if($request->has('interested_package')){
    		$package = $request->input('interested_package');
    	}

    	\App\Models\Lead::create([
    		'name' => $data['name'],
    		'email' => $data['email'],
    		'phone' => $data['phone'],
    		'dob' => $data['dob'],
    		'interested_package' => $package,
    		'branch_id' => 1,
    		'added_by' => \Auth::user()->id,
    	]);

    	return redirect()->route('lead.list');
    }

    public function view(Lead $lead)
    {
        return Inertia::render('Leads/View',[
            'lead-prop' => $lead,
        ]);
    }
}
