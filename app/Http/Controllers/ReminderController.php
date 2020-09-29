<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Lead;
use App\Models\Reminder;

class ReminderController extends Controller
{
    public function create(Lead $lead)
    {
    	return Inertia::render('Leads/LeadReminderAdd',[
    		'lead' => $lead,
    	]);
    }

    public function store(Request $request)
    {
    	$post_data = $this->validate($request,[
    		'reminder' => 'required|min:3',
    		'reminder_date' => 'required|date',
    		'lead_id' => 'required|exists:leads,id',
    	]);

    	$post_data['status'] = 'pending';
    	$post_data['user_id'] = $request->user()->id;

    	$lead = Lead::find($post_data['lead_id']);

    	$lead->reminders()->create($post_data);

    	return redirect()->route('lead.view',[$lead]);
    }

    public function view(Lead $lead, Reminder $reminder)
    {
    	return Inertia::render('Leads/ReminderView',[
    		'lead' => $lead,
    		'reminder' => $reminder,
    	]);
    }

    public function updateOrCreate(Request $request)
    {
        $post_data = $this->validate($request,[
            'reminder_id' => 'required|exists:leads,id'
        ]);

        $reminder = Reminder::find($request['reminder_id']);
        $reminder->status = 'completed';
        $reminder->save();

        $lead = Lead::find($reminder->lead_id);

        return redirect()->route('reminder.add',[
            'lead' => $lead,
        ]);
    }

    public function addNote(Lead $lead, Reminder $reminder)
    {
        return Inertia::render('Leads/ReminderNote',[
            'lead' => $lead,
            'reminder' => $reminder,
        ]);
    }

    public function close(Request $request)
    {
        $post_date = $this->validate($request,[
            'reminder_id' => 'required|exists:reminders,id', 
            'note' => 'required|min:3', 
        ]);

        $reminder = Reminder::find($request['reminder_id']);
        $reminder->status = 'completed';
        $reminder->save();

        $lead = Lead::find($reminder->lead_id);
        return redirect()->route('lead.view',[
            'lead' => $lead,
        ]);
    }
}
