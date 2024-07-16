<?php
include('../admin/lib/dbcon.php');
$conn = dbcon(); 
dbcon(); 
include('session.php');

$oras = strtotime("now");
$ora = date("Y-m-d",$oras);										
mysqli_query($conn,"update user_log set
logout_Date = '$ora'												
where client_id = '$session_id' ")or die(mysqli_error($conn));

session_destroy();
header('location:../index.php'); 
?>