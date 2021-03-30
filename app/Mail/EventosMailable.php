<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventosMailable extends Mailable 
{
    use Queueable, SerializesModels;
    
    public $subject = 'Evento Nuevo';
    public $Datos;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Datos)
    {
        $this->Datos = $Datos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Emails.Evento');
    }
}
