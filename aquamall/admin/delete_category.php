<?php 

include('../includes/connection.php');
    $query2  = "SELECT * FROM category WHERE cat_id={$_GET['cat_id']}";
  	$result = mysqli_query($connect,$query2);
  	$row    = mysqli_fetch_assoc($result);
    mysqli_query($connect,$query2);
unlink("upload/{$row['cat_image']}");

$query="DELETE FROM category WHERE cat_id={$_GET['cat_id']}"; 
//we use get here to reach to the url in query string and to reach to buttons id 
mysqli_query($connect,$query);

header("location:manage_category.php");
exit;
 ?>