<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductoCreado extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $precio;
    
    public function __construct($nombre,$precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nuevo producto ha sido creado')
                    ->view('mails.producto');
    }
}
