<?php
include "../connect.php";


$id = $_POST['id'];
$name = $_POST['name'];

delete_file($name);

$stm = $con->prepare("DELETE FROM `lost_children` WHERE id = '$id'");
$stm->execute();




$count = $stm->affected_rows;

if($count > 0){
    echo json_encode(array('status' => 'success'));
}else{
    echo json_encode(array('status' => 'f' ));
}




?>