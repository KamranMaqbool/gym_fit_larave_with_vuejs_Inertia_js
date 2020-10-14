<?php

namespace App\Http\Controllers;
use App\Models\Lead;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Subscriber;

class LeadSubscriberController extends Controller
{
    public function view(Lead $lead)
    {
    	$packages = \App\Models\Package::query()
                    ->whereStatus('active')
                    ->orderByDesc('id')
                    ->get();
                    
    	return Inertia::render("Subscribers/SubscriberAdd",[
    		'lead' => $lead,
    		'packages' => $packages,
    	]);
    }

    public function store(Request $request)
    {
        info('at Store');
        $post_data = $this->validate($request,[
            'name' => 'required',
            'package_id' => 'required|exists:packages,id',
            'lead_id' => 'required|exists:leads,id',
            'renewal_date' => 'required|date|date_format:"Y-m-d"',
            'amount' => 'required',
        ]);   

        $package = \App\Models\Package::find($post_data['package_id']);
        $lead = \App\Models\Lead::find($post_data['lead_id']);

        Subscriber::create([
            'lead_id' => $post_data['lead_id'],
            'package_id' => $post_data['package_id'],
            'renewal_date' => now()->addDays($package->number_of_days)->format('Y-m-d'),
            'amount' => $package->amount,

            'name' => $lead['name'],
            'email' => $lead['email'],
            'phone' => $lead['phone'],
            'age' => $lead['age'],
            'dob' => $lead['dob'],
            'branch_id' => $lead['branch_id'],
            'added_by' => $lead['added_by'],
            'interested_package' => $package->name,
        ]);

        $lead->active = 0;
        $lead->save();

        return redirect()->route('lead.subscribe',[
            'lead' => $lead,
        ])->with('success','Subscriber Added');
    }
}
