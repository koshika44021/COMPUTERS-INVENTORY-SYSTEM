<?php
include('./lib/dbcon.php');
$conn = dbcon(); 
dbcon();
if (isset($_POST['delete_user'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM admin where admin_id='$id[$i]'");
}
header("location: admin_user.php");
}
?>