<?php

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
}

include_once 'api.php';

$api = new Api();


if(isset($_POST['noticia']) && isset($_POST['cuerpo'])) {
    $item = array(
        'noticia' => $_POST['noticia'],
        'cuerpo' => $_POST['cuerpo']
    );
    $api->add($item);
} else if(isset($_POST['remove'])) {

    $api->removeNoticia($_POST['remove']);
} else {
    echo json_encode('error');
}