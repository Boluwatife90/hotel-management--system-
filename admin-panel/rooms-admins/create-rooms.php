<?php require_once '../includes/header.php' ;
require_once '../../config/config.php';

?>


<?php 
if(isset($_POST['submit'])){
  if(empty($_POST['name'] && $_POST['max'] &&  $_POST['size'] &&  $_POST['view'] &&  $_POST['bed'] 
  &&  $_POST['hotelid'] &&  $_POST['hotelroom']  &&  $_POST['image'] &&  $_POST['price']))  {

    echo"<script> alert('One or two input fleid is empty' )</script>";
  
}else{

  $arr=[
    'name' => $_POST['name'],
    'max' => $_POST['max'],
    'size' => $_POST['size'],
    'view' => $_POST['view'],
    'bed' => $_POST['bed'],
    'hotelid' =>$_POST['hotelid'],
    'hotelroom' =>$_POST['hotelroom'],
    'image' =>$_FILES['image']['name'],
    'price' =>$_POST['price'],
  
      ];
  
      $dir = "room_image/".basename($arr['image']);
  $createhotel = $conne->prepare("INSERT INTO apartmentroom (name,max,size,view,bed,hotelid,hotelname,image,price)  VALUES(?,?,?,?,?,?,?,?,?)");
  $counter = 1;
  foreach( $arr as $data){
    $createhotel->bindValue($counter,$data);
    $counter++;
  }
  
  if(move_uploaded_file($_FILES['image']['tmp_name'],$dir)){
    header("location:".Appindex."/rooms-admins/show-rooms.php");
  }
  $createhotel->execute();
}

}
$counthotell = $conne->query("SELECT * FROM hotelroom" );
$counthotell->execute();
$allhotelsroom = $counthotell->fetchAll(PDO::FETCH_OBJ);

?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Rooms</h5>
          <form method="POST" action="./create-rooms.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control" />
                 
                </div>  
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                 
                </div> 
                 <div class="form-outline mb-4 mt-4">
                  <input type="text" name="max" id="form2Example1" class="form-control" placeholder="num_persons" />
                 
                </div> 
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="bed" id="form2Example1" class="form-control" placeholder="num_beds" />
                 
                </div> 
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="size" id="form2Example1" class="form-control" placeholder="size" />
                 
                </div> 
               <div class="form-outline mb-4 mt-4">
                <input type="text" name="view" id="form2Example1" class="form-control" placeholder="view" />
               
               </div> 
               <select name="hotelroom" class="form-control">
                <option>Choose Hotel Name</option>
                <?php foreach($allhotelsroom as $allhotelsrooms) :?>
                <option value="<?php echo $allhotelsrooms->name  ?>"><?php echo $allhotelsrooms->name  ?></option>
                <?php endforeach;?>
               </select>
               <br>
   
               <select  name="hotelid"  class="form-control">
                <option>Choose Same Hotel Once Again</option>
                <?php foreach($allhotelsroom as $allhotelsrooms) :?>
                <option value="<?php echo $allhotelsrooms->id  ?>"><?php echo $allhotelsrooms->name  ?></option>
                <?php endforeach;?>
               </select>
               <br>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

              <?php require_once '../includes/footer.php' ?>