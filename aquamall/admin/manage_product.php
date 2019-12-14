	<?php  

	include("../includes/connection.php");
	if(isset($_POST['add']))
	 	{
	 		$product_name  = $_POST['product_name'];
	 		$product_price = $_POST['product_price'];
	 		$product_desc  = $_POST['product_desc'];
	 		$cat_id        = $_POST['cat_id'];
	 		$product_image  = $_FILES['product_image']['name'];
 		    $tmp_name     = $_FILES['product_image']['tmp_name'];
 		    $path         = "upload/";

		move_uploaded_file($tmp_name, $path.$product_image);  
	 	// 	$category_image  = $_FILES['category_image']['name'];
	 	// 	$tmp_name     = $_FILES['category_image']['tmp_name'];
	 	// 	$path         = "upload/";

			// move_uploaded_file($tmp_name, $path.$category_image);     

	 		$query = "INSERT INTO product (cat_id,product_name,product_price,product_desc,product_image)
	 		VALUES ('$cat_id','$product_name','$product_price','$product_desc','$product_image')";

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
	                            <div class="col-lg-12">
	                                <div class="card">
	                                    <div class="card-header">Create Product</div>
	                                    <div class="card-body">
	                                        <div class="card-title">
	                                            <h3 class="text-center title-2">New Product</h3>
	                                        </div>
	                                        <hr>
	                                        <form action="" method="post"  enctype="multipart/form-data">
	                                            
	                                            <div class="form-group">
	                                                <label for="cc-payment" class="control-label mb-1">Product Name: </label>
	                                                <input id="cc-pament" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false" >
	                                            </div>
	                                            <div class="form-group">
	                                                <label for="cc-payment" class="control-label mb-1">Product Price: </label>
	                                                <input id="cc-pament" name="product_price" type="number" class="form-control" aria-required="true" aria-invalid="false" >
	                                            </div>
	                                            <div class="form-group">
	                                                <label for="cc-payment" class="control-label mb-1">Product Description: </label>
	                                                <input id="cc-pament" name="product_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" >
	                                            </div>
	                                             <div class="form-group">
	                                                <label for="cc-payment" class="control-label mb-1">
	                                                Select Category: </label>
	                                                <select name="cat_id" class="form-control">
	                                                	<option selected="" disabled="">
	                                                	Select Category</option>
	                                                	<?php
	                                                	 $query   = "SELECT * FROM category";
		              									 $result  = mysqli_query($connect,$query); 
		               									 while ($row = mysqli_fetch_assoc($result))
		                    							   { 
	                                                	  echo "<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";
	                                                	  }
	                                                	?>
	                                                </select>
	                                            </div>
	                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Image: </label>
                                                <input id="cc-pament" name="product_image" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>
	                                            <div>
	                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="add">
	                                                    <span id="payment-button-amount">Add Product</span>
	                                                </button>
	                                            </div>
	                                        </form>
	                                    </div>
	                                </div>
	                            </div>
	                         


		<div class="col-md-12">
		<div class="table-responsive m-b-40">
		    <table class="table table-borderless table-data3">
		        <thead>
		            <tr>
		                <th>Category Name</th>
		                <th>Product ID</th>
		                <th>Product Name</th>
		                <th>Product Price</th>
		                <th>Product Description</th>
		                <th>Product Image</th>
		                
		                <th>Edit</th>
		                <th>Delete</th>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php 
		        		$query    = "SELECT * FROM product 
		        					INNER JOIN category 
		        					ON category.cat_id=product.cat_id";

		        		 $result1  = mysqli_query($connect,$query);
		        		 while ($row1 = mysqli_fetch_assoc($result1))
		                    {
		                        echo "<tr>";
		                        	echo "<td>{$row1['cat_name']}</td>";
		                        	echo "<td>{$row1['product_id']}</td>";
		                        	echo "<td>{$row1['product_name']}</td>";
		                        	echo "<td>{$row1['product_price']}</td>";
		                        	echo "<td>{$row1['product_desc']}</td>";
		          					echo "<td><img src='upload/{$row1['product_image']}'/></td>";
		                      	    echo "<td><a href='edit_product.php?product_id={$row1['product_id']}  & cat_id={$row1['cat_id']}' 
		                      	    class='btn btn-warning'>Edit</a></td>"; 
		                            echo "<td><a href='delete_product.php?product_id={$row1['product_id']}'
		                            class='btn btn-danger'>Delete</a></td>";
		                        echo "</tr>";
		                     }
		             ?>
		 <!-- //                 if(isset($_POST['cat_id']) )
	 	//                        {

	 	// 	                     $product_name  = $_POST['product_name'];
	 	// 	                     $product_price  = $_POST['product_price'];
	 	// 	                     $product_desc  = $_POST['product_desc'];
	 	// // 	$category_image  = $_FILES['category_image']['name'];
	 	// // 	$tmp_name     = $_FILES['category_image']['tmp_name'];
	 	// // 	$path         = "upload/";

			// // move_uploaded_file($tmp_name, $path.$category_image);     

	 	// 	                     $query = "INSERT INTO product (product_name,product_price,product_desc)
	 	// 	                     VALUES ('$product_name','$product_price','$product_desc')";

	 	// 	//excute the query
	 	// 	                     mysqli_query($connect,$query);

	 	//                        	header("location:manage_product.php");
	 	// 	                    exit;
	 		

	  //                         	}
			//                 } -->
		        	
		           <!--  <?php 
		                
		               // $query1   = "SELECT * FROM category";
		                // $query2   = "SELECT cat_id,cat_name FROM category
		                //              INNER JOIN product ON cat_id = product_id ";
		                // $query2   = "SELECT * FROM admin";
		                //excute the query
		                //$result1  = mysqli_query($connect,$query1);
		                // $result2  = mysqli_query($connect,$query2);

		                //  while ($row2 = mysqli_fetch_assoc($result2)) 
		                // 	{
		                // 		echo "<td>{$row2['cat_id']}</td>";
		                //         echo "<td>{$row2['cat_name']}</td>";
		                		
		                // 		// echo "<td>{$row['cat_name']}</td>";		
		                // 	}
		                
		            ?>  -->
		        </tbody>
		    </table>
		</div>
		</div>
		</div>
		</div>
	<?php  
	include("../includes/admin_footer.php");  

	?>