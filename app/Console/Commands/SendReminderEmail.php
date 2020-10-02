<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;

class SendReminderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email notification to user about reminders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reminders = \App\Models\Reminder::query()
                ->with(['lead'])
                ->where('status','pending')
                ->where('reminder_date',now()->format('Y-m-d'))
                ->orderBy('user_id')
                ->get();

        info($reminders);
        $data = [];
        foreach ($reminders as $key => $reminder) {
            $data[$reminder->user_id][] = $reminder->toArray();
        }

        foreach ($data as $user_id => $reminders) {
            $this->sendEmailToUser($user_id,$reminders);
        }

        info($data);
        dd($data);
    }

    public function sendEmailToUser($user_id,$reminders)
    {
        $user = \App\Models\User::find($user_id);

        Mail::to($user)->send(new \App\Mail\ReminderEmailDigest($reminders));
    }
}
