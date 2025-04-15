<?php require_once '../includes/header.php' ;

require_once '../../config/config.php';
?>

<?php 
if(!isset($_SESSION['username'])){
  header('location:'.Appindex.'/admins/login-admins.php');
}

if(isset($_POST['submit'])){
  if($_POST['email'] OR $_POST['username'] OR $_POST['password']) {
    $email = $_POST['email'];
    $login = $conne->query("SELECT * FROM adminlogin WHERE email='$email'");
    $login->execute();
    if($login->rowCount()>0){
      echo"<script> alert('Email found use another Email' )</script>";
     
  }
else{
    $arr=[
  'email' => $_POST['email'],
  'username' =>$_POST['username'],
  'mypassword' => password_hash($_POST['password'],PASSWORD_DEFAULT)
    ];
$createadmin =$booking = $conne->prepare("INSERT INTO adminlogin (email,username,mypassword)  VALUES(?,?,?)");
$counter = 1;
foreach( $arr as $data){
    $createadmin->bindValue($counter,$data);
    $counter++;
}
$val = $createadmin->execute();
if($val){
  header('location:'.Appindex.'/admins/admins.php');
}else{
  echo "<script> alert('something went wrong')</script>";
}
}
  }else{

    echo"<script> alert('one or two input field is empty' )</script>";
  }
  
}



?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="./create-admins.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
                 
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="username" id="form2Example1" class="form-control" placeholder="username" />
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
                </div>

               
            
                
              


                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      <?php require_once '../includes/footer.php' ?>