<?php

$sname= "localhost";
$snmae= "root";
$password= "";

$dbname= "test_db";

$conn = mysqli_connect($sname,$snmae,$password,$dbname);

if (!$conn) {
 echo "Connection failed!";
} 