<?php  

include("../includes/connection.php");
if(isset($_POST['save']))
 	{
 		$email    = $_POST['admin_email'];
 		$password = $_POST['admin_password'];
 		$fullname = $_POST['full_name'];
 		// ne var= input var
 		$query = "UPDATE admin SET admin_email    = '$email'    ,
 								   admin_password = '$password' ,
 								   admin_name     = '$fullname'
 							   WHERE admin_id = {$_GET['admin_id']}";
 		// the first var from the database and the second one from variables here  
 		mysqli_query($connect,$query);

 		header("location:manage_admin.php")	;				   
 		// $query = "insert into admin (admin_email,admin_password,admin_name)
 		// values ('$email','$password','$fullname')";

 		// //excute the query
 		// mysqli_query($connect,$query);
 		
  	}


  	$query2  = "SELECT * FROM admin WHERE admin_id={$_GET['admin_id']}";
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
                                    <div class="card-header">Update Admin</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Admin</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" >
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Email:</label>
                                                <input id="cc-pament" name="admin_email" type="text" class="form-control" aria-required="true" aria-invalid="false"  
                                                value="<?php echo $row['admin_email']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Password: </label>
                                                <input id="cc-pament" name="admin_password" type="password" class="form-control" aria-required="true" aria-invalid="false" 
                                                value="<?php echo $row['admin_password']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Full Name: </label>
                                                <input id="cc-pament" name="full_name" type="text" class="form-control" aria-required="true" aria-invalid="false" 
                                                value="<?php echo $row['admin_name']; ?>">
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