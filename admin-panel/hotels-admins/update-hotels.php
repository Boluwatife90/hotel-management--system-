<?php  require_once  '../includes/header.php' ;
require_once '../../config/config.php';

$numb = $_GET['num'];

$counthotel = $conne->query("SELECT * FROM hotelroom WHERE id =".$numb.""  );
$counthotel->execute();
$allhotel = $counthotel->fetch(PDO::FETCH_ASSOC);



if(!isset($_SESSION['username'])){
  header('location:'.Appindex.'/admins/login-admins.php');
}


if(isset($_POST['submit'])){
  if(!empty($_POST['name'] OR $_POST['description'] OR $_POST['location']))  {
    $arr=[
      'name' => $_POST['name'],
      'description' => $_POST['description'],
      'location' => $_POST['location']
    
        ];

$updatehotel = $conne->prepare("UPDATE hotelroom SET name=? , description= ? , location=? WHERE id =".$numb."");
$counter = 1;
foreach ($arr as $value) {
 
  $updatehotel->bindValue($counter , $value);
  $counter++;
}
$updatehotel->execute();
header("location:".Appindex."/hotels-admins/show-hotels.php");
  }else{
    echo"<script> alert('One or two input fleid is empty ' )</script>";
  }
}
?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Hotel</h5>
          <form method="POST" action="./update-hotels.php?num=<?php echo $numb?>" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input value="<?php echo $allhotel['name'] ?>" type="text"  name="name" id="form2Example1"  class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea  class="form-control" name="description"  id="exampleFormControlTextarea1" rows="3"><?php echo $allhotel['description'] ?>"</textarea>
                </div>

                <div class="form-outline mb-4 mt-4">
                  <label for="exampleFormControlTextarea1">Location</label>

                  <input value="<?php echo $allhotel['location'] ?>" type="text" name="location" id="form2Example1" class="form-control"/>
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
  
      <?php require_once '../includes/footer.php' ?>