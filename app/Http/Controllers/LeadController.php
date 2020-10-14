<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Lead;
use Carbon\Carbon;

class LeadController extends Controller
{

    private $validations;
    
    public function __construct()
    {
        $this->validations = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'dob' => 'required',
            'interested_package' => 'sometimes',
        ];
    }
    public function create()
    {
        $packages = \App\Models\Package::query()
                    ->whereStatus('active')
                    ->orderByDesc('id')
                    ->get();

    	return Inertia::render('Leads/Add',[
            'packages' => $packages,
        ]);
    }

    public function index()
    {
    	$leads = \App\Models\Lead::query()
    			->where('active',1)
                ->where('branch_id',1)
    			->orderByDesc('id')
    			->paginate(5);

    	return Inertia::render('Leads/Index',[
    		'leads' => $leads,
    	]);
    }

    public function save(Request $request)
    {
    	$data = $this->validate($request,$this->validations);

    	$pacakge='';
    	if($request->has('interested_package')){
    		$package = $request->input('interested_package');
    	}

        $dob = Carbon::parse($data['dob']);
        $age = $dob->age;

    	\App\Models\Lead::create([
    		'name' => $data['name'],
    		'email' => $data['email'],
    		'phone' => $data['phone'],
    		'dob' => $dob,
            'age' => $age,
    		'interested_package' => $package,
    		'branch_id' => 1,
    		'added_by' => \Auth::user()->id,
    	]);

    	return redirect()->route('lead.list');
    }

    public function view(Lead $lead)
    {
        $lead->load(['reminders']);

        $packages = \App\Models\Package::active()->get();

        return Inertia::render('Leads/View',[
            'lead-prop' => $lead,
            'packages' => $packages,
        ]);
    }

    public function update(Request $request)
    {
        $rules = $this->validations;
        $rules['id'] = 'required|exists:leads';

        $postData = $this->validate($request,$rules);
        $postData['age'] = Carbon::parse($postData['dob'])->age;

        $lead = Lead::whereId($postData['id'])->update($postData);

        return redirect()->route('lead.list',['lead' => $postData['id']]);
    }
}
