<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Ad;

class PotentialAdoption extends Mailable
{
    use Queueable, SerializesModels;

    public $ad;
    public $email;
    public $poruka;

    /**
     * Create a new poruka instance.
     *
     * @return void
     */
    public function __construct(Ad $ad, $email, $poruka)
    {
        $this->ad = $ad;
        $this->email = $email;
        $this->poruka = $poruka;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
    {
        return $this->from($this->email)
                    ->subject('Potencijalni udomitelj » Udomi.net')
                    ->view('emails.contact');
    }
}
