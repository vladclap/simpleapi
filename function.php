<?php
 function getDoctor($connect){
     $doctor = mysqli_query($connect,'SELECT * FROM `doctor`');

     $doctorList = [];
     while ($doctors = mysqli_fetch_assoc($doctor)){
         $doctorList[] = $doctors;
     }

     echo json_encode($doctorList);
 }
 function getInfo($connect,$id){
     $info = mysqli_query($connect,"SELECT * FROM `doctor` where `id` = '$id'");
     if (mysqli_num_rows($info) === 0){
         http_response_code(404);
           $res = [
               "status" => false,
               "message" => "Doctor not found"
           ];
        echo json_encode($res) ;
     } else
         {
         $info = mysqli_fetch_assoc($info);
         echo json_encode($info);
         }
 }


 function addDoctor($connect,$data){
             $name = $data['name'];
             $picture = $data['picture'];
             $rating = $data['rating'];
             $specialty = $data['specialty'];

 mysqli_query($connect, "INSERT INTO `doctor` (`id`, `name`, `picture`, `rating`, `specialty`) VALUES (NULL,'$name', '$picture', '$rating', '$specialty')");

     http_response_code(201);
 $res = [
         "status" => true,
         "post_id" => mysqli_insert_id($connect)
     ];
     echo json_encode($res);
 }

 function updateDoctor($connect, $id, $data){
     $name = $data['name'];
     $picture = $data['picture'];
     $rating = $data['rating'];
     $specialty = $data['specialty'];
     mysqli_query($connect,"UPDATE `doctor` SET `name` = '$name', `picture` = '$picture', `rating` = '$rating', `specialty` = '$specialty' WHERE `doctor`.`id` = '$id'");

     http_response_code(200);
     $res = [
         "status" => true,
         "message" => " Doctor is updated"
     ];
     echo json_encode($res);
 }
function deleteDoctor($connect,$id){
      mysqli_query($connect,"DELETE FROM `doctor` WHERE `doctor`.`id` = '$id'");
    http_response_code(200);
    $res = [
        "status" => true,
        "message" => " Doctor is deleted"
    ];
    echo json_encode($res);
}


