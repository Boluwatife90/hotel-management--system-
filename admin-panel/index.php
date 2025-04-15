<?php 
require_once '../admin-panel/includes/header.php';
require_once '../config/config.php';
if(!isset($_SESSION['username'])){
  header('location:'.Appindex.'/admins/login-admins.php');
}


$count = $conne->query("SELECT COUNT(*) AS count_admin FROM adminlogin" );
 $alladminuser = $count->fetch(PDO::FETCH_OBJ);


 
$countroom = $conne->query("SELECT COUNT(*) AS count_room FROM apartmentroom" );
$allroom = $countroom->fetch(PDO::FETCH_OBJ);


$counthotel = $conne->query("SELECT COUNT(*) AS count_hotel FROM hotelroom" );
$allhotel = $counthotel->fetch(PDO::FETCH_OBJ);

$countbooking = $conne->query("SELECT COUNT(*) AS count_booking FROM bookings" );
$allbooking = $countbooking->fetch(PDO::FETCH_OBJ)

?>
   
   <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Hotels</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of hotels: <?php echo $allhotel->count_hotel?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rooms</h5>
              
              <p class="card-text">number of rooms: <?php echo $allroom->count_room?></p>
              
            </div>
          </div>
        </div>


        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Booking</h5>
              
              <p class="card-text">number of rooms: <?php echo $allbooking->count_booking?></p>
              
            </div>
          </div>
        </div>


        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $alladminuser->count_admin?></p>
              
            </div>
          </div>
        </div>
      </div>
   
         
    
<?php require_once '../admin-panel/includes/footer.php' ?>