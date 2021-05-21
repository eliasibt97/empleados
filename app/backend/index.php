<?php

require 'Handler.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$handler = new Handler();

function clear_uri($uri) {
    $actionWithParameters = explode('app/backend/index.php/', $uri);
    $actionWithoutParameters = explode('?', $actionWithParameters[1]);
    $action = $actionWithoutParameters[0];
    return $action;
}

function getData(){
    $inputJSON = file_get_contents('php://input');    
    $data = json_decode($inputJSON, TRUE);
    if($data == NULL){
        $data = $_POST;
    }
    return $data;
}



switch ($method) {
    case 'GET':
        $action = clear_uri($uri);
        $response = $handler->get($action, $_GET['id'] ?? 0);
        echo $response;
        break;
        
    case 'POST':
        $action = clear_uri($uri);
        $data = getData();
        $response = $handler->post($action, $data);
        echo $response;
        break;

    case 'PUT':
        $response = $handler->put($_PUT['empleado']);
        echo $response;
        break;
    default:
        # code...
        break;
}