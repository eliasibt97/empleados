function ver_empleado(nombre, edad, departamento) {
    $('#nombre').val(nombre);
    $('#edad').val(edad);
    $("#departamento").val(departamento);
    $("#submit").html("Actualizar");

    return false;
}