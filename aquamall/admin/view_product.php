	<?php  

	include("../includes/connection.php");
	if(isset($_POST['add']))
	 	{
	 		$product_name  = $_POST['product_name'];
	 		$product_price = $_POST['product_price'];
	 		$product_desc  = $_POST['product_desc'];
	 		$product_image  = $_FILES['product_image']['name'];
 		    $tmp_name     = $_FILES['product_image']['tmp_name'];
 		    $path         = "upload/";

		move_uploaded_file($tmp_name, $path.$product_image);  
	 	// 	$category_image  = $_FILES['category_image']['name'];
	 	// 	$tmp_name     = $_FILES['category_image']['tmp_name'];
	 	// 	$path         = "upload/";

			// move_uploaded_file($tmp_name, $path.$category_image);     
			$query = "SELECT * FROM categ Where cat_id={$_GET['cat_id']}";
	 		// $query = "INSERT INTO product (cat_id,product_name,product_price,product_desc,product_image)
	 		// VALUES ('$cat_id','$product_name','$product_price','$product_desc','$product_image')";

	 		//excute the query
	 		mysqli_query($connect,$query);

	 		header("location:manage_product.php");
	 		exit;
	 		

	  	}

	include("../includes/admin_header.php");  
	?>
	 <div class="main-content">
	                <div class="section__content section__content--p30">
	                    <div class="container-fluid">
	                        <div class="row">
	                            
		<div class="col-md-12">
		<div class="table-responsive m-b-40">
			<h2 style="text-align: center;"><?php echo $_GET['cat_name']; ?> Table</h2>
		    <table class="table table-borderless table-data3">
		        <thead>
		            <tr>
		               
		                <th>Product ID</th>
		                <th>Product Name</th>
		                <th>Product Price</th>
		                <th>Product Description</th>
		                <th>Product Image</th>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php 
		        		$query    = "SELECT * FROM product Where cat_id={$_GET['cat_id']}";
		        					

		        		 $result1  = mysqli_query($connect,$query);
		        		 while ($row1 = mysqli_fetch_assoc($result1))
		                    {
		                        echo "<tr>";
		                        	echo "<td>{$row1['product_id']}</td>";
		                        	echo "<td>{$row1['product_name']}</td>";
		                        	echo "<td>{$row1['product_price']}</td>";
		                        	echo "<td>{$row1['product_desc']}</td>";
		          					echo "<td><img src='upload/{$row1['product_image']}'/></td>";
		                        echo "</tr>";
		                     }
		             ?>
		
		        </tbody>
		    </table>
		</div>
		</div>
		</div>
		</div>
	<?php  
	include("../includes/admin_footer.php");  

	?>