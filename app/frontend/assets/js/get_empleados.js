$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "../backend/index.php/obtener-empleados",
        success: function (response) {
            if(response.success) {
                data = [];
                for (const empleado of response.empleados) {
                    var viewButton = '<button class="form-btn view-btn" data-id="'+empleado.id+'" type="submit"><span class="material-icons">visibility</span></button>';
                    var deleteButton = '<button class="form-btn del-btn" data-id="'+empleado.id+'" type="submit"><span class="material-icons">delete</span></button>';
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