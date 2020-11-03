<?php
require 'connection.php';
require 'function.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *, Authorization');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
header('Content-type: json/application ');

$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];

$params = explode('/', $q);

$type = $params[0];
$id = $params[1];

if ($method === 'GET' ){
    if ($type === 'doctor'){
        if ( isset($id) ){
            getInfo($connect, $id);
        }
        else{
            getDoctor($connect);
        }
    }
 } elseif ($method === 'POST'){
    if($type === 'doctor'){
        addDoctor($connect, $_POST);
    }
} elseif ($method === 'PATCH'){
    if($type === 'doctor'){
        if(isset($id)){
            $data = file_get_contents('php://input');
            $data = json_decode($data,true);
        updateDoctor($connect, $id, $data);
        }
    }

}elseif($method === 'DELETE'){
    if($type === 'doctor'){
        if(isset($id)){
            deleteDoctor($connect, $id );
        }
    }

}





