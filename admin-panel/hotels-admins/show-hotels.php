<?php require_once '../includes/header.php';
require_once '../../config/config.php';

  if(!isset($_SESSION['username'])){
  header('location:'.Appindex.'/admins/login-admins.php');
}?>

<?php 
$counthotel = $conne->query("SELECT * FROM hotelroom" );
$counthotel->execute();
$allhotel = $counthotel->fetchAll(PDO::FETCH_OBJ);

?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Hotels</h5>
             <a  href="<?php echo Appindex?>/hotels-admins/create-hotels.php" class="btn btn-primary mb-4 text-center float-right">Create Hotels</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">location</th>
                    <th scope="col">status value</th>
                    <th scope="col">change status</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allhotel as $allhoteldata ) :?>
                  <tr>
                    <th scope="row"><?php echo $allhoteldata->id ?></th>
                    <td><?php echo $allhoteldata->name ?></td>
                    <td><?php echo $allhoteldata->location ?></td>
                    <td><?php echo $allhoteldata->status ?></td>

                    <td><a  href="<?php echo Appindex?>/hotels-admins/status-hotels.php?num=<?php echo $allhoteldata->id?>" class="btn btn-warning text-white text-center ">status</a></td>
                    <td><a  href="<?php echo Appindex?>/hotels-admins/update-hotels.php?num=<?php echo $allhoteldata->id?>" class="btn btn-warning text-white text-center ">Update </a></td>
                    <td><a href="<?php echo Appindex?>/hotels-admins/delete.php?num=<?php echo $allhoteldata->id ?>" class="btn btn-danger  text-center ">Delete </a></td>
                  </tr>
                 <?php endforeach;?>
                 
                  
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



<?php  require_once '../includes/footer.php'?>