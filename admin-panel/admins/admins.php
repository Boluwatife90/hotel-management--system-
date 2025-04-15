<?php require_once '../includes/header.php';
require_once '../../config/config.php';
?>
<?php 

if(!isset($_SESSION['username'])){
  header('location:'.Appindex.'/admins/login-admins.php');
}

$admins = $conne->query("SELECT * From adminlogin");
$admins->execute();
$alladmin = $admins->fetchAll(PDO::FETCH_OBJ);

?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($alladmin as $alladmindata) :?>
                  <tr>
                    <th scope="row"><?php echo $alladmindata->id?></th>
                    <td><?php echo $alladmindata->username?></td>
                    <td><?php echo $alladmindata->email?></td>
                   
                  </tr>
        <?php endforeach ;?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div> 


<?php require_once '../includes/footer.php'?>