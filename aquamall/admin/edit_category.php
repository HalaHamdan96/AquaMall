<?php  

include("../includes/connection.php");     
if(isset($_POST['update']))
 	{
 		$category_name   = $_POST['category_name'];
        $category_image  = $_FILES['category_image']['name'];
        $tmp_name        = $_FILES['category_image']['tmp_name'];
        $path            = "upload/";
        /*$error           = $_FILES['category_image']['error'];*/

        
 		// ne var= input var
        move_uploaded_file($tmp_name, $path.$category_image); 

        if($_FILES['category_image']['error']==0)
        {
 		    $query =  "UPDATE category SET 
                            cat_name  =  '$category_name',
                            cat_image =  '$category_image' 
 		              WHERE cat_id    = {$_GET['cat_id']} ";
       
        }
        else
        {
            $query =  "UPDATE category SET 
                            cat_name  =  '$category_name'
                      WHERE cat_id    = {$_GET['cat_id']} ";

        }
 		// the first var from the database and the second one from variables here  
 		mysqli_query($connect,$query);

 		header("location:manage_category.php")	;

 		// $query = "insert into admin (admin_email,admin_password,admin_name)
 		// values ('$email','$password','$fullname')";

 		// //excute the query
 		// mysqli_query($connect,$query);
 		
  	}



  	$query2  = "SELECT * FROM category WHERE cat_id={$_GET['cat_id']}";
  	$result = mysqli_query($connect,$query2);
  	$row    = mysqli_fetch_assoc($result);



include("../includes/admin_header.php");  
?>
 <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Update Category</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Category</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post"   enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Name: </label>
                                                <input id="cc-pament" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" 
                                                value="<?php echo $row['cat_name']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Image: </label>
                                                <input id="cc-pament" name="category_image" type="file" class="form-control" aria-required="true" aria-invalid="false" 
                                                >
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="update">
                                                    <span id="payment-button-amount">Update Category</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
	</div>
	</div>
<?php  
include("../includes/admin_footer.php");  

?>