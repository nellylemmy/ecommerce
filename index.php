<?php
require "config/constants.php";
session_start();
if(isset($_SESSION["uid"])){
	header("location:profile.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Godrinks online Liqueur store. we deliver drinks around Nairobi.Call us now to get your favorite drink to where you are">
		<meta name="keywords" content="Online shop, shop, Liqueur, drinks, alcohol, go">
		<title>GO DRINKS</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/all.min.css"/>
		<link rel="stylesheet" href="css/prod.css"/>
		<link rel="stylesheet" href="css/responsive.css"/>
		<link rel="stylesheet" href="css/ui.css"/>
		<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->

		<script src="js/jquery2.js"></script>
		<script src="js/all.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/details.js"></script>
		<script src="js/prod.js"></script>
		<script src="js/script.js"></script>
		<script src="main.js"></script>
		
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>

<div class="row">
			<div class="col-md-12 col-xs-12" id="product_msg"></div>
		</div>
<header class="section-header">
<section class="header-main border-bottom">
	<div class="container">
		<div class="row align-items-center main-top-nav">
			<div class="col-xl-2 col-lg-3 col-md-12 logo-section">
				<a href="./" class="brand-wrap">
					<img class="logo" src="images/goshop-template-4.png">
				</a> <!-- brand-wrap.// -->
			</div>
			<div class="col-xl-6 col-lg-5 col-md-6 search-container">
				<form action="#" class="search-header">
					<div class="input-group">
					    <input type="text" class="form-control" placeholder="Search">
					    
					    <div class="input-group-append">
					      <button class="btn btn-primary" type="submit">
					        <i class="fa fa-search"></i> Search
					      </button>
					    </div>
				    </div>
				</form> <!-- search-wrap .end// -->
			</div> <!-- col.// -->
			<div class="col-xl-4 col-lg-4 col-md-6">
				<div class="widgets-wrap float-md-right">
				  <div class="widget-header cart-icon nav navbar-nav navbar-right">
					<a href="#" class="widget-view" data-toggle="dropdown">
						<div class="icon-area">
							<i class="fa fa-shopping-cart"></i>
							<span class="notify badge">0</span>
						</div>
						<small class="text"> Cart </small>
					</a>
					<div class="dropdown-menu dropdown-small">
						<nav class="row">
							<div class="col-12">
								<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in <?php echo CURRENCY; ?></div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								</div>
							</div>
							<div class="panel-footer"></div>
						</nav>
					</div>
				  </div>

				  <span class="widget-header profile-icon"><a href="#" class="widget-view" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
				  <div class="icon-area">
						<i class="fa fa-user"></i>
					  </div>
					  <small class="text"> My profile </small>
				</a>
					<span class="dropdown-menu">
						<div style="width:300px;">
							<div class="panel panel-primary">
								<div class="panel-heading">Login</div>
								<div class="panel-heading">
									<form onsubmit="return false" id="login">
										<label for="email">Email</label>
										<input type="email" class="form-control" name="email" id="email" required/>
										<label for="email">Password</label>
										<input type="password" class="form-control" name="password" id="password" required/>
										<p><br/></p>
										<a href="http://localhost/ecommerce/customer_registration.php?register=1" style="color:white; list-style:none;">Sign Up</a><input type="submit" class="btn btn-success" style="float:right;">
									</form>
								</div>
								<div class="panel-footer" id="e_msg"></div>
							</div>
						</div>
					</span>
				</span>


				</div> <!-- widgets-wrap.// -->
			  </div> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->


<nav class="navbar navbar-main navbar-expand-lg border-bottom">
<div class="container">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="main_nav">
	<div id="get_brand"></div>
	
	<ul class="navbar-nav ml-md-auto">
		<li class="nav-item">
        <span class="nav-link"><a href="tel:+254741642093">Call to order: +254741642093</a></span> 
        </li>
	</ul>
	</div> <!-- collapse .// -->
</div> <!-- container .// -->
</nav>

</header> <!-- section-header.// -->




<div class="container">

<!-- ========================= SECTION MAIN  ========================= -->
<section class="section-main padding-y">
<main class="card">
	<div class="card-body">

<div class="row">
	<aside class="col-lg col-md-3 flex-lg-grow-0">
		<nav class="nav-home-aside">
		<div id="get_category"></div>
		</nav>
	</aside> <!-- col.// -->
	<div class="col-md-9 col-xl-7 col-lg-7">

<!-- ================== COMPONENT SLIDER  BOOTSTRAP  ==================  -->
<div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
  <!-- <ol class="carousel-indicators">
    <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
    <li data-target="#carousel1_indicator" data-slide-to="1"></li>
    <li data-target="#carousel1_indicator" data-slide-to="2"></li>
  </ol> -->
  
	  <div id="slide_img"></div>
    <!-- <div class="carousel-item active">
      <img src="images/banners/ban1.jpg" alt="First slide"> 
    </div>
    <div class="carousel-item">
      <img src="images/banners/ban2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img src="images/banners/ban3.png" alt="Third slide">
    </div> -->
  
  <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
<!-- ==================  COMPONENT SLIDER BOOTSTRAP end.// ==================  .// -->	

	</div> <!-- col.// -->
	<div class="col-md d-none d-lg-block flex-grow-1">
		<div id="slider_right_content"></div>
	</div> <!-- col.// -->
</div> <!-- row.// -->

	</div> <!-- card-body.// -->
</main> <!-- card.// -->

</section>
<!-- ========================= SECTION MAIN END// ========================= -->
</div>









	<div class="">
		<div class="">
		<div class="collapse navbar-collapse" id="collapse">
			
			<!-- <form class="navbar-form navbar-left">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search" id="search">
		        </div>
		        <button type="submit" class="btn btn-primary" id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
		     </form> -->
			<!-- <ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in <?php echo CURRENCY; ?></div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>

				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>SignIn</a>
					<ul class="dropdown-menu">
						<div style="width:300px;">
							<div class="panel panel-primary">
								<div class="panel-heading">Login</div>
								<div class="panel-heading">
									<form onsubmit="return false" id="login">
										<label for="email">Email</label>
										<input type="email" class="form-control" name="email" id="email" required/>
										<label for="email">Password</label>
										<input type="password" class="form-control" name="password" id="password" required/>
										<p><br/></p>
										<a href="http://localhost/ecommerce/customer_registration.php?register=1" style="color:white; list-style:none;">Sign Up</a><input type="submit" class="btn btn-success" style="float:right;">
									</form>
								</div>
								<div class="panel-footer" id="e_msg"></div>
							</div>
						</div>
					</ul>
				</li>
			</ul> -->
		</div>
	</div>
</div>	

<div class="container">

<!-- =============== SECTION DEAL =============== -->
<div id="deal"></div>
<!-- =============== SECTION DEAL // END =============== -->



<div id="get_product_category"></div>

<div id="get_product">
<!--Here we get product jquery Ajax Request-->
</div>

</div>

<!-- <script>

	var endDate = new Date('Jan 20, 2021 00:00:00').getTime();
	
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
	
	</script> -->
</body>
</html>
















































