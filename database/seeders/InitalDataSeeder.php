<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lead;
use App\Models\Reminder;
use Carbon\Carbon;

class InitalDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lead::create([
        	'name' => 'user1',
        	'email' => 'user1@gmail.com',
        	'phone' => '+9212345678',
        	'interested_package' => 'Annual Plan',
        	'dob' => Carbon::now(),
        	'age' => Carbon::parse('01/24/1994')->age,
        	'branch_id' => 1,
        	'added_by' => 1,
        ]);
        Lead::create([
        	'name' => 'user2',
        	'email' => 'user2@gmail.com',
        	'phone' => '+921235896',
        	'interested_package' => 'Annual Plan',
        	'dob' => Carbon::now(),
        	'age' => Carbon::parse('02/24/1993')->age,
        	'branch_id' => 1,
        	'added_by' => 1,
        ]);
        Lead::create([
        	'name' => 'user3',
        	'email' => 'user3@gmail.com',
        	'phone' => '+9212345988',
        	'interested_package' => 'Annual Plan',
        	'dob' => Carbon::now(),
        	'age' => Carbon::parse('03/25/1992')->age,
        	'branch_id' => 1,
        	'added_by' => 1,
        ]);
        Lead::create([
        	'name' => 'user4',
        	'email' => 'user4@gmail.com',
        	'phone' => '+9212348898',
        	'interested_package' => 'Monthly Plan',
        	'dob' => Carbon::now(),
        	'age' => Carbon::parse('01/01/1991')->age,
        	'branch_id' => 1,
        	'added_by' => 1,
        ]);

        Reminder::create([
        	'lead_id' => 4,
        	'user_id' => 1,
        	'reminder' => 'call to check on the membership',
        	'reminder_date' => Carbon::now()->subDays(3),
        	'note' => 'Customer asked to call again after 2 days',
        	'status' => 'completed',
        ]);
        Reminder::create([
        	'lead_id' => 2,
        	'user_id' => 1,
        	'reminder' => 'call to check on the membership',
        	'reminder_date' => Carbon::now()->addDays(2),
        	'note' => 'Customer asked to call again after 2 days',
        	'status' => 'pending',
        ]);
        Reminder::create([
        	'lead_id' => 2,
        	'user_id' => 1,
        	'reminder' => 'call to check on the membership',
        	'reminder_date' => Carbon::now()->addDays(2),
        	'note' => 'Customer asked to call again after 2 days',
        	'status' => 'pending',
        ]);
    }
}
