<?php   

include("includes/connection.php");

 ?>
  <div class="cart-bg-overlay"></div>

  <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""> <span>3</span></a>
        </div>

        <div class="cart-content d-flex">
        	<?php 
        	 	if(isset($_POST['addtocart'])) 
                    {
                    	$query="SELECT * FROM product";
                    	$result=mysqli_query($connenct,$query);
                    	while($row=mysqli_fetch_assoc($result))
                    	{
 					echo "<div class='cart-list'>
                <!-- Single Cart Item -->
                <div class='single-cart-item'>
                    <a href='#' class='product-image'>
                        <img src='admin/upload/{$row['product_image']}' alt=''>
                        <!-- Cart Item Desc -->
                        <div class='cart-item-desc'>
                          <span class='product-remove'><i class='fa fa-close' aria-hidden='true'></i></span>
                            <span class='badge'>Mango</span>
                            <h6>{$row['product_desc']}</h6>
                            <p class='size'>Size: S</p>
                            <p class='color'>Color: Red</p>
                            <p class='price'>{$row['product_price']}</p>
                        </div>
                    </a>
                </div>
            </div>";
            	}

					}
			?>
            <!-- Cart List Area -->
            

            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <h2>Summary</h2>
                <ul class="summary-table">
                    <li><span>subtotal:</span> <span>$274.00</span></li>
                    <li><span>delivery:</span> <span>Free</span></li>
                    <li><span>discount:</span> <span>-15%</span></li>
                    <li><span>total:</span> <span>$232.00</span></li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="checkout.html" class="btn essence-btn">check out</a>
                </div>
            </div>
        </div>
    </div>