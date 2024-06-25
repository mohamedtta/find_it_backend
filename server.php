<?php


$host = '127.0.0.1';
$port = 9001;

$socket = socket_create(AF_INET , SOCK_STREAM , 0);

$result = socket_bind($socket,$host,$port);

$result = socket_listen($socket,3);

$spawn = socket_accept($socket);

$input = socket_read($spawn , 1024);

$output = "from server : \n" . $input . "\n";

socket_write($spawn , $output , strlen($output));

socket_close($spawn);


?>