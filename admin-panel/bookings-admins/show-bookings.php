<?php  require_once '../includes/header.php';
require_once '../../config/config.php';

?>
<?php  if(!isset($_SESSION['username'])){
  header('location:'.Appindex.'/admins/login-admins.php');

}

$counthotel = $conne->query("SELECT * FROM bookings" );
$counthotel->execute();
$allbooking = $counthotel->fetchAll(PDO::FETCH_OBJ);


?>


<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Booking</h5>
             <a  href="<?php echo Appindex ?>/rooms-admins/create-rooms.php" class="btn btn-primary mb-4 text-center float-right">Create Room</a>
              <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">check in</th>
                    <th scope="col">check out</th>
                    <th scope="col">email</th>
                    <th scope="col">phone number</th>
                    <th scope="col">full name</th>
                    <th scope="col">hotel name</th>
                    <th scope="col">room name</th>
                    <th scope="col">status</th>
                    <th scope="col">payment</th>
                    <th scope="col">created at</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($allbooking as $allbookings) :?>
                  <tr>
                    <th scope="row"><?php echo $allbookings->id ?></th>
                    <td><?php echo $allbookings->checkin ?></td>
                    <td><?php echo $allbookings->checkout ?></td>
                    <td style="max-width:150px"><?php echo $allbookings->email ?></td>
                    <td><?php echo $allbookings->mynumber ?></td>
                    <td><?php echo $allbookings->myname ?></td>
                    <td><?php echo $allbookings->hotelname ?></td>
                    <td><?php echo $allbookings->roomname ?></td>>
                    <td><a  href="./status.php?num=<?php echo $allbookings->id ?>"><?php echo $allbookings->status ?></a></td>
                    <td><?php echo $allbookings->payment ?></td>
                    <td><?php echo $allbookings->date ?></td>
                     <td><a href="delete.php?num=<?php echo $allbookings->id ?>" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                 <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>














              <?php require_once '../includes/footer.php' ?>