<?php
require 'connection.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *, Authorization');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
header('Content-type: json/application ');
$doctor = mysqli_query($connect,'SELECT * FROM `doctor`');

$doctorList = [];

while ($doctors = mysqli_fetch_assoc($doctor)){
    $doctorList[] = $doctors;
}
//
echo json_encode($doctorList);