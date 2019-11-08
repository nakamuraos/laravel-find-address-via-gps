<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailActivation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The data object instance.
     *
     * @var Data
     */
    public $data;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@diachi.best')
                    ->subject('Activation Your Account')
                    ->view('common.mails.activation')
                    ->text('common.mails.activation_plain');
    }
}