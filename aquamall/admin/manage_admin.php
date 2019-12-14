<?php  

include("../includes/connection.php");
if(isset($_POST['save']))
 	{
 		$email    = $_POST['admin_email'];
 		$password = $_POST['admin_password'];
 		$fullname = $_POST['full_name'];

 		$query = "INSERT INTO admin (admin_email,admin_password,admin_name)
 		VALUES ('$email','$password','$fullname')";

 		//excute the query
 		mysqli_query($connect,$query);

 		header("location:manage_admin.php");
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
                                    <div class="card-header">Create Admin</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New Admin</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" >
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Email:</label>
                                                <input id="cc-pament" name="admin_email" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Password: </label>
                                                <input id="cc-pament" name="admin_password" type="password" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Full Name: </label>
                                                <input id="cc-pament" name="full_name" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>

                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="save">
                                                    <span id="payment-button-amount">Save</span>
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
	                <th>Admin_Name</th>
	                <th>Admin_Email</th>
	                <th>Edit</th>
	                <th>Delete</th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php 
	                $query   = "SELECT * FROM admin";
	                $result  = mysqli_query($connect,$query); //excute the query
	                while ($row = mysqli_fetch_assoc($result)) //return bool if the data is in the database or not
	                    {
	                        echo "<tr>";
	                        	echo "<td>{$row['admin_id']}</td>";
	                        	echo "<td>{$row['admin_name']}</td>";
	                        	echo "<td>{$row['admin_email']}</td>";
	                      	    echo "<td><a href='edit_admin.php?admin_id={$row['admin_id']}' 
	                      	    class='btn btn-warning'>Edit</a></td>"; //we use query string in the edit admin to re
	                            echo "<td><a href='delete_admin.php?admin_id={$row['admin_id']}'
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