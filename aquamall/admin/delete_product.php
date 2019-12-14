<?php 

include('../includes/connection.php');
 $query2  = "SELECT * FROM product WHERE product_id={$_GET['product_id']}";
  	$result = mysqli_query($connect,$query2);
  	$row    = mysqli_fetch_assoc($result);
    mysqli_query($connect,$query2);
unlink("upload/{$row['product_image']}");

$query="DELETE FROM product WHERE product_id={$_GET['product_id']}"; 
//we use get here to reach to the url in query string and to reach to buttons id 

mysqli_query($connect,$query);

header("location:manage_product.php");

 ?>