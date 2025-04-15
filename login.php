<?php  require_once './include/header.php';

if(isset($_SESSION['username'])){
	echo "<script> window.location.href='".APPURL."'</script>";
}


if(isset($_GET['loginfirst'])){
    if($_GET['loginfirst']='true'){
        echo "<script> alert('you need to login first')</script>";
    }
 }



 
if(isset($_GET['not'])){
    if($_GET['not']='true'){
        echo "<script> alert('password not correct')</script>";
    }
 }

if(!empty($_GET['subitted'])){
  if($_GET['subitted']==='false'){
    echo "<script> alert('one or more input are empty')</script>";;
  }
}



?>




    <div class="hero-wrap js-fullheight" style="background-image: url('images/image_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate">
          	<!-- <h2 class="subheading">Welcome to Vacation Rental</h2>
          	<h1 class="mb-4">Rent an appartment for your vacation</h1>
            <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    	<div class="container">
	    	<div class="row justify-content-middle" style="margin-left: 397px;">
	    		<div class="col-md-6 mt-5">
						<form action="./auth/codelogin.php"   method="post" class="appointment-form" style="margin-top: -568px;">
							<h3 class="mb-3">Login</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
			    					    <input type="text" name="Email" class="form-control" placeholder="Email">
			    				    </div>
								</div>
                               
                                <div class="col-md-12">
									<div class="form-group">
			    					    <input type="password"  name="password" class="form-control" placeholder="Password">
			    				    </div>
								</div>
								
							
							
								<div class="col-md-12">
                                    <div class="form-group">
                                        <input name="button" type="submit" value="Login" class="btn btn-primary py-3 px-4">
                                    </div>
								</div>
							</div>
	    			</form>
	    		</div>
	    	</div>
	    </div>
    </section>

   <?php require_once './include/footer.php' ?>