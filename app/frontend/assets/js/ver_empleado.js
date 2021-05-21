function ver_empleado(id,nombre, edad, departamento) {
    $('#idEmpleado').val(id);
    $('#nombre').val(nombre);
    $('#edad').val(edad);
    $("#departamento").val(departamento);
    $('#empleado-form').attr('action','actualizar');
    $("#submit").html("Actualizar");

    return false;
}