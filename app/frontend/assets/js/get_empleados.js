$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "../backend/index.php/obtener-empleados",
        success: function (response) {
            if(response.success) {
                data = [];
                for (const empleado of response.empleados) {
                    var viewButton = '<a type="button" class="btn btn-primary"><span class="material-icons">visibility</span></a>';
                    var deleteButton = '<button class="btn btn-danger" onclick="eliminar_empleado('+empleado.id+')" type="button"><span class="material-icons">delete</span></button>';
                    data.push([
                        empleado.id, 
                        empleado.nombre, 
                        empleado.edad, 
                        empleado.departamento, 
                        viewButton+deleteButton
                    ]);
                }
                renderTable(data);
                return true;
            }
        }
    });

    function renderTable (data) {
        $('#empleados').DataTable( {
            data: data,
            paging: false,
            columns: [
                { title: "Id" },
                { title: "Nombre" },
                { title: "Edad" },
                { title: "Departamento" },
                { title: "Acciones" }
            ]
        });
    }
    
});