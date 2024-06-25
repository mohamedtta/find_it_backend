<?php
include "../connect.php";

$page = $_GET['page'];
$rows_count = $con->query("SELECT COUNT(id) AS total_count  FROM `lost_items`");
$show  = $rows_count->fetch_all();
$totalCount =  json_encode((int)$show[0][0]);

$pageLimit = 15;
$pagesNumber = ceil($totalCount / $pageLimit);
$offset = ($page -1 ) * $pageLimit;


$stm = $con->query("SELECT * FROM `lost_items`  ORDER BY TimeOfLost DESC LIMIT $pageLimit OFFSET $offset" );

$count = $stm->num_rows;
$data = $stm->fetch_all(MYSQLI_ASSOC);
if($count > 0){
    echo json_encode(array('status' => 'success', 'data' => $data));
}else{
    echo json_encode(array('status' => 'f'));
}




?>