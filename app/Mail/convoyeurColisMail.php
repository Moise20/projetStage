<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class convoyeurColisMail extends Mailable
{
    use Queueable, SerializesModels;

    public $infoUser;
    public $nom;
    public $poids;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nom,$poids,$infoUser)
    {
        $this->nom = $nom;
        $this->poids=$poids;
        $this->infoUser =$infoUser;
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
        ->view('mails.convoyeurColisView')
        ->text('mails.convoyeurColisView_text');
        
    }
}
