
<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php include_once 'meta.php';?>
	<?php 
		error_reporting(0);
		if (isset($_POST['register']))  {
                //If success
                $user_full_name = $_POST['user_name'];
                $user_email = $_POST['user_email'];
                $user_mobile = $_POST['user_mobile'];
                $user_password = encryptPassword($_POST['user_password']);
                $confirm_password = encryptPassword($_POST['confirm_password']);
                $created_admin_id = $_SESSION['services_admin_user_id'];
                $created_at = date("Y-m-d h:i:s");
                
			    $dataem = $user_email;
				//$to = "srinivas@lanciussolutions.com";
				$to = "$dataem";
				$from = $getSiteSettingsData["email"];
				$subject = "Myservent - Registration ";
				$message = "";
				$message .= "<style>
				        .body{
				    width:100% !important; 
				    margin:0 !important; 
				    padding:0 !important; 
				    -webkit-text-size-adjust:none;
				    -ms-text-size-adjust:none; 
				    background-color:#FFFFFF;
				    font-style:normal;
				    }
				    .header{
				    background-color:#f26226;
				    color:white;
				    width:100%;
				    }
				    .content{
				    background-color:#FBFCFC;
				    color:#17202A;
				    width:100%;
				    padding-top:15px;
				    padding-bottom;15px;
				    text-align:justify;
				    font-size:14px;
				    line-height:18px;
				    font-style:normal;
				    }
				    h3{
				    color: #f26226;}
				    .footer{
				    background-color:#f26226;
				    color:white;
				    width:100%;
				    padding-top:9px;
				    padding-bottom:5px;
				    }
				    .logo-responsive{
				    max-width: 100%;
				    height: auto !important;
				    }
				    @media screen and (min-width: 480px) {
				        .content{
				        width:50%;
				        }
				        .header{
				        width:50%;
				        }
				        .footer{
				        width:50%;
				        }
				        .logo-responsive{
				        max-width: 100%;
				        height: auto !important;
				        }
				    }
				    </style>";

				$message .= "<html><head><title>Gerrtings From Myservent</title></head>
				<body>
				        <div class='container header'>
				            <div class='row'>
				                <div class='col-lg-2 col-md-2 col-sm-2'>
				                </div>
				                <div class='col-lg-8 col-md-8 col-sm-8'>
				                <center><h2>".$getSiteSettingsData['admin_title']."</h2></center>
				                </div>
				                <div class='col-lg-2 col-md-2 col-sm-2'>
				                </div>
				            </div>
				        </div>
				        <div class='container content'>
				            Dear<h3>$user_full_name</h3>
				            <p>Your Registration Successfully Completed. Please sign in.</p></br></br>
				            <p>Thanking You</p>
				            <p>My Servant</p>
				        </div>
				        <div class='container footer'>
				            <center>".$getSiteSettingsData['footer_text']."</center>
				        </div>
				    </body>
				</html>";

				//echo $message; die;
				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				//To send Mail
				$mail = sendEmail($to,$subject,$message,$from);
				// $message = "Dear $user_full_name, Your Registration Successfully Completed. Please sign in.";
				// $sma = sendMobileSMS($message,$user_mobile);

				$sql = saveUser($user_full_name, $user_email, $user_mobile, $user_password,$created_admin_id,'','','','','','');
                if ($sql) {
			       echo "<script type='text/javascript'>window.location='login.php?err=log-success'</script>";
			    } else {
			       echo "<script type='text/javascript'>window.location='login.php?err=log-fail'</script>";
			    }

            } else if(isset($_POST['login']))  { 
		    //Login here
		    $user_email = $_POST['login_email'];
		    $user_password = encryptPassword($_POST['login_password']);
		    $getLoginData = userLogin($user_email,$user_mobile,$user_password);
		    //Set variable for session
		    if($getLoggedInDetails = $getLoginData->fetch_assoc()) {
		        $_SESSION['user_login_session_id'] =  $getLoggedInDetails['id'];
		        $_SESSION['user_login_session_name'] = $getLoggedInDetails['user_full_name'];
		        $_SESSION['user_login_session_email'] = $getLoggedInDetails['user_email'];
		        $_SESSION['timestamp'] = time();
		        header('Location: index.php');
		    } else {
		    	//echo "<script>alert('invalid username/password.  Please try again');window.location='index.php';</script>";
		    	header('Location: login.php?err=log-fail');
		    }
		}
	?>

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
	<link href="layerslider/css/layerslider.css" rel="stylesheet">
	<!-- REVOLUTION SLIDER CSS -->
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
		<!-- Slider -->
		 <div class="container-fluid page-title">
		<div class="row">
			<img src="img/slides/slide_3.jpg" class="img-responsive">
		</div>
    </div>
		<div class="container" style="margin-top:-70px">		

           <div class="row">
           	<?php if(isset($_GET['err']) && $_GET['err'] == 'log-success' ) {  ?>
           	  	<div class="col-sm-12 alert alert-success" style="top:90px; display:block">
			      <strong>Success!</strong> Your Registration Successfully Completed.
			    </div>
			<?php }?>

		    <?php if(isset($_GET['err']) && $_GET['err'] == 'log-fail' ) {  ?>
		    <div class="col-sm-12 alert alert-danger" style="top:100px; display:block">
		      <strong>Failed!</strong> Your Login Failed.
		    </div>
		    <?php }?>

		   <div class="col-sm-5">


                	<div id="login">
                    		<div class="text-center"><h2><span>Login</span></h2></div>
                            <hr>
                            <form method="POST">
                            <div class="row">
                            <div class="col-md-6 col-sm-6 login_social">
                                <a href="#" class="btn btn-primary btn-block"><i class="icon-facebook"></i> Facebook</a>
                            </div>
                            <div class="col-md-6 col-sm-6 login_social">
                                <a href="#" class="btn btn-info btn-block "><i class="icon-twitter"></i>Twitter</a>
                            </div>
                            </div> <!-- end row -->
                            <div class="login-or"><hr class="hr-or"><span class="span-or">or</span></div>
                       
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class=" form-control " name="login_email" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class=" form-control" name="login_password" placeholder="Password" required>
                                </div>
                                <p class="small">
                                    <a href="forgot_password.php">Forgot Password?</a>
                                </p>
                                <button type="submit" name="login" class="btn_full">Sign in</button>
                                
                            </form>
                        </div>

                </div>
				
			<div class="col-sm-5">
                	<div id="login">
                    		<div class="text-center"><h2><span>Register</span></h2></div>
                            <hr>
                           <form method="POST">
                                <div class="form-group">
                                	<label>Name</label>
                                    <input type="text" name="user_name" class=" form-control"  placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                	<label>Mobile Number</label>
                                    <input type="text" name="user_mobile" class=" form-control"  placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}" onkeypress="return isNumberKey(event)"required>
                                </div>
                                <div class="form-group">
                                	<label>Email</label>
                                    <input type="email" name="user_email" class=" form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                	<label>Password</label>
                                    <input type="password" name="user_password" class=" form-control" id="user_password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                	<label>Confirm password</label>
                                    <input type="password" name="confirm_password" class=" form-control" id="confirm_password" placeholder="Confirm password" onChange="checkPasswordMatch();" required>
                                </div>
                                <div id="divCheckPasswordMatch" style="color:red"></div>
                                <div id="pass-info" class="clearfix"></div>
                                <button type="submit" name="register" class="btn_full">Create an account</button>
                            </form>
                        </div>
                </div>
				<div class="col-sm-1">
				</div>
				
		   </div>
			
  </div>
  
	</main>
	<!-- End main -->

	<footer class="revealed">
            <?php include_once 'footer.php';?>
    </footer><!-- End footer -->

	<div id="toTop"></div><!-- Back to top button -->
	
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
		function isNumberKey(evt){
  	    var charCode = (evt.which) ? evt.which : event.keyCode
  	    if (charCode > 31 && (charCode < 48 || charCode > 57))
  	        return false;
  	    return true;
    	}
    	function checkPasswordMatch() {
		    var password = $("#user_password").val();
		    var confirmPassword = $("#confirm_password").val();
		    if (confirmPassword != password) {
		        $("#divCheckPasswordMatch").html("Passwords do not match!");
		        $("#confirm_password").val("");
		    } else {
        $("#divCheckPasswordMatch").html("");
    }
		}
	</script>

</body>

</html>