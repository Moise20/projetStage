<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvoiFactureTrajetClient extends Mailable
{
    use Queueable, SerializesModels;

    public $infoFacture;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($infoFacture)
    {
        $this->infoFacture = $infoFacture;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Vous avez un nouveau message')
        ->view('mails.envoiFactureTrajetView')
        ->text('mails.envoiFactureTrajetView_text');
        
    }
}
