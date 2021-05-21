<?php

require_once 'Empleado.php';

interface EmpleadoRepositoryInterface {
    function crearEmpleado(array $data): bool;
    function obtenerEmpleado(int $id): Empleado;
    function obtenerEmpleados(): array;
    function actualizarEmpleado(array $data): bool;
    function eliminarEmpleado(int $id): bool;
}