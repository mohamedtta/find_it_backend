<?php

include '../connect.php';

$name           = $_POST['name'];
$username       = $_POST['username'];
$email          = $_POST['email'];
$password       = $_POST['password'];
$phone          = $_POST['phone'];
$country        = $_POST['country'];
$date           = $_POST['date'];
$profile_image  = imageUpload('file');



$stm_user  =  $con->query ("SELECT  * FROM `users` WHERE username  = '$username'");
$stm_email = $con->query("SELECT  * FROM `users`  WHERE email     = '$email'"    );
$stm_phone = $con->query("SELECT  * FROM `users`  WHERE phone     = '$phone'"    );


$count_user  = $stm_user->num_rows;
$count_phone = $stm_phone->num_rows;
$count_email = $stm_email->num_rows;


if($count_user > 0){
    echo json_encode(array("status" => "username already exist"));
}

elseif($count_phone > 0){
    echo json_encode(array("status" => "phone already used"));
}
elseif($count_email > 0){
    echo json_encode(array("status" => "email already exist"));
}
else{
    $stm = $con->prepare("INSERT INTO `users` (`name`,`username`,`email`,`country`,`password`,`phone`,`birth_date` , `profile_picture`) VALUES ('$name','$username','$email','$country','$password','$phone','$date','$profile_image')");
    $stm->execute();
    #$stm->execute(array($name,$username,$email,$country,$password,$phone,$date,$profile_image));
    echo json_encode(array("status" => "success"));

}




?>