<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include_once 'meta.php';?>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    
    <!-- Google web fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Lato:300,400|Montserrat:400,400i,700,700i" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/base.css" rel="stylesheet">
        <link href="site_launch/css/style.css" rel="stylesheet">

    <!-- REVOLUTION SLIDER CSS -->
    <link href="layerslider/css/layerslider.css" rel="stylesheet">
    <!-- MYDASHBOARD CSS-->
    <link href="css/my-dashboard.css" rel="stylesheet">
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

<main>
    <div class="container-fluid page-title">
            <?php if($getContentPageData->num_rows > 0) { ?>    
                <div class="row">
                    <img src="<?php echo $base_url . 'uploads/services_content_pages_images/'.$getAboutUsData['image'] ?>" alt="<?php echo $getAboutUsData['title'];?>" class="img-responsive">
                </div>
            <?php } else { ?>
                <div class="row">
                    <img src="img/slides/slide_1.jpg" class="img-responsive">
                </div>
            <?php }?>   
        </div>
    <br>
    <div class="container">
        <div class="row">
            <!-- <div class="col-xs-12 bhoechie-tab-container"> -->
            <div class="col-xs-4">
                <div class="bhoechie-tab-menu">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">
                            <h5><b><i class="fa fa-first-order" aria-hidden="true"></i>MY ORDERS</b><i class="fa fa-chevron-right pull-right" aria-hidden="true"></i></h5>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item">
                            <h5><b><i class="fa fa-user-circle-o" aria-hidden="true"></i>ACCOUNT SETTINGS</b></h5>
                        </a>
                        <a href="#" class="list-group-item sub">
                            <p>Personal Information</p>
                        </a>
                    </div>
                    <a href="change_password.php" class="list-group-item sub"><p>Change Password</p></a>
                </div>
            </div>
            <div class="col-xs-8 bhoechie-tab">
                <!-- My orders section -->
                <div class="bhoechie-tab-content active">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p>ORDER PLACED<br>17 Apr 2017</p>
                                        </div>
                                        <div class="col-sm-2">
                                            <p>TOTAL<br>$399.00</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p>SHIP TO<br><a href="javascript:void(0);">Swapna</a></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p>ORDER #406-299-789546-108<br><a href="javascript:void(0);">Order details</a> &nbsp; <a href="javascript:void(0);">Invoice</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="pixel.png" class="img-responsive">
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 style="margin-bottom:0;">Google Pixel XL (Quite Black, 128 GB)</h5>
                                            <p style="font-size: 11px;">by Google</p>
                                            <p><b style="color:brown; font-size: 14px;">$399.00</b> <span style="font-size: 11px; text-decoration: line-through;">$500.00</span></p>
                                            <p style="margin-bottom: 0;">More Buying Choices</p>
                                            <p><b style="color:brown; font-size: 12px;">$380.00</b> (6 offers)</p>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-4">
                                            <p style="font-size: 30px; font-weight: bold;"><span style="color: gold;">&#9733;&#9733;&#9733;&#9733;</span>&#9734;</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Account settings section -->
                <div class="bhoechie-tab-content">
                </div>
                <!-- Personal info section -->
                
                <div class="bhoechie-tab-content">
                    <form>
                        <div class="row">
                            <?php $uid=$_SESSION['user_login_session_id'];
                                  $getUser = "SELECT * FROM users where id='$uid' AND lkp_status_id = 0 ";
                                  $getUserInfo = $conn->query($getUser);
                                  $getUserData = $getUserInfo->fetch_assoc();
                            ?>
                            <div class="col-sm-12" style="margin-bottom: 10px;">
                                <h4><b>Personal Information</b></h4>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="first-name">First name</label>
                                    <input type="text" class="form-control" readonly id="first-name" placeholder="Name" value="<?php echo $_SESSION['user_login_session_name'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="sur-name">Last name</label>
                                    <input type="text" class="form-control" id="full-name" placeholder="Fullname" value="<?php echo $getUserData['user_full_name'];?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="abc@gmail.com" value="<?php echo $getUserData['user_email'];?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" placeholder="9876543210" value="<?php echo $getUserData['user_mobile'];?>" readonly>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
              
                
            </div>
            <!-- </div> -->
        </div>

        </main>
    <!-- End main -->

    <footer class="revealed">
            <?php include_once 'footer.php';?>
    </footer><!-- End footer -->

        <!-- Search Menu -->
    
    <!-- Common scripts -->
    <script src="../cdn-cgi/scripts/78d64697/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/common_scripts_min.js"></script>
    <script src="js/functions.js"></script>

    <!-- Specific scripts -->
    <script src="layerslider/js/greensock.js"></script>
    <script src="layerslider/js/layerslider.transitions.js"></script>
    <script src="layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            'use strict';
            $('#layerslider').layerSlider({
                autoStart: true,
                responsive: true,
                responsiveUnder: 1280,
                layersContainer: 1170,
                skinsPath: 'layerslider/skins/'
                    // Please make sure that you didn't forget to add a comma to the line endings
                    // except the last line!
            });
        });
    </script>
        <!---<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
        <script>
            $(document).ready(function() {
                $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
                    e.preventDefault();
                    $(this).siblings('a.active').removeClass("active");
                    $(this).addClass("active");
                    var index = $(this).index();
                    $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                    $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
                });
            });
        </script>
</body>

</html>