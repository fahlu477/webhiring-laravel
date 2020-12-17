<?php

namespace App\Mail;

use App\Models\Job;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApplied extends Mailable
{
    use Queueable, SerializesModels;

    protected $job, $user;

    /**
     * Create a new message instance.
     *
     * @param Job $job
     * @param User $user
     */
    public function __construct(Job $job, User $user)
    {
        $this->job  = $job;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $job  = $this->job;
        $user = $this->user;

        return $this->view('email.job_applied', compact('user', 'job'))
            ->subject('Thanks for applying to '. env('APP_NAME'));
    }
}
