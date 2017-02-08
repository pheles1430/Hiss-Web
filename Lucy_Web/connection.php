<?php

$host = "localhost";
$db = "lucy_web";
$user = "root";
$pass = "root";

$dbc = mysqli_connect($host,$user,$pass,$db) OR die('Could not connect because: '.mysqli_connect_error());

?>