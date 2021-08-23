<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Facture extends Mailable
{
    use Queueable, SerializesModels;

    public $qrcode;
    public $infoFacture;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($qrcode ,$infoFacture)
    {
        $this->qrcode =$qrcode;
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
        ->view('mails.factureView')
        ->text('mails.factureView_text');
       
    }
}
