<?php require_once '../includes/header.php' ;
require_once '../../config/config.php';
?>

<?php 
if(!isset($_SESSION['username'])){
  header('location:'.Appindex.'/admins/login-admins.php');
}
$numdata = $_GET['num'];

   if(isset($_POST['submit'])){
      if(!isset($_POST['status'])){
  
        echo"<script> alert('you leave the input box empty' )</script>";
      }else{

        $statusdata = $_POST['status'];

    $stm= $conne->prepare('UPDATE apartmentroom SET status = ? WHERE id ='. $numdata.'');
    $stm->bindValue(1,$statusdata)  ;
$stm->execute();
header("location:".Appindex."/rooms-admins/show-rooms.php");
      }

    }





?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline" >Update Status</h5>
          <form method="POST" action="" enctype="multipart/form-data">
                <!-- Email input -->
                <select name="status" style="margin-top: 15px;" class="form-control">
                    <option>Choose Status</option>
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>

      
                <!-- Submit button -->
                <button style="margin-top: 10px;" type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      <?php require_once '../includes/footer.php' ?>