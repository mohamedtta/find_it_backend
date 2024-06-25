<?php
include "../connect.php";

$date       = $_POST['date'];
$location   = $_POST['location'];
$name       = $_POST['name'];

$query = "SELECT * FROM lost_items";
$conditions = array();
if($date != '' ){
    $conditions[] = "date='$date'";
    // $stm .= $con->query("SELECT * FROM `lost_items`  WHERE `date` = '$date'" );

}if($location != ''){
    $conditions[] = "location='$location'";
    // $stm .= $con->query("SELECT * FROM `lost_items`  WHERE `location` = '$location'" );
}if($name != ''){
    $conditions[] = "name='$name'";

    // $stm = $con->query("SELECT * FROM `lost_items`  WHERE  `date` = '$date' and `name` = '$name'" );
}

$sql = $query;
if (count($conditions) > 0) {
  $sql .= " WHERE " . implode(' AND ', $conditions);
}
$stm = $con->query($sql);


$count = $stm->num_rows;
$data = $stm->fetch_all(MYSQLI_ASSOC);
if($count > 0){
    echo json_encode(array('status' => 'success', 'data' => $data));
}else{
    echo json_encode(array('status' => 'f'));
}


?>