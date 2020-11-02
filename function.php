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
             $id = mysqli_insert_id($connect);
 mysqli_query($connect, "INSERT INTO `doctor` (`id`, `name`, `picture`, `rating`, `specialty`) VALUES (NULL,'$name', '$picture', '$rating', '$specialty')");

     http_response_code(201);
 $res = [
         "status" => true,
         "post_id" => mysqli_insert_id($connect)
     ];
     echo json_encode($res);
 }



