<?php
include "header.php";
?>
		<!-- /BREADCRUMB -->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<script>
function incrementValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    if(value<10){
        value++;
            document.getElementById('number').value = value;
			
    }
	
}
function decrementValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    if(value>1){
        value--;
            document.getElementById('number').value = value;
    }

}
</script>
<script>
.container {
        width: 50%;
        margin: 0 auto;
        padding: 20px;
    }
    .quantity {
        display: inline-block;
        font-size: 16px;
    }
    .quantity input {
        width: 40px;
        text-align: center;
    }
    .btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }
	</script>
		<script>
    
    (function (global) {
	if(typeof (global) === "undefined")
	{
		throw new Error("window is undefined");
	}
    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";
		// making sure we have the fruit available for juice....
		// 50 milliseconds for just once do not cost much (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };	
	// Earlier we had setInerval here....
    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };
    global.onload = function () {        
		noBackPlease();
		// disables backspace on page except on input fields and textarea..
		document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // stopping event bubbling up the DOM tree..
            e.stopPropagation();
        };		
    };
})(window);
</script>
<script>
    function addToCart() {
        alert('Product has been added to cart successfully!');
        // You can add further logic here to actually add the product to the cart
    }
	
    function outOfStock() {
        alert('Product is out of stock!');
    }


</script>


		<!-- SECTION -->
		<div class="section main main-raised">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					
					<?php 
								include 'db.php';
								$product_id = $_GET['p'];
								$sql = " SELECT * FROM products ";
								$sql = " SELECT * FROM products WHERE product_id = $product_id";
								if (!$conn) {
									die("Connection failed: " . mysqli_connect_error());
								}
								
								$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result) > 0) 
								{
									while($row = mysqli_fetch_assoc($result)) 
									{
									$stock_qty=$row['stock_qty'];
									$stock_message = ($stock_qty < 15) ? "Only $stock_qty left in stock" : "In Stock";

									echo '
									
                                    
                                
                                <div class="col-md-5 col-md-push-2">
                                <div id="product-main-img">
                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'" alt="">
                                    </div>

                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image2'].'" alt="">
                                    </div>

                                </div>
                            </div>
                                
                                <div class="col-md-2  col-md-pull-5">
                                <div id="product-imgs">
                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'" alt="">
                                    </div>

                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image2'].'" alt="">
                                    </div>

                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'g" alt="">
                                    </div>

                                    
                                </div>
                            </div>

                                 
									';
                                    
									?>
									<!-- FlexSlider -->
									
									<?php 
									echo '
									
                                    
                                   
                    <div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">'.$row['product_title'].'</h2>
							
							<div>
								<h3 class="product-price">Rs'.$row['product_price'].'</h3>
								';
								if ($row['stock_qty'] > 0) {
									echo "<span class='product-available'>$stock_message</span>";
								} else {
									echo "<span class='product-available'>Out of Stock</span>";
								}
								echo'
							</div>
							
							
								
							
							';
							if ($stock_qty > 0) {
								echo '
							<div class="add-to-cart">
								<div class="btn-group" style="margin-left: 25px; margin-top: 15px">
									<button class="add-to-cart-btn" pid="'.$row['product_id'].'"  id="product" onclick="addToCart()"><i class="fa fa-shopping-cart"></i> add to cart</button>
								</div>
							</div>
							';}
							echo'

			

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>
							<br>
							<br><br>
							<br><br>
							<br><br>
							<br>
							<br>
							
							
							<br>
							<div>
							<h4> <a href="workout_page.php" target="_blank" style="color:red;">Click Here</a> To Try New Workout :</h4>
							
							</div>
						</div>
					</div>
									
					
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					
					
					
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active" style="font-size:20px;"><a data-toggle="tab" href="#tab1">Description</a></li>
								
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
									</div>
								</div>
								<!-- /tab1  -->
								<div class="">
									<p style"font-size:talic;" class="product-decription">'.$row['product_desc'].'</p>
								</div>
								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
									</div>
								</div>
								<!-- /tab2  -->

			
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section main main-raised">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
                    
					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">New Products</h3>
							
						</div>
					</div>
                    ';
									$_SESSION['product_id'] = $row['product_id'];
									}
								} 
								?>	
								<?php
                    include 'db.php';
								$product_id = $_GET['p'];
                    
								$product_query = "SELECT * FROM products, categories WHERE product_cat=cat_id ORDER BY RAND() LIMIT 4";

                $run_query = mysqli_query($conn,$product_query);
                if(mysqli_num_rows($run_query) > 0){

                    while($row = mysqli_fetch_array($run_query)){
                        $pro_id    = $row['product_id'];
                        $pro_cat   = $row['product_cat'];
                        $pro_brand = $row['product_brand'];
                        $pro_title = $row['product_title'];
                        $pro_price = $row['product_price'];
                        $pro_image = $row['product_image'];
						$stock_qty= $row["stock_qty"];
                        $cat_name = $row["cat_title"];

                        echo "
				
                        
                                <div class='col-md-3 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>Rs.$pro_price</h4>
										
										<div class='product-btns'>
											
										</div>
									</div>
									";
									if ($stock_qty > 0) {
										echo"
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#' onclick='addToCart()'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
									";
									} else{
										echo"
									<div class='add-to-cart'>
										<button pid='$pro_id'  class='add-to-cart-btn block2-btn-towishlist' href='#' onclick='outOfStock()'>Out Of Stock</button>
									</div>
									";
									}
									echo"
								</div>
                                </div>
							
                        
			";
		}
        ;
      
}
?>
					<!-- product -->
					
					<!-- /product -->

				</div>
				<!-- /row -->
                
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->


		<!-- FOOTER -->
<?php

include "footer.php";

?>
