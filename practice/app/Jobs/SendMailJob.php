<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ReminderMail;
use Throwable;


class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $users;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($usr)
    {
        $this->users = $usr;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $user = ['email' => 'surendar21094@gmail.com', 'name' => 'Surendar', 'id' => 1];
        $to = "surendar021094@gmail.com";
        $cc = "surendar21094@zoho.com";
        $bcc = "surendar21094@outlook.com";

        /* Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('surendar02101994@gmail.com', 'Your Application');
            $m->to($user['email'], $user['name'])->subject('Your Reminder!');
        }); */

        Log::channel('db')->error('Job Queue execute');

        /* $message = (new ReminderMail($this->users))
        ->onQueue('emails');

        Mail::to($to)->queue($message); */

        Mail::to($to)->send(new ReminderMail($this->users));
    }

    /* public function failed(Throwable $exception)
    {
        echo $exception->getMessage();
        //error_log($exception->getMessage());
    } */
}
