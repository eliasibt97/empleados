<?php
require "Router.php";

class Handler {

private $router;

public function __construct()
{
    if(!$this->router) $this->router = new Router();
    return $this->router;
}

    public function get(String $action, $id = 0) {
        switch ($action) {
            case "obtener-empleados":
                $empleados = $this->router->obtenerEmpleados();
                return $empleados;	
            
            case "obtener-empleado":
                $empleado = $this->router->obtenerEmpleado($id);
                return $empleado;
        }
    }

    public function post($action, $data) {
        switch ($action) {
            case "crear-empleado":
                $empleado = $this->router->crearEmpleado($data['empleado']);
                return $empleado;
            
            case "eliminar-empleado":
                $empleados = $this->router->eliminarEmpleado($data['id']);
                return $empleados;
        }
    }

    public function put($data) {
        $empleado = $this->router->updateEmpleado($data);
        return $empleado;
    }
}