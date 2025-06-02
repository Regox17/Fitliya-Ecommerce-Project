
<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if(isset($_POST["categoryhome"])){
	$category_query = "SELECT * FROM categories";
    
	$run_query = mysqli_query($conn,$category_query) or die(mysqli_error($conn));
	echo "
		
            
            
				<!-- responsive-nav -->
				<div id='responsive-nav'>
					<!-- NAV -->
					<ul class='main-nav nav navbar-nav'>
                    <li><a href='index.php'>Home</a></li>
                    <li><a href='store.php'>Store</a></li>
					

	";
	
        
		echo "
		 <li><a href='workout_page.php'>Workout</a></li>
		 <li><a href='course.php'>Trainer</a></li>
		 <li><a href='aboutus.php'>About us</a></li>
		 </ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
               
			";
	}



if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/2);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='product-row' page='$i' id='page'>$i</a></li>
            
            
		";
	}
}
if(isset($_POST["getProducthome"])){
	$limit = 4;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id LIMIT $start,$limit";
	$run_query = mysqli_query($conn,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
            
            $cat_name = $row["cat_title"];
			echo "
				
                       <div class='product-widget'>
                                <a href='product.php?p=$pro_id'> 
									<div class='product-img'>
										<img src='product_images/$pro_image' alt=''>
									</div>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price'>Rs.$pro_price<del class='product-old-price'></h4>
									</div></a>
								</div>
                        
			";
		}
	}
}


if(isset($_POST["gethomeProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
    
	$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id BETWEEN 20 adn 29";
	$run_query = mysqli_query($conn,$product_query);
	if(mysqli_num_rows($run_query) > 0){
        
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
            $stock_qty = $row['stock_qty'];
            $cat_name = $row["cat_title"];
            
			echo "
				
                        
                                <div class='col-md-3 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											
											
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>Rs.$pro_price</h4>
										
									</div>
									";
									if ($stock_qty > 0) {
										echo"
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
									";
									} else{
										echo"
									<div class='add-to-cart'>
										<button pid='$pro_id'  class='add-to-cart-btn block2-btn-towishlist' href='#'onclick='outOfStock()'>Out Of Stock</button>
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
    
	}
    
if(isset($_POST["get_seleted_Category"]) ||  isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products,categories WHERE product_cat = '$id' AND product_cat=cat_id";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_keywords LIKE %'$keyword'% ";
	}
	
	$run_query = mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
            $stock_qty = $row['stock_qty'];
            $cat_name = $row["cat_title"];
			echo "
					
                        
                        <div class='col-md-4 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img  src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											
											
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>Rs.$pro_price</h4>
										
										
									</div>
									";
									if ($stock_qty > 0) {
										echo"
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
									";
									} else{
										echo"
									<div class='add-to-cart'>
										<button pid='$pro_id'  class='add-to-cart-btn block2-btn-towishlist' href='#'onclick='outOfStock()'>Out Of Stock</button>
									</div>
									";
									}
									echo"
								</div>
							</div>
			";
		}
	}