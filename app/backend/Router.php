<?php

require '../../context/empleado/application/CrearEmpleado.php';
require '../../context/empleado/application/ObtenerEmpleados.php';
require '../../context/empleado/application/ObtenerEmpleado.php';
require '../../context/empleado/application/ActualizarEmpleado.php';
require '../../context/empleado/application/EliminarEmpleado.php';
require '../../context/shared/http/Response.php';

class Router {

    private $response;
    private $createEmpleado;
    private $getEmpleado;
    private $getEmpleados;
    private $updateEmpleado;
    private $deleteEmpleado;

    public function __construct()
    {
        if(!$this->response) $this->response = new Response();
        if(!$this->createEmpleado) $this->createEmpleado = new CrearEmpleado();
        if(!$this->getEmpleado) $this->getEmpleado = new ObtenerEmpleado();
        if(!$this->getEmpleados) $this->getEmpleados = new ObtenerEmpleados();
        if(!$this->updateEmpleado) $this->updateEmpleado = new ActualizarEmpleado();
        if(!$this->deleteEmpleado) $this->deleteEmpleado = new EliminarEmpleado();
    }

    public function crearEmpleado($data) {
        $empleado = $this->createEmpleado->run($data);
        if(!$empleado <= 0) return $this->response->not_results_found();

        return $this->response->ok();
    }

    public function obtenerEmpleado($id) {
        $empleado = $this->getEmpleado->run($id);
        if(!$empleado) return $this->response->not_results_found();

        return $this->response->ok('empleado', $empleado);
    }

    public function obtenerEmpleados() {
        $empleados = $this->getEmpleados->run();
        if(!$empleados) return $this->response->not_results_found();
        
        return $this->response->ok('empleados', $empleados);
    }

    public function updateEmpleado($data) {
        $empleado = $this->updateEmpleado->run($data);
        if(!$empleado) return $this->response->not_results_found();

        return $this->response->ok('empleado', $empleado);
    }
    
    public function eliminarEmpleado($id){
        $eliminado = $this->deleteEmpleado->run($id);
        if(!$eliminado) return $this->response->internal_error();
    
        return $this->response->ok('data', []);

    }

}