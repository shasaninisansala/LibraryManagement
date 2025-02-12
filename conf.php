<?php
$serverName='localhost';
$uName='root';
$pass='';
$dbName='studentlogin';

$conn=mysqli_connect($serverName,$uName,$pass,$dbName);
if(!$conn){
    die("Connection failed:".mysqli_connect_error());
}

?>