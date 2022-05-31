<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewProductMailToSubscribers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $subscribersInfo, $product;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subscribersInfo, $product)
    {
        $this->subscribersInfo  = $subscribersInfo;
        $this->product          = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Send Email:
        $emails             = $this->subscribersInfo->email;
        $product            = $this->product;

        foreach ($emails as $email) {
            Mail::send('admin.emails.new_product', $product, function ($message) use ($email) {
                $message->to($email)->subject(__('emails.new_product'));
            });
        }
    }
}