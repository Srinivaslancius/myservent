
<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include_once 'meta.php';?>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
	
	<!-- Google web fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Lato:300,400|Montserrat:400,400i,700,700i" rel="stylesheet">

	<!-- CSS -->
	<link href="css/base.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
	<link href="css/shop.css" rel="stylesheet">

	<link href="css/date_time_picker.css" rel="stylesheet">
	<!-- Range slider -->
	<link href="css/ion.rangeSlider.css" rel="stylesheet">
	<link href="css/ion.rangeSlider.skinFlat.css" rel="stylesheet">

	<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

	

	<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<!-- Header================================================== -->
	<header>
		<?php include_once './top_header.php';?>
		<!-- End top line-->

		<div class="container">
                    <?php include_once './menu.php';?>
		</div>
		<!-- container -->
                
        </header>
	<!-- End Header -->

	<section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_1.jpg" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-1">
			<div class="animated fadeInDown">
				<h1>Shopping cart</h1>
				<p></p>
			</div>
		</div>
	</section>
	<!-- End Section -->

	<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="#">Home</a>
					</li>
					<li><a href="#">Category</a>
					</li>
					<li>Page active</li>
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="container margin_60">
			<div class="cart-section">
				<table class="table table-striped cart-list shopping-cart">
					<thead>
						<tr>
							<th>
								Particulars
							</th>
							<th>
								Price
							</th>
							<th>
								Date
							</th>
                                                        <th>
                                                            Time
                                                        </th>
                                                        <th>
								Quantity
							</th>
                                                        
							<th>
								Total
							</th>
							<th>
								Remove
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
                                                    <td>1 BHK</td>
                                                    <td>Rs. 3499/-</td>
                                                    <td><input class="date-pick form-control" data-date-format="M d, D" type="text"></td>
                                                    <td><input class="time-pick form-control" value="12:00 AM" type="text"></td>
                                                    <td>
                                                        <div class="numbers-row">
                                                            <input type="text" value="1" id="quantity_2" class="qty2 form-control" name="quantity_2">
                                                        </div>
                                                    </td>
                                                    <td>Rs. 3499/-</td>
							<td class="options">
								<a href="#"><i class=" icon-trash"></i></a>
							</td>
						</tr>
						
					</tbody>
				</table>

				<div class="cart-options clearfix">
					<div class="pull-left">
						<div class="apply-coupon">
							<div class="form-group">
								<input type="text" name="coupon-code" value="" placeholder="Your Coupon Code" class="form-control">
							</div>
							<div class="form-group">
								<button type="button" class="btn_cart_outine">Apply Coupon</button>
							</div>
						</div>
					</div>
					<div class="pull-right fix_mobile">
						<button type="button" class="btn_cart_outine">Update Cart</button>
					</div>
				</div>
				<div class="row">
					<div class="column pull-right col-md-4 col-sm-6 col-xs-12">
						<ul class="totals-table">
							<li class="clearfix"><span class="col">Sub Total</span><span class="col">Rs. 3499.00</span>
							</li>
							<li class="clearfix total"><span class="col">Order Total</span><span class="col">Rs. 3499/-</span>
							</li>
						</ul>
                                            <a href="checkout.php" class="btn_full">Proceed to Checkout <i class="icon-left"></i></a>
					</div>
				</div>
			</div>
		</div>
		<!-- End Container -->
	</main>
	<!-- End main -->

	<footer class="revealed">
            <?php include_once 'footer.php';?>
        </footer><!-- End footer -->

	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- Search Menu -->
	<div class="search-overlay-menu">
		<span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
		<form role="search" id="searchform" method="get">
			<input value="" name="q" type="search" placeholder="Search..." />
			<button type="submit"><i class="icon_set_1_icon-78"></i>
			</button>
		</form>
	</div><!-- End Search Menu -->

	<!-- Common scripts -->
	<script src="/cdn-cgi/scripts/84a23a00/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/common_scripts_min.js"></script>
	<script src="js/functions.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-timepicker.js"></script>
        <script>
		$('input.date-pick').datepicker('setDate', 'today');
		$('input.time-pick').timepicker({
			minuteStep: 15,
			showInpunts: false
		})
	</script>

	<script>
		if ($('.prod-tabs .tab-btn').length) {
			$('.prod-tabs .tab-btn').on('click', function (e) {
				e.preventDefault();
				var target = $($(this).attr('href'));
				$('.prod-tabs .tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				$('.prod-tabs .tab').fadeOut(0);
				$('.prod-tabs .tab').removeClass('active-tab');
				$(target).fadeIn(500);
				$(target).addClass('active-tab');
			});

		}
	</script>

</body>

</html>