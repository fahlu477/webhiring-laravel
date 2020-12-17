<?php

namespace App\Jobs;

use App\Mail\JobApplied;
use App\Models\Job;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class SendEmailApplyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $job_models, $user;

    /**
     * Create a new job instance.
     *
     * @param Job $job
     * @param User $user
     */
    public function __construct(Job $job, User $user)
    {
        $this->job_models = $job;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user)->send(new JobApplied($this->job_models, $this->user));
    }
}
