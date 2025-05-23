<?php require_once './include/header.php' ?>
<?php  require_once './auth/labelroomfetch.php';




?>
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/image_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Rooms <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Apartment Room</h1>
          </div>
        </div>
      </div>
    </section>
   
    <section class="ftco-section bg-light ftco-no-pt ftco-no-pb">
			<div class="container-fluid px-md-0">
				<div class="row no-gutters">
					<?php foreach($roomdata  as $roomsdata ) : ?>
						
    			<div class="col-lg-6">
    				<div class="room-wrap d-md-flex">
    					<a href="#" class="img" style="background-image: url(images/<?php echo $roomsdata->image?>);"></a>
    					<div class="half left-arrow d-flex align-items-center">
    						<div class="text p-4 p-xl-5 text-center">
    							<p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
    							<p class="mb-0"><span class="price mr-1">$<?php echo $roomsdata->price?></span> <span class="per">per night</span></p>
	    						<h3 class="mb-3"><a href="rooms.html"><?php echo $roomsdata->name?></a></h3>
	    						<ul class="list-accomodation">
	    							<li><span>Max:</span> <?php echo $roomsdata->max?></li>
	    							<li><span>Size:</span> <?php echo $roomsdata->size?></li>
	    							<li><span>View:</span> <?php echo $roomsdata->view?></li>
	    							<li><span>Bed:</span> <?php echo $roomsdata->bed?></li>
								
	    						</ul>
	    						<p class="pt-1"><a href="room-single.php?id=<?php echo  $roomsdata->id?>" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a></p>
    						</div>
    					</div>
    				</div>
					
    			</div>
    			<?php endforeach;?>
			</div>
		</section>
		
  <?php require_once './include/footer.php' ?>