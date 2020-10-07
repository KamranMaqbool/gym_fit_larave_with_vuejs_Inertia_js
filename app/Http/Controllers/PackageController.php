<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Package;

class PackageController extends Controller
{

    private $validations;

	public function __construct()
	{
		$this->validations = [
			'name' => 'required',
			'amount' => 'required|numeric|min:1',
			'number_of_days' => 'required|min:1',
		];
	}
    public function index()
    {
    	$packages = \App\Models\Package::query()
    				->whereStatus('active')
    				->orderBy('number_of_days','asc')
    				->get();

    	info($packages);

		return Inertia::render("Packages/index",[
			'active_packages' => $packages,
		]);    	 
    }

    public function store(Request $request)
    {
    	$post_data = $this->validate($request,$this->validations);

    	$post_data['status'] = 'active';

    	\App\Models\Package::create($post_data);

    	return redirect()->route('package.list');
    }

    public function view(Package $package)
    {
    	return Inertia::render("Packages/View",[
    		'active_package' => $package,
    	]);
    }

    public function update(Request $request)
    {
    	$rules = $this->validations;
    	$rules['id'] = 'required|exists:packages,id';

    	$post_data = $this->validate($request,$rules);

    	$package = Package::find($post_data['id']);
    	$package->name = $post_data['name'];
    	$package->amount = $post_data['amount'];
    	$package->number_of_days = $post_data['number_of_days'];
    	$package->save();

    	return redirect()->route('package.list');
    }
}
