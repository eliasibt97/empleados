$('#empleado-form').submit(function(e) {
    e.preventDefault();

    var form = $(this);
    
    var action = form.attr('action');
    var method = form.attr('method');
    var URL = "";

    if(action == "crear"){
        URL = "../backend/index.php/crear-empleado";
        var data = {
            empleado: {
                nombre: $('#nombre').val(),
                edad: Number.parseInt($('#edad').val()),
                departamento: $('#departamento').val()
            }
        };
    } else {
        URL = "../backend/index.php/actualizar-empleado";
        var data = {
            empleado: {
                id: Number.parseInt($("#idEmpleado").val()),
                nombre: $('#nombre').val(),
                edad: Number.parseInt($('#edad').val()),
                departamento: $('#departamento').val()
            }
        };
    }
        $.ajax({
            type: method,
            url: URL,
            data: JSON.stringify(data),
            dataType: "application/json",
            success: function (response) {
                console.log(response);
                if(response.success) {
                    document.location.reload();
                }else {
                    
                alert('Ocurrió un error al '+action+' empleado')
                }
            },
            onerror: function(e) {
                console.log(e);
            }
        });
})