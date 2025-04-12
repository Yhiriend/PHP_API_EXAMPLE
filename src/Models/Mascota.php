<?php

namespace Models;

class Mascota
{
    public $id;
    public $nombre;
    public $tipo;
    public $edad;

    public function __construct($data)
    {
        $this->id = $data['id'] ?? uniqid();
        $this->nombre = $data['nombre'];
        $this->tipo = $data['tipo'];
        $this->edad = $data['edad'];
    }
}
