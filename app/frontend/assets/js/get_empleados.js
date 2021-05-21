$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "../backend/index.php/obtener-empleados",
        success: function (response) {
            if(response.success) {
                data = [];
                for (const empleado of response.empleados) {
                    var nombre = empleado.nombre;
                    var edad = empleado.edad;
                    var departamento = empleado.departamento;
                    var viewButton = "<button type='button' class='btn btn-primary' onclick='ver_empleado(`"+ nombre +"`, "+edad+", `"+departamento+"`)'><span class='material-icons'>visibility</span></button>";
                    var deleteButton = '<button type="button" class="btn btn-danger" onclick="eliminar_empleado('+empleado.id+')"><span class="material-icons">delete</span></button>';
                    data.push([
                        empleado.id, 
                        empleado.nombre, 
                        empleado.edad, 
                        empleado.departamento, 
                        viewButton+deleteButton
                    ]);
                }
                renderTable(data);  
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