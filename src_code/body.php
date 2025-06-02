
<style>
.fon{
    font-size: 15px;
     font-family: 'sans-serif';
     font-weight: bold;
}
.cardp {
            border: 1px solid #ccc;
            border-radius: 5px;
            
            margin: 35px;
            width: 120px;
			height:120px;
            display: inline-block;
            text-align:center;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-between;
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  			transition: 0.5s;
            

        }
		.cardp:hover {
             box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        .cardp img {
            width: 120px;
            height: 120px;
            object-fit: cover;
        }
		.containercp {
  padding: 2px 16px;
  display: flex;
  
}
.containerc
        {
            display: flex;
         
            flex-direction: row;
            flex-wrap: wrap;
        }
		
</style>
		`
   <div class="main main-raised">
        <div class="container mainn-raised" style="width:100%;">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
   

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

	<div class="item active">
		<img src="img/new-banner-1.jpg" style="width:100%;">
        
      </div>

      <div class="item">
        <img src="img/new-banner-7.jpg" style="width:100%;">
        
      </div>
    
      <div class="item">
        <img src="img/new-banner-2.jpg" alt="banner" style="width:100%;">
        
      </div>
      <div class="item">
        <img src="img/new-banner-4.jpg" alt="banner" style="width:100%;">
        
      </div>
      <div class="item">
        <img src="img/new-banner-5.jpg" alt="banner" style="width:100%;">
        
      </div>
	  <div class="item">
        <img src="img/new-banner-6.jpg" alt="banner" style="width:100%;">
        
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control _26sdfg" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only" >Previous</span>
    </a>
    <a class="right carousel-control _26sdfg" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<script>
    function addToCart() {
        alert('Product has been added to cart successfully!');
        // You can add further logic here to actually add the product to the cart
    }
	
    function outOfStock() {
        alert('Product is out of stock!');
    }


</script>

<br>


		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title"></h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12 mainn mainn-raised">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1" >
									
									<?php
                    include 'db.php';
								
                    
					$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id BETWEEN 20 and 25 ";
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
				
                        
                                
								<div class='product'>
									<a href='product.php?p=$pro_id'><div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
									
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'><span>Rs.</span>$pro_price</h4>
										
								
									</div>";
									if ($stock_qty > 0) {
										echo"
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#' onclick='addToCart()'><i class='fa fa-shopping-cart'></i> add to cart</button>
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
                               
							
                        
			";
		}
        ;
      
}
?>
										<!-- product -->
										
	
										<!-- /product -->
										
										
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<br><br><br>
		<!-- HOT DEAL SECTION -->
		<div class="section mainn mainn-raised">
		
		
			<!-- container -->
			<div class="container">
			<br>
			<h2 class="text-uppercase" style="text-align:center; ;">Featured Products</h2>
			<br>
			<div class="containerc">
				<!-- row -->
				<br>
				
						<div class="cardp">        
                        <img src="img/mlogo.png" alt="">
						<div class="containercp">
						<h4 style="fon"><b>Muscleblaze</b></h4>	
				    	</div>                    
                        </div>

                        <div class="cardp">                      
                        <img src="img/mtlogo.png" alt="">
						<div class="containercp">
						<h4 style="fon"><b>MuscleTech</b></h4>	
				    	</div>                                                             
                        </div>

						<div class="cardp">
                        <img src="img/gnclogo.png" alt="">						
						<div class="containercp">
						<h4 style="fon"><b>GNC</b></h4>	                                                                                    
                        </div>
						</div>

						<div class="cardp">
                        <img src="img/nblogo.png" alt="">
						<div class="containercp">
						<h4 style="fon"><b>Nutrabay</b></h4>	                                                                                      
                        </div>
						</div>
						<div class="cardp">
                        
                        <img src="img/clogo.jpg" alt="">
						<div class="containercp">
						<h4 style="fon"><b>Gym Wear</b></h4>	
                        </div>
						</div>
						<div class="cardp">
                        
                        <img src="img/elogo.jpg" alt="">
						
                        <div class="containercp">
						<h4 style="fon"><b>Gym Equipments</b></h4>	                                           
                                            
                        </div>

					
					</div>
					</div>
					</div>
				<!-- /row --><br><br>
			</div>
			<!-- /container -->
			
		</div>
		
		</div>
		<!-- /SECTION -->
		<!-- /HOT DEAL SECTION -->
		
		<br><br>
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title" style=""></h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12 mainn mainn-raised">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<?php
                    include 'db.php';
								
                    
					$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id ";
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
				
                        
                                
								<div class='product'>
									<a href='product.php?p=$pro_id'><div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
										
											
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'><span>Rs.</span>$pro_price</h4>
										
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
										<button pid='$pro_id'  class='add-to-cart-btn block2-btn-towishlist' href='#' onclick='outOfStock()''>Out Of Stock</button>
									</div>
									";
									}
									echo"
								</div>
                               
							
                        
			";
		}
        ;
      
}
?>
										
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<br><br><br>
		<!-- /SECTION -->

</div>
		`