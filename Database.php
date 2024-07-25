<?php
$server = "localhost";
$dbName = "cineplexdb";
$user = "root";
$password = "";

$con = mysqli_connect($server,  $user, $password, $dbName);

function getConnection(){
    global $con;
    if(!$con){
        exit();
    }
    return $con;
}
?>

