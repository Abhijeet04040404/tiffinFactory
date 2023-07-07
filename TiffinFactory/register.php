<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {
	$fname = $_POST['fname'];
	$mobno = $_POST['mobno'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$c_password = md5($_POST['c_password']);
	if ($password == $c_password) {
		$ret = "select Email from tbluser where Email=:email";
		$query = $dbh->prepare($ret);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		if ($query->rowCount() == 0) {
			$sql = "Insert Into tbluser(FullName,MobileNumber,Email,Password)Values(:fname,:mobno,:email,:password)";
			$query = $dbh->prepare($sql);
			$query->bindParam(':fname', $fname, PDO::PARAM_STR);
			$query->bindParam(':email', $email, PDO::PARAM_STR);
			$query->bindParam(':mobno', $mobno, PDO::PARAM_INT);
			$query->bindParam(':password', $password, PDO::PARAM_STR);
			$query->execute();
			$lastInsertId = $dbh->lastInsertId();
			if ($lastInsertId) {

				echo "<script>alert('You have successfully registered with us');</script>";
			} else {

				echo "<script>alert('Something went wrong.Please try again');</script>";
			}
		} else {
			echo "<script>alert('Email-id already exist. Please try again');</script>";
		}
	} else {
		echo "<script>alert('Password Not Matched. Please Try Again');</script>";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Tiffin Factory | Register </title>
	<link rel="icon" type="image/x-icon" href="images/pagelogo.ico">
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Font Awesome icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--webfont-->
	<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<!--Animation-->
	<script src="js/wow.min.js"></script>
	<link href="css/animate.css" rel='stylesheet' type='text/css' />
	<script>
		new WOW().init();
	</script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1200);
			});
		});
	</script>
	<script src="js/simpleCart.min.js"> </script>

</head>

<body>
	<!-- header-section-starts -->
	<div class="header">
		<?php include_once('includes/header.php'); ?>
	</div>
	<!-- header-section-ends -->
	<!-- content-section-starts -->
	<div class="content">
		<div class="container">
			<div class="login-page">
				<div class="dreamcrub">
					<ul class="breadcrumbs">
						<li class="home">
							<a href="index.php" title="Go to Home Page">Home &nbsp; ></a>&nbsp;
						</li>
						<li class="women">
							Sign Up
						</li>
					</ul>
					<ul class="previous">
						<li><a href="index.php">Back to Previous Page</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="account_grid">
					<div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
						<h3>Existing CUSTOMERS</h3>
						<p>By creating an account with our store, you will be able to move through the checkout process faster, view and track your orders in your account and more.</p>
						<a class="acount-btn" href="login.php">Already Have an Account</a>
					</div>
					<div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
						<h3>REGISTERED With Us</h3>
						<p>If you have not an account with us, please Sign Up.</p>
						<form method="post">


							<div>
								<span><label>Full Name</label> <i class="fa fa-user" aria-hidden="true"></i></span>
								<input type="text" placeholder="Enter Your Full Name" name="fname" required>
							</div>
							<div>
								<span><label>Mobile Number</label> <i class="fa fa-mobile" style="font-size:18px" aria-hidden="true"></i></span>
								<input type="text" placeholder="Enter Your Mobile No." name="mobno" maxlength="10" pattern="[0-9]+" required>
							</div>
							<div>
								<span><label>Email Address</label> <i class="fa fa-envelope" aria-hidden="true"></i></span>
								<input type="email" placeholder="Enter Your Email Id" name="email" id="email" required onBlur="userAvailability()">
								<span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							<div>
								<span><label>Password</label> <i class="fas fa-lock"></i></span>
								<input type="password" placeholder="Enter Strong Password" name="password" required>
							</div>
							<div>
								<span><label>Confirm Password</label> <i class="fas fa-lock"></i></i></span>
								<input type="password" placeholder="Confirm Your Password" name="c_password" required>
							</div>

							<input type="submit" value="Sign Up" name="submit" id="submit" style="cursor:pointer">
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>

	</div>
	<!-- content-section-ends -->
	<!-- footer-section-starts -->
	<?php include_once('includes/footer.php'); ?>
	<!-- footer-section-ends -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<script>
		function userAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_emailavailability.php",
				data: 'email=' + $("#email").val(),
				type: "POST",
				success: function(data) {
					$("#user-availability-status1").html(data);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		}
	</script>
</body>

</html>