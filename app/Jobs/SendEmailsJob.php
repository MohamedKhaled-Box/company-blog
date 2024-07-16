<?php

namespace App\Jobs;

use App\Mail\SendMail;
use App\Models\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail as sendEmail;

class SendEmailsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $subject;
    protected $body;
    protected $offset;

    /**
     * Create a new job instance.
     */
    public function __construct($subject, $body, $offset)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->offset = $offset;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $subscribers = Mail::skip($this->offset)->take(25)->get();
        foreach ($subscribers as $subscriber) {
            SendEmail::to($subscriber->mail)->send(new SendMail($this->subject, $this->body));
        }
    }
}
