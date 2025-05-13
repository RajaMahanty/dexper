<?php
include "init.php";

if(isset($_POST['username'])){
   $username = $_POST['username'];

   $result = $getFromU->checkUsername($username);
   $response = "Available.";
   
      if($result){
          $response = "Not Available.";
      }
   echo $response;
   die;
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    
    $result = $getFromU->checkEmail($email);
    $response = "Available.";
    
    if ($result) {
        $response = "Not Available.";
    }
    echo $response;
    die;
}
?>