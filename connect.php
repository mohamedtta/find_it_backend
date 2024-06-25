<?php
$host   = 'localhost';
$user   = 'root';
$pass   = '';
$dbname = 'lost';

$con = mysqli_connect($host,$user,$pass,$dbname);



function imageUpload($image_name){
    global $msg_error;
    $imagename = rand(1,1000000).$_FILES[$image_name]['name'];
    $imagetmp  = $_FILES[$image_name]['tmp_name'];
    $imagesize = $_FILES[$image_name]['size'];

    $extensions = array('jpg','png','svg','pdf','mp3');
    $strtoarray = explode(".",$imagename);
    $ext        = end($strtoarray);
    $ext        = strtolower($ext);
    if(!empty($imagename) && !in_array($ext , $extensions)){
        $msg_error[]  = "Ext";
    }if($imagesize > 10*1048576){
        $msg_error[] = "size is too big";
    }if(empty($msg_error)){
        move_uploaded_file($imagetmp, "../uploaded/$imagename" );
        return $imagename;
    }else{
        print_r($msg_error);
        return "fail";
    }
}

function delete_file($name){
    if(file_exists("../uploaded/".$name)){
        unlink("../uploaded/".$name);
    }else{
        echo "file not exist";
    }
}




?>