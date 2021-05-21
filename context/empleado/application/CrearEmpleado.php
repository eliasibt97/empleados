<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/empleados/context/empleado/infrastructure/EmpleadoRepository.php';

class CrearEmpleado {

    private $repository;

    public function __construct() {
        if(!$this->repository) $this->repository = new EmpleadoReository();
        return $this->repository;
    }

    public function run(array $data) {
        return $this->repository->crearEmpleado($data);
    }
}