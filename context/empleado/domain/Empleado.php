<?php

class Empleado {
    public int $id;
    public String $nombre;
    public int $edad;
    public String $departamento;

    public function __construct($id, $nombre, $edad, $departamento)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->departamento = $departamento;
    }

    public static function fromArray(array $array): Empleado {
        return new Empleado(
            $array['id'],
            $array['nombre'],
            $array['edad'],
            $array['departamento']
        );
    }

}