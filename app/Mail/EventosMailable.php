<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventosMailable extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    
    public $txtsubject;
    public $txtDatos;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$Datos)
    {
        $this->txtDatos = $Datos;
        $this->txtsubject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                ->subject('Se ha creado un nuevo evento - '. config('app.name'))
                ->markdown('Emails.evento');
    }
}
