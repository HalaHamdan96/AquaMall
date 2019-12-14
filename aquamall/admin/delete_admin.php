<?php 

include('../includes/connection.php');

$query="DELETE FROM admin WHERE admin_id={$_GET['admin_id']}"; 
//we use get here to reach to the url in query string and to reach to buttons id 

mysqli_query($connect,$query);

header("location:manage_admin.php");

 ?>