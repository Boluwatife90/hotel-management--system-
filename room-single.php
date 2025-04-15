<?php require_once './include/header.php' ;
require_once './config/config.php';



if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:'.APPURL.'/index.php');
    exit;
}

if(isset($_GET['id'])){
$id = $_GET['id'];

$connection = $conne->query("SELECT * FROM apartmentroom  WHERE status = 1 AND id='$id'");
$connection->execute();
$singleroom = $connection->fetch(PDO::FETCH_OBJ);
$utilities = $conne->query("SELECT * FROM utilities  WHERE  hotel_id='$id'");
$utilities->execute();
$allutilities = $utilities->fetchAll(PDO::FETCH_OBJ);
}

?>


<?php
if(isset($_POST['btn'])){
	if(!isset($_SESSION['username'])){
	
		header("location:./login.php?loginfirst=true");
	}
    if(empty($_POST['email']) OR empty($_POST['name']) OR empty($_POST['number']) OR empty($_POST['checkin'])
     OR empty($_POST['checkout'])){
echo "<script> alert('one or more input are empty')</script>";
    }else{

		$checkin =date_create($_POST['checkin']);
		$checkout = date_create($_POST['checkout']);
		$diff = date_diff($checkin,$checkout);
		$final =  $singleroom->price * intval($diff->format('%R%a'));
	
		
		$arr = [
			"email"=> $_POST['email'],
			"myname" => $_POST['name'],
			"mynumber" => $_POST['number'],
			"checkin" => $_POST['checkin'],
			"checkout" => $_POST['checkout'],
			"roomname" => $singleroom->name,
			"user_id" => $_SESSION['id'],
			"hotel_id" => $id,
			"hotelname" => $singleroom->hotelname,
			"status" => 'pending',
			"payment" => $final,

		];
		$_SESSION["myprice"]=$final ;

		
 if( date("m/d/y") > $arr['checkin'] OR date("m/d/y") > $arr['checkout']){
	echo "<script> alert('pick a date that is not in the past')</script>";
 }else{
	if($arr['checkout'] < $arr['checkin']  OR  $arr['checkin'] < date("m/d/y")){
		echo "<script> alert('Your check-out date must be greater than your checkin date ')</script>";
	}else{
$booking = $conne->prepare("INSERT INTO bookings (email,myname,mynumber,checkin,checkout,roomname,userid,hotelid , hotelname,status,payment)  VALUES(?,?,?,?,?,?,?,?,?,?,?)");
$counter = 1;
foreach($arr as $data){
	$booking->bindValue($counter,$data);
	$counter ++;
}
$booking->execute();

header("location:".APPURL."/pay.php");
	}
 }
	}
}


?>
    <!-- END nav -->

    <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo HOTELROOM?>/<?php echo $singleroom->image ?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate">
          	<h2 class="subheading">Welcome to Vacation Rental</h2>
          	<h1 class="mb-4"><?php echo $singleroom->name ?></h1>
            <!-- <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    	<div class="container">
	    	<div class="row justify-content-end">
	    		<div class="col-lg-4">
					<form action="room-single.php?id=<?php echo $id?> " method="POST" class="appointment-form" style="margin-top: -568px;">
						<h3 class="mb-3">Book this room</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="email" class="form-control" placeholder="Email">
								</div>
							</div>
						   
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Full Name">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="number" class="form-control" placeholder="Phone Number">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
								<div class="input-wrap">
									<div class="icon"><span class="ion-md-calendar"></span></div>
										<input type="text" name="checkin" class="form-control appointment_date-check-in" placeholder="Check-In">
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
									<div class="form-group">
										<div class="icon"><span class="ion-md-calendar"></span></div>
										<input type="text" name="checkout" class="form-control appointment_date-check-out" placeholder="Check-Out">
									</div>
							</div>
							
						
						
							<div class="col-md-12">
								<div class="form-group">
								<input type="submit" name="btn" value="Book and Pay Now" class="btn btn-primary py-3 px-4">
								</div>
							</div>
						</div>
				</form>
	    		</div>
	    	</div>
	    </div>
    </section>
   


  


    <section class="ftco-section bg-light">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 wrap-about">
						<div class="img img-2 mb-4" style="background-image: url(images/image_2.jpg);">
						</div>
						<h2>The most recommended vacation rental</h2>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section">
	          	<div class="pl-md-5">
		            <h2 class="mb-2">What we offer</h2>
	            </div>
	          </div>
	          <div class="pl-md-5">
							<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
							<div class="row">
								<?php foreach($allutilities as $allutilitiedata) : ?>
		            <div class="services-2 col-lg-6 d-flex w-100">
		              <div class="icon d-flex justify-content-center align-items-center">
		            		<span class="<?php echo $allutilitiedata->icon ?> "></span>
		              </div>
		              <div class="media-body pl-3">
		                <h3 class="heading"><?php echo $allutilitiedata->name ?></h3>
		                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
		              </div>
		            </div> 
		          
					<?php endforeach ;?>
				</div>
			</div>
		</section>
		
		<section class="ftco-intro" style="background-image: url(images/image_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-9 text-center">
						<h2>Ready to get started</h2>
						<p class="mb-4">It’s safe to book online with us! Get your dream stay in clicks or drop us a line with your questions.</p>
						<p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Learn More</a> <a href="#" class="btn btn-white px-4 py-3">Contact us</a></p>
					</div>
				</div>
			</div>
		</section>


  <?php require_once './include/footer.php' ?>