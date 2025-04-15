<?php  require_once '../includes/header.php';
require_once '../../config/config.php';

?>
<?php  if(!isset($_SESSION['username'])){
  header('location:'.Appindex.'/admins/login-admins.php');

}

$counthotel = $conne->query("SELECT * FROM apartmentroom" );
$counthotel->execute();
$allhotel = $counthotel->fetchAll(PDO::FETCH_OBJ);


?>
          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Rooms</h5>
             <a  href="<?php echo Appindex ?>/rooms-admins/create-rooms.php" class="btn btn-primary mb-4 text-center float-right">Create Room</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">price</th>
                    <th scope="col">num of persons</th>
                    <th scope="col">size</th>
                    <th scope="col">view</th>
                    <th scope="col">num of beds</th>
                    <th scope="col">hotel name</th>
                    <th scope="col">status value</th>
                    <th scope="col">change status</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allhotel as $allhoteldata) :?>
                  <tr>
                    <th scope="row"><?php echo $allhoteldata->id ?></th>
                    <td><?php echo $allhoteldata->name ?></td>
                    <td>$<?php echo $allhoteldata->price ?></td>
                    <td><?php echo $allhoteldata->max ?></td>
                    <td><?php echo $allhoteldata->size ?></td>
                    <td><?php echo $allhoteldata->view ?></td>
                    <td><?php echo $allhoteldata->bed ?></td>
                    <td>Sheraton</td>
                    <td><?php echo $allhoteldata->status ?></td>

                    <td><a href="<?php echo Appindex ?>/rooms-admins/status-rooms.php?num=<?php echo $allhoteldata->id ?>" class="btn btn-danger  text-center ">status</a></td>
                    <td><a href="<?php echo Appindex ?>/rooms-admins/delete.php?num=<?php echo $allhoteldata->id ?>" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                 <?php endforeach ;?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



<?php  require_once '../includes/footer.php'?>