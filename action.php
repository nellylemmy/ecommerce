<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<ul class='menu-category'>
			<li class='active'><h6>BRANDS</h6></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</ul>";
	}
}

if(isset($_POST["productsCategory"])){
	$category_query = "SELECT * FROM categories";
	
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
	<section class='padding-bottom'>
	
	";
	$start = 0;
	$limit = 1;
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			if($row != 0){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			$get_big_image = "SELECT * FROM products WHERE product_cat = $cid LIMIT $start,$limit";
			$run_image_query = mysqli_query($con,$get_big_image) or die(mysqli_error($con));

			echo "<section class='padding-bottom'>";
				echo "
				<header class='section-heading heading-line'>
					<h4 class='title-section text-uppercase' cid='$cid'>$cat_name</h4>
				</header>";

				echo "<div class='card card-home-category'>
				<div class='row no-gutters'>
				";
				echo "
				<div class='col-md-3 side-best-selling'>
				";

				if(mysqli_num_rows($run_image_query) > 0){
					while($image_row = mysqli_fetch_array($run_image_query)){
						$pro_title = $image_row["product_title"];
						$pro_price = $image_row["product_price"];
						$pro_image = $image_row["product_image"];
	
						echo "
						<div class='home-category-banner bg-light-orange'>
							<h5 class='title'>Best selling $cat_name</h5>
							<p class='text-muted prices'>
								<div class='title'><b>NAME: </b>$pro_title</div>
								<div class='title'><b>SIZE: </b> 1 litre</div>
								<div class='title'><b>PRICE: </b> Ksh $pro_price</div>
								<div class='title'><b>ORDERS: </b> 3,481</div>
							</p>
							<a href='./products.html' class='btn btn-outline-primary rounded-pill'>Order now</a>
							<img src='product_images/$pro_image' class='img-bg'>
						</div>
						";
					}
				}

				

				echo "</div>";
				echo "<div class='col-md-9'>
				<ul class='row no-gutters bordered-cols'>
				";

					$category2_query = "SELECT * FROM products WHERE product_cat = $cid";
					$run_query2 = mysqli_query($con,$category2_query) or die(mysqli_error($con));
					if(mysqli_num_rows($run_query2) > 0){
						while($row2 = mysqli_fetch_array($run_query2)){
							$pid = $row2["product_id"];
							$pro_name = $row2["product_title"];
							$pro_image = $row2["product_image"];

							echo "
							<li class='col-6 col-lg-3 col-md-4 productview' vid='$pid' id='$pid'>
							<a href='./products.html' class='item'> 
								<div class='card-body'>
									<h6 class='title'>$pro_name</h6>
									<img class='img-sm float-right' src='product_images/$pro_image'> 
									<p class='text-muted prices'>
										<div class='text-muted'><small>750 ml @ Ksh 350</small></div>
										<div class='text-muted'><small>1 litre @ Ksh 1350</small></div>
									</p>
								</div>
							</a>
							</li>
							";
						}
					}
				
				echo "</ul></div>";
				echo "</div></div>";

			echo "</section>";
		}
	}


	}
}

if(isset($_POST["sliderRightContent"])){
	$start = 0;
	$limit = 3;

	$sliderRightContent_query = "SELECT * FROM products LIMIT $start,$limit";
	// $sliderRightContent_query = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sliderRightContent_query) or die(mysqli_error($con));
	echo "
	<aside class='special-home-right'>
	<h6 class='bg-blue text-center text-white mb-0 p-2'>Popular Drinks</h6>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_title = $row['product_title'];
			$pro_image = $row['product_image'];
			echo "
			<div class='card-banner border-bottom'>
			  <div class='py-3' style='width:80%'>
			    <h6 class='card-title'>$pro_title</h6>
			    <button class='btn btn-danger btn-sm' id='product' pid='$pro_id'> Add To Cart </button>
			  </div> 
			  <img src='product_images/$pro_image' height='80' class='img-bg'>
			</div>
			";
		}
		echo "</aside>";
	}
}

