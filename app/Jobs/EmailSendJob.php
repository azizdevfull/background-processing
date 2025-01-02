<?php

namespace App\Jobs;

use App\Mail\SendEmailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class EmailSendJob implements ShouldQueue
{
    use Queueable;

    public $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // 10 soniya
        Mail::to($this->user->email)->send(new SendEmailNotification($this->user));
    }
}
