<?php

 @ $db = new mysqli('localhost', 'root', 'password', 'northsidefestival');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

 # northside 
 mysqli_set_charset($db,"utf8");


?>