if(isset($_POST["sliderContent"])){

	$sliderContent_query = "SELECT * FROM slides";
	// $sliderContent_query = "SELECT * FROM slides";
	$run_query = mysqli_query($con,$sliderContent_query) or die(mysqli_error($con));
	echo "
	<div class='carousel-inner'>
	";
	if(mysqli_num_rows($run_query) > 0){
		if(mysqli_num_rows($run_query)){
			$row = mysqli_fetch_array($run_query);
			$slide_image = $row['slide_image'];
			echo "
			<div class='carousel-item active'>
			<img src='product_images/$slide_image' alt='slide'> 
			</div>
			";
		};
		while($row = mysqli_fetch_array($run_query)){
			$slide_image = $row['slide_image'];
			echo "
			<div class='carousel-item'>
			<img src='product_images/$slide_image' alt='slide'> 
			</div>
			";
		}
		echo "</div>";
	}
}


if(isset($_POST["productview"])){
	$productview_query = "SELECT * FROM products";
	$run_query = mysqli_query($con,$productview_query) or die(mysqli_error($con));
	echo "
		<div class=''>
			<li class='active'><a href='#'><h4>Categories</h4></a></li>
			<div>just</div>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$vid = $row["product_id"];
			$vid_name = $row["product_title"];
			echo "
					<li><a href='#' class='productview' vid='$vid'>$vid_name</a></li>
			";
		}
		echo "</div>";
	}
}




if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<ul class='navbar-nav'>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
					<li class='nav-item'><a href='#' class='selectBrand nav-link' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</ul>";
	}
}
if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}
if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			echo "
				<div class='col-md-4'>
					<div class='panel panel-info productview' vid='$pro_id' id='$pro_id'>
						<div class='panel-heading'>$pro_title</div>
						<div class='panel-body'>
							<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
						</div>
						<div class='panel-heading'>".CURRENCY." $pro_price.00
							<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
						</div>
					</div>
				</div>	
			";
		}
	}
	
}

if(isset($_POST["getDeal"])){
	$limit = 5;
	$start = 0;

	$month = "Jan";
	$date = "20";
	$year = "2022";
	$hour = "13";
	$minutes = "59";
	$seconds = "00";

	$product_query = "SELECT * FROM products LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	echo "
	<section class='padding-bottom deal-section'>
	<div class='card card-deal'>
	<div class='col-heading content-body'>
	<header class='section-heading'>
	<h3 class='section-title'>Deals and offers</h3>
	</header>
	";

	echo "
	
	<script>

	var endDate = new Date('$month $date, $year $hour:$minutes:$seconds').getTime();
	
	var countDownTimer = setInterval(() => {
	
	var now = new Date().getTime();
	
	var remainingTime = endDate - now;
	
	const second = 1000;
	
	const minute = second * 60;
	
	const hour = minute * 60;
	
	const day = hour * 24;
	
	daysLeft = Math.trunc(remainingTime / day);
	
	hoursLeft = Math.trunc((remainingTime % day) / hour);
	
	minutesLeft = Math.trunc((remainingTime % hour) / minute);
	
	secondsLeft = Math.trunc((remainingTime % minute) / second);
	
	document.querySelector('#days').innerHTML = daysLeft;
	
	document.querySelector('#hours').innerHTML = hoursLeft;
	
	document.querySelector('#minutes').innerHTML = minutesLeft;
	
	document.querySelector('#seconds').innerHTML = secondsLeft;
	
	if (remainingTime <= 0) {
	
	document.querySelector('.deal-section').style = `display:none;opacity:0;width:0;height:0;visibility:hidden;`;
	
	}
	
	}, 1000);
	
	</script>
	
	";

	echo "
	<div class='timer'>
	   <div> <span class='num' id='days'></span> <small>Days</small></div>
       <div> <span class='num' id='hours'></span> <small>Hours</small></div>
       <div> <span class='num' id='minutes'></span> <small>Min</small></div>
       <div> <span class='num' id='seconds'></span> <small>Sec</small></div>
	</div>
	";
	echo "
	</div> 
	<div class='row no-gutters items-wrap'>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			echo "
			<div class='col-md col-6'>
			<figure class='card-product-grid card-sm offer-figure productview' vid='$pro_id' id='$pro_id'>
			 <a href='./products.html' class='img-wrap'> 
			  <img src='product_images/$pro_image'> 
			</a>
			<div class='text-wrap p-3'>
			  <a href='./products.html' class='title text-truncate'>$pro_title</a>
				<p class='text-muted prices'>
					<div class='text-muted old-price'><small>750 ml @ Ksh 1350</small></div>
					<div class='text-muted'><small>750 ml @ Ksh 350</small></div>
				</p>
			  <span class='deal-badge badge-danger'> -10% </span>
			</div>
		   </figure>
		   </div>	
			";
		}
		echo "
		</div>
		</div>
		</section>
		";
	};
}





if(isset($_POST["get_seleted_product"])){
	
	$id = $_POST["v_id"];
	$sql = "SELECT * FROM products WHERE product_id = '$id'";

	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$pro_description = $row['product_desc'];
			// echo "
			// 	<div class='col-xl-2'>
			// 				<div class='panel-danger'>
			// 					<div class='panel-heading'>$pro_title</div>
			// 					<div class='panel-body'>
			// 						<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
			// 					</div>
			// 					<div class='panel-heading'>".CURRENCY." $pro_price.00
			// 						<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
			// 					</div>
			// 				</div>
			// 			</div>	
			// ";


			echo "
			
			<div class='main-section'>
  <span class='breadcrumb'><a href='./index.html'>Home</a> > products</span>
  <hr>
<section class='mb-5 border px-4 py-4'>
    <div class='row'>
      <div class='col-md-6 mb-4 mb-md-0 product-gallery'>
          <div class='product-img'>
              <img src='product_images/$pro_image' alt='product image'>
          </div>
      </div>
      <div>
  
        <h5>$pro_title</h5>

        <div class='table-responsive'>
          <table class='table table-sm table-borderless mb-0'>
            <tbody>
              <tr>
                <th class='pl-0 w-25' scope='row'><strong>Category</strong></th>
                <td>$pro_cat</td>
              </tr>
              <tr>
                <th class='pl-0 w-25' scope='row'><strong>Brand</strong></th>
                <td>$pro_brand</td>
              </tr>
              <tr>
                <th class='pl-0 w-25' scope='row'><strong>In Stock</strong></th>
                <td>24 left</td>
              </tr>
            </tbody>
          </table>
        </div>
        <hr>

        <div class='mb-2 pro-actions'>
          <div class='def-number-input number-input safari_only mb-0 pro-actions-item'>
            <span class='pro-actions-label'>Quantity</span>
            <div class='pro-actions-btn'>
              <button onclick='this.parentNode.querySelector('input[type=number]').stepDown()'
              class='btn-minus'>-</button>
            <input class='quantity' min='1' name='quantity' value='1' type='number' disabled>
            <button onclick='this.parentNode.querySelector('input[type=number]').stepUp()'
              class='btn-plus'>+</button>
            </div>
          </div>

          <div class='pro-actions-item'>
            <span class='pro-actions-label'>Size</span>
            <select name='size' id='size'>
              <option value='1 ltr'>1 ltr</option>
              <option value='750 ml'>750 ml</option>
              <option value='350 ml'>350 ml</option>
            </select>
          </div>
        </div>


        <div class='table-responsive mb-2'>
          <p>
		  <div class='text-muted old-price'><strong>750 ml @ Ksh 1350</strong></div>
		  <span class='mr-1'><strong>750 ml @ Ksh 300.00</strong></span> <span class='deal-badge badge-danger'> -10% </span>
		  </p>
        </div>
		<hr>
        <div class='btns'>
          <button type='button' pid='$pro_id' id='product' class='btn btn-primary btn-md mr-1 mb-2'><i
            class='fas fa-shopping-cart pr-2 big-icon'></i>Add to cart</button>
          <a href='tel:+254741642093' class='btn btn-light btn-md mr-1 mb-2'><i
            class='fas fa-phone pr-2 big-icon'></i>Call</a>  
          <a href='https://api.whatsapp.com/send?phone=254741642093&text=I want to buy $pro_title $pro_cat' class='btn btn-light btn-md mr-1 mb-2'><i
              class='fab fa-whatsapp pr-2 big-icon'></i>WhatsApp</a>   
        </div>
      </div>
    </div>
  
  </section>


<div class='classic-tabs border rounded px-4 pt-1'>
    <ul class='nav tabs-primary nav-justified' id='advancedTab' role='tablist'>
      <li class='nav-item'>
        <a class='nav-link active show' id='description-tab' data-toggle='tab' href='#description' role='tab' aria-controls='description' aria-selected='true'>Description</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' id='reviews-tab' data-toggle='tab' href='#reviews' role='tab' aria-controls='reviews' aria-selected='false'>Reviews</a>
      </li>
    </ul>
    <hr>
    <div class='tab-content mt-3' id='advancedTabContent'>
      <div class='tab-pane fade show active' id='description' role='tabpanel' aria-labelledby='description-tab'>
        <h5>Product Description</h5>
        <p class='small text-muted text-uppercase mb-2'>Name: $pro_title</p>
        <p class='small text-muted text-uppercase mb-2'>Category: $pro_cat</p>
        <p class='small text-muted text-uppercase mb-2'>Brand: $pro_brand</p>
        
        <h6>Price: Ksh $pro_price</h6>
		<br>
        <p class='pt-1'>$pro_description</p>
		<br>
		<hr>
        <h5>Additional Information</h5>
        <div>
        <h5 class='pt-3 pb-3 text-muted'>NO ADDITIONAL INFORMATION <i class='fas fa-exclamation'></i></h5>
      </div>
      </div>
      <div class='tab-pane fade' id='reviews' role='tabpanel' aria-labelledby='reviews-tab'>
        <center><h5 class='pt-3 pb-3 text-muted'>NO REVIEWS YET <i class='fas fa-exclamation'></i></h5></center>
      </div>
    </div>
	<br>
	<br>
  
  </div>
  <br>
  <br>
</div>     
			
			";
		}
}


