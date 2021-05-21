<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/empleados/context/empleado/domain/Empleado.php';
require $_SERVER['DOCUMENT_ROOT'].'/empleados/context/empleado/domain/EmpleadoRepositoryInterface.php';
require $_SERVER['DOCUMENT_ROOT'].'/empleados/context/shared/database/DatabaseConfig.php';

class EmpleadoReository implements EmpleadoRepositoryInterface {

    private $db;

    public function __construct() {
        if(is_null($this->db)) $this->db = new DatabaseConfig();
    }

    public function crearEmpleado(array $data): bool
    {
        try {
            $query = $this->db->db_connect->prepare("INSERT INTO empleados (nombre, edad, departamento) 
            VALUES ('".$data['nombre']."', ".$data['edad'].", '".$data['departamento']."')");

            $query->execute();

            $data = $query->fetch();
            return $data;
            
        } catch (PDOException $e) {
            throw $e->getMessage();
        }
    }

    public function obtenerEmpleado(int $id): Empleado
    {
        try {
            $query = $this->db->db_connect->prepare("SELECT * FROM empleados WHERE id = ".$id);
            $query->execute();
            
            $data = $query->fetch();
            return Empleado::fromArray($data);
        } catch(PDOException $e) {
            throw $e->getMessage();
        }
        
    }
    
    public function obtenerEmpleados(): array
    {
        try {
            $query = $this->db->db_connect->prepare("SELECT * FROM empleados");
            $query->execute();
            
            $data = $query->fetchAll();
            $empleados = [];
            foreach($data as $empleado){
                array_push($empleados, Empleado::fromArray($empleado));
            }
            return $empleados;
        } catch(PDOException $e) {
            throw $e->getMessage();
        }
        
    }
    
    public function actualizarEmpleado(array $data): bool
    {
        try {
        $query = $this->db->db_connect->prepare("UPDATE empleados 
        SET nombre = '".$data['nombre']."', edad = ".$data['edad'].", departamento = '".$data['departamento']."'
        WHERE id = ".$data['id']);

        $query->execute();
        $data = $query->fetch();
        return $data;
        } catch(PDOException $e) {
            throw $e->getMessage();
        }
    }

    public function eliminarEmpleado(int $id): bool
    {
        try {
            $query = $this->db->db_connect->prepare("DELETE FROM empleados WHERE id = $id");
    
            $query->execute();
            $data = $query->fetch();
            return $data;
            } catch(PDOException $e) {
                throw $e->getMessage();
            }
    }
}