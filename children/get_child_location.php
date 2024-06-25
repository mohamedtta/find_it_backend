<?php
include "../connect.php";



$stm = $con->query("SELECT `location` FROM `lost_children` " );

$count = $stm->num_rows;
$data = $stm->fetch_all(MYSQLI_ASSOC);
if($count > 0){
    echo json_encode(array('status' => 'success', 'data' => $data));
}else{
    echo json_encode(array('status' => 'f'));
}




?>