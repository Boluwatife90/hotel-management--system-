<?php require_once '../includes/header.php' ;
require_once '../../config/config.php';


if(!isset($_SESSION['username'])){
  header('location:'.Appindex.'/admins/login-admins.php');
}
?>

<?php 
if(isset($_POST['submit'])){
  if($_POST['name'] OR $_POST['image'] OR $_POST['description'] OR $_POST['location'])  {
    $arr=[
  'name' => $_POST['name'],
  'description' => $_POST['description'],
  'location' => $_POST['location'],
  'image' =>$_FILES['image']['name'],

    ];

    $dir = "hotel_image/".basename($arr['image']);
$createhotel = $conne->prepare("INSERT INTO hotelroom (name,description,location,image)  VALUES(?,?,?,?)");
$counter = 1;
foreach( $arr as $data){
  $createhotel->bindValue($counter,$data);
    $counter++;
}
if(move_uploaded_file($_FILES['image']['tmp_name'],$dir)){
  header("location:".Appindex."/hotels-admins/show-hotels.php");
}
$createhotel->execute();
}else{
  echo"<script> alert('One or two input fleid is empty ' )</script>";
}

}


?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Hotels</h5>
          <form method="POST" action="./create-hotels.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>

                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control"/>
                 
                </div>

                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-outline mb-4 mt-4">
                  <label for="exampleFormControlTextarea1">Location</label>

                  <input type="text" name="location" id="form2Example1" class="form-control"/>
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
 <?php require_once '../includes/footer.php' ?>