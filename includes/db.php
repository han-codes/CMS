<?php

// ('localhost' for servername, 'username', 'password', 'db name')
// $connection = mysqli_connect('localhost', 'root', '', 'cms');
//
// if($connection) {
//   echo "We are connected";
// }
//
// $db_user = 'localhost';


// array
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

// make the variables constants
foreach($db as $key => $value) {
  define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

 ?>