if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE product_cat = '$id'";
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products WHERE product_brand = '$id'";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info productview' vid='$pro_id'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading'>".CURRENCY." $pro_price.00
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div>
						</div>	
			";
		}
	}
	


	if(isset($_POST["addToCart"])){
		

		$p_id = $_POST["proId"];
		

		if(isset($_SESSION["uid"])){

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			";//not in video
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$user_id','1')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";
			}
		}
		}else{
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
					exit();
			}
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')";
			if (mysqli_query($con,$sql)) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product is Added Successfully..!</b>
					</div>
				";
				exit();
			}
			
		}
		
		
		
		
	}

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				echo '
				<div class="col-12">
					<div class="row">
						<div class="col-md-3">'.$n.'</div>
						<div class="col-md-3 pro-image"><img class="img-responsive" src="product_images/'.$product_image.'" /></div>
						<div class="col-md-3">'.$product_title.'</div>
						<div class="col-md-3">'.CURRENCY.''.$product_price.'</div>
					</div>
				</div>';
					
				
			}
			?>
				<a style="float:right;" href="cart.php" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
			<?php
			exit();
		}
	}
	if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			echo "<form method='post' action='login_form.php'>";
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["product_image"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];

					echo 
						'<div class="row">
								<div class="col-md-2">
									<div class="btn-group">
										<a href="#" remove_id="'.$product_id.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" update_id="'.$product_id.'" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
								<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
								<input type="hidden" name="" value="'.$cart_item_id.'"/>
								<div class="col-md-2"><img class="img-responsive" src="product_images/'.$product_image.'"></div>
								<div class="col-md-2">'.$product_title.'</div>
								<div class="col-md-2"><input type="text" class="form-control qty" value="'.$qty.'" ></div>
								<div class="col-md-2"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></div>
								<div class="col-md-2"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></div>
							</div>';
				}
				
				echo '<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b class="net_total" style="font-size:20px;"> </b>
					</div>';
				if (!isset($_SESSION["uid"])) {
					echo '<input type="submit" style="float:right;" name="login_user_with_product" class="btn btn-info btn-lg" value="Ready to Checkout" >
							</form>';
					
				}else if(isset($_SESSION["uid"])){
					//Paypal checkout form
					echo '
						</form>
						<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="business" value="shoppingcart@khanstore.com">
							<input type="hidden" name="upload" value="1">';
							  
							$x=0;
							$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
							$query = mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($query)){
								$x++;
								echo  	
									'<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
								}
							  
							echo   
								'<input type="hidden" name="return" value="http://localhost/project1/payment_success.php"/>
					                <input type="hidden" name="notify_url" value="http://localhost/ecommerce/payment_success.php">
									<input type="hidden" name="cancel_return" value="http://localhost/ecommerce/cancel.php"/>
									<input type="hidden" name="currency_code" value="USD"/>
									<input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
									<input style="float:right;margin-right:80px;" type="image" name="submit"
										src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png" alt="PayPal Checkout"
										alt="PayPal - The safer, easier way to pay online">
								</form>';
				}
			}
	}
	
	
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}
}




?>






