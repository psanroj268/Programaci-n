<?php

/**
 * Pablo Sánchez Rojas
 */

class Usuario
{
    private $idUsu;
    private $email;
    private $clave;
    private $nombre;
    private $apellido;

    /**
     * Indica que propiedades deben serializarse
     *
     * @return array
     */
    public function __sleep() {
        return ["idUsu", "email", "nombre", "apellido"] ;
    }

    public function getIdUsu() {
        return $this->idUsu;
    }

    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Se invoca automaticamente cuando se hace una deserialización
     * 
     */
    public function __wakeup()
    {
        
    }
}
