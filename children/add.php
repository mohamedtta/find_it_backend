<?php
include "../connect.php";

$name       = $_POST['name'];
$user_id    = $_POST['user_id'];
$location   = $_POST['location'];
$lost_time  = $_POST['lost_time'];
$gender     = $_POST['gender']; 
$img        = imageUpload('file');


$stm = $con->prepare("INSERT INTO `lost_children`(`user_id`, `name`, `location` ,`time_of_lost`,`img`,`gender`) VALUES ('$user_id','$name' , '$location','$lost_time','$img','$gender')");
$stm->execute();


$count = $stm->affected_rows;

if($count > 0){
    echo json_encode(array('status' => 'success'));
}else{
    echo json_encode(array('status' => 'f'));
}

?>