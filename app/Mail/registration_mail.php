<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Http\Controllers\CustomerController;
use Illuminate\Queue\SerializesModels;

class registration_mail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        $this->input=$input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->to($email);
        return $this
        ->subject('Mail from CustomerSite')
        ->view('emails.registrationmail')
        ->with('input', $this->input);
    }
}
