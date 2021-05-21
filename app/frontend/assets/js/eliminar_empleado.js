function eliminar_empleado(id) {
    $.ajax({
        type: "POST",
        url: "../backend/index.php/eliminar-empleado",
        data: {"id": id},
        dataType: "dataType",
        success: function (response) {
            console.log(response);
        }
    });    
}
