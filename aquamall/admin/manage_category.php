<?php  

include("../includes/connection.php");
if(isset($_POST['add']))
 	{
 		$category_name  = $_POST['category_name'];

 		$category_image  = $_FILES['category_image']['name'];
 		$tmp_name     = $_FILES['category_image']['tmp_name'];
 		$path         = "upload/";

		move_uploaded_file($tmp_name, $path.$category_image);     

 		$query = "INSERT INTO category (cat_name,cat_image)
 		VALUES ('$category_name','$category_image')";

 		//excute the query
 		mysqli_query($connect,$query);

 		header("location:manage_category.php");
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
                                    <div class="card-header">Create Category</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New Category</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post"  enctype="multipart/form-data">
                                            
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Name: </label>
                                                <input id="cc-pament" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Image: </label>
                                                <input id="cc-pament" name="category_image" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>

                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="add">
                                                    <span id="payment-button-amount">Add Category</span>
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
	                <th>ID</th>
	                <th>Category_Name</th>
	                <th>Category_Image</th>
	                <th>View Products</th>
	                <th>Edit</th>
	                <th>Delete</th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php 
	                $query   = "SELECT * FROM category";
	                $result  = mysqli_query($connect,$query); //excute the query
	                while ($row = mysqli_fetch_assoc($result)) //return bool if the data is in the database or not
	                    {
	                        echo "<tr>";
	                        	echo "<td>{$row['cat_id']}</td>";
	                        	echo "<td>{$row['cat_name']}</td>";
	                        	echo "<td><img src='upload/{$row['cat_image']}'/></td>";
	                        	echo "<td><a href='view_product.php?cat_id={$row['cat_id']} & 
	                        	cat_name={$row['cat_name']}' class='btn btn-success'>View</a></td>"; 
	                      	    echo "<td><a href='edit_category.php?cat_id={$row['cat_id']}' 
	                      	    class='btn btn-warning'>Edit</a></td>"; 
	                            echo "<td><a href='delete_category.php?cat_id={$row['cat_id']}'
	                            class='btn btn-danger'>Delete</a></td>";
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