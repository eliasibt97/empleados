<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GH Medic</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.24/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css"/>

</head>
<body>
<?php include './shared/header.php'; ?>
<div class="container" style="margin-top: 10px;">
    <?php include './pages/empleados.php'; ?>
    <hr/>
    <?php include './pages/form-empleado.php'; ?>
    <hr/>
</div>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.24/datatables.min.js"></script>
<script type="text/javascript" src="./assets/js/get_empleados.js"></script>
<script type="text/javascript" src="./assets/js/actualizar_empleado.js"></script>
<script type="text/javascript" src="./assets/js/eliminar_empleado.js"></script>
<script type="text/javascript" src="./assets/js/ver_empleado.js"></script>
</body>
</html>