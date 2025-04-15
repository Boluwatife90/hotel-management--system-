<?php require_once './include/header.php';
require_once './config/config.php';


if(isset($_SESSION['id'])){
    $userid = $_SESSION['id'];
}else{
    header("location:./index.php");
}



$booking = $conne->query("SELECT * from bookings where userid = $userid ");
$booking->execute();
$bookingdata = $booking->fetchAll(PDO::FETCH_OBJ);

?>

<div >
   
<h1 style="text-align: center;">  booking </h1>
<?php  if(count($bookingdata)>0) :?> 
<table class="table">
  <thead>

    <tr>
      <th scope="col">Check_in</th>
      <th scope="col">Check_out</th>
      <th scope="col">email</th>
      <th scope="col">phone_number</th>
      <th scope="col">full_name </th>
      <th scope="col">room_name</th>
      <th scope="col">status</th>
      <th scope="col">payment</th>
      <th scope="col">created_at</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach($bookingdata as  $bookingdatas) :?>
    <tr>
      <td><?php echo $bookingdatas->checkin ?></td>
      <td><?php echo $bookingdatas->checkout ?></td>
      <td><?php echo $bookingdatas->email ?></td>
      <td><?php echo $bookingdatas->mynumber ?></td>
      <td><?php echo $bookingdatas->myname ?></td>
      <td><?php echo $bookingdatas->roomname ?></td>
      <td><?php echo $bookingdatas->status ?></td>
      <td>$<?php echo $bookingdatas->payment ?></td>
      <td><?php echo $bookingdatas->date ?></td>
      
    
    </tr>
    <?php endforeach;?>
    
  </tbody>
</table>
<?php else :?>
<div style="text-align: center;">
    <h4 style="margin: 35px 0;">You dont have any booking yet </h4>
    </div>
    <?php endif;?>
</div>
<?php require_once './include/footer.php' ?>