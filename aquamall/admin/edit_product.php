<?php  

include("../includes/connection.php");
if(isset($_POST['save']))
 	{
 		$product_name    = $_POST['product_name'];
        $product_price   = $_POST['product_price'];
        $product_desc    = $_POST['product_desc'];
        $cat_id          = $_POST['cat_id'];
        $product_image   = $_FILES['product_image']['name'];
        $tmp_name        = $_FILES['product_image']['tmp_name'];
        $path            = "upload/";

        move_uploaded_file($tmp_name, $path.$product_image);  
 		// ne var= input var
        if($_FILES['product_image']['error']==0)
        {
            $query = "UPDATE product SET product_name    = '$product_name'    ,
                                         product_price   = '$product_price' ,
                                         product_desc    = '$product_desc' ,
                                         cat_id          =  '$cat_id',
                                        product_image    =  '$product_image' 
                               WHERE product_id = {$_GET['product_id']}";
       
        }
        else
        {
            $query = "UPDATE product SET product_name     = '$product_name'    ,
                                     product_price    = '$product_price' ,
                                     product_desc     = '$product_desc' ,
                                     cat_id           =  '$cat_id'
                               WHERE product_id = {$_GET['product_id']}";

        }


 		
 		// the first var from the database and the second one from variables here  
 		mysqli_query($connect,$query);

 		header("location:manage_product.php")	;				   
 		// $query = "insert into admin (admin_email,admin_password,admin_name)
 		// values ('$email','$password','$fullname')";

 		// //excute the query
 		// mysqli_query($connect,$query);
 		
  	}


  	$query2  = "SELECT * FROM product WHERE product_id={$_GET['product_id']}";
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
                                    <div class="card-header">Update product</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit product</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Name:</label>
                                                <input id="cc-pament" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false"  
                                                value="<?php echo $row['product_name']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Price:</label>
                                                <input id="cc-pament" name="product_price" type="number" class="form-control" aria-required="true" aria-invalid="false"  
                                                value="<?php echo $row['product_price']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Description: </label>
                                                <input id="cc-pament" name="product_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" 
                                                value="<?php echo $row['product_desc']; ?>">
                                            </div>
                                             <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1"> Category: 
                                                </label>
                                                <select name="cat_id" class="form-control">
                                                        <option disabled="">
                                                        Select Category</option>
                                                        <?php
                                                         $query   = "SELECT * FROM category";
                                                         $result  = mysqli_query($connect,$query); 
                                                         while ($row = mysqli_fetch_assoc($result))
                                                           { 
                                                                  if($_GET['cat_id'] == $row['cat_id']){
                                                                    echo "<option selected value='{$row['cat_id']}'>
                                                                   {$row['cat_name']}
                                                                   </option>";
                                                                  }
                                                                  else{
                                                                   echo "<option  value='{$row['cat_id']}'>
                                                                   {$row['cat_name']}
                                                                   </option>";
                                                               
                                                           }}
                                                        ?>
                                                    </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Image: </label>
                                                <input id="cc-pament" name="product_image" type="file" class="form-control" aria-required="true" aria-invalid="false" 
                                                >
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="save">
                                                    <span id="payment-button-amount">Update</span>
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