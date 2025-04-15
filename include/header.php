<?php
session_start();
 define("APPURL" , 'http://localhost/hotel-booking');
 define("HOTELROOM" , 'http://localhost/hotel-booking/admin-panel/rooms-admins/room_image');
 define("HOTELIMAGE" , 'http://localhost/hotel-booking/admin-panel/hotels-admins/hotel_image');
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vacation Rental - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="<?php echo APPURL;?>/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo APPURL;?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo APPURL;?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo APPURL;?>/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo APPURL;?>/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo APPURL;?>/css/jquery.timepicker.css">

    <link rel="stylesheet" href="<?php echo APPURL?>/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo APPURL?>/css/style.css">
  </head>
  <body>
		
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="<?php echo APPURL?>/index.php">Vacation<span>Rental</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
	        	<li class="nav-item"><a href="rooms.php" class="nav-link">Apartment Room</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

			  <?php if(!isset($_SESSION['username'])) :?>

	          <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
	          <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
			  <?php else :?>
			  <li class="nav-item dropdown">

  <a class="nav-link  dropdown-toggle" href="#" role="button" style="color: black;" data-bs-toggle="dropdown" aria-expanded="false">
   <?php echo $_SESSION['username']?>
</a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="<?php echo APPURL?>/booking.php">Booking</a></li>
    <li><a class="dropdown-item" href="<?php echo APPURL?>/auth/logout.php">logout</a></li>
  </ul>
			  </li>
			  <?php endif; ?>
	
	        </ul>
	      </div>
	    </div>
	  </nav>