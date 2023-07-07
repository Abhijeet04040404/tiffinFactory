<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Tiffin Factory | Contact Us </title>
	<link rel="icon" type="image/x-icon" href="images/pagelogo.ico">
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Custom Theme files -->

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
		<!-- header-section-ends -->
		<div class="contact-section-page">
			<div class="contact-head">
				<div class="container">
					<h3>Contact Us</h3>
					<p>Home/Contact Us</p>
				</div>
			</div>
			<div class="contact_top">
				<div class="container">
					<?php
					$sql = "SELECT * from tblpage where PageType='contactus'";
					$query = $dbh->prepare($sql);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);

					$cnt = 1;
					if ($query->rowCount() > 0) {
						foreach ($results as $row) {               ?>

							<div class="col-md-6 company-right wow fadeInLeft" data-wow-delay="0.4s">


								<div class="company-right">
									<div class="company_ad">
										<h3><?php echo htmlentities($row->PageTitle); ?></h3>

										<address class="text-dark">
											<p><b>Email :</b> <?php echo htmlentities($row->Email); ?></p>
											<p><b>Phone :</b> <?php echo htmlentities($row->MobileNumber); ?></p>
											<p><b>Address :</b> <?php echo htmlentities($row->PageDescription); ?></p>


										</address>
									</div>
								</div>
								<div class="follow-us">
									<h3>follow us on</h3>
									<a href="#"><i class="facebook"></i></a>
									<a href="#"><i class="twitter"></i></a>
									<a href="#"><i class="google-pluse"></i></a>
								</div>
							</div>
							<div class="col-md-6 company-right wow fadeInLeft" data-wow-delay="0.4s">
								<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14251.557422555155!2d83.36825295!3d26.747906699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1683083798349!5m2!1sen!2sin" width="600" height="270" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							</div>
				</div> <?php $cnt = $cnt + 1;
						}
					} ?>

			</div>
		</div>
		<?php include_once('includes/footer.php'); ?>
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

</body>

</html>