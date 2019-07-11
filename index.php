<?php
//This serves as the homepage for the website
require_once '../util/db.php' ;
require_once '../controller/loginCon.php';
require_once '../view/navbar.php';
?>
<html>

<head>
  <title>TLA App</title>

    <!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body style="font-family: 'Montserrat', sans-serif;" id="myPage">

 <section id="header" class="jumbotron text-center">
        <h1 class="display-3" style="font-family: 'Montserrat', sans-serif;">TLA App</h1>
        <p class="lead" style="font-family: 'Montserrat', sans-serif;">Truck Logistics Application</p>
        <a href="login.php" style="font-family: 'Montserrat', sans-serif;" class="btn btn-primary">Login</a>
        <a href="signup.php" style="font-family: 'Montserrat', sans-serif;" class="btn btn-success">Signup</a>
        <br><br>
        <a href="../view/truckInfo.php" style="font-family: 'Montserrat', sans-serif;" class="btn btn-info">Manage Fleet</a>
</section>

<!-- Footer -->
<footer style="color:#DC143C" class="container-fliud text-center">
	<a href="#myPage" title="To Top">
		<span style='color:#DC143C;'class="glyphicon glyphicon-chevron-up"></span>
	</a>
</footer>

</html>