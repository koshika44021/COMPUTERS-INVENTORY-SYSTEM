<?php
include('./lib/dbcon.php');
$conn = dbcon(); 
dbcon();
if (isset($_POST['delete_client'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM client where client_id='$id[$i]'");
}
header("location: client_user.php");
}
?>