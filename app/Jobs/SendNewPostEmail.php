<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\NewPostEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendNewPostEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $incoming;
    /**
     * Create a new job instance.
     */
    public function __construct($incoming)
    {
        $this->incoming = $incoming;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->incoming['sendTo'])->send(new NewPostEmail(['title' => $this->incoming['title']]));

    }
}
