<?php require_once '../includes/header.php' ?>

<?php  

require '../../config/config.php';


if(isset($_SESSION['username'])){
  header("location:".Appindex."");
}

if(isset($_POST['submit'])){
  if(!empty($_POST['email']) AND !empty($_POST['password']) ){
      $email = $_POST['email'];
      $mypassword = $_POST['password'];
      $login = $conne->query("SELECT * FROM adminlogin WHERE email='$email'");
      $login->execute();
      $fetch = $login->fetch(PDO::FETCH_ASSOC);

     if($login->rowCount()>0){
    
      if(password_verify($mypassword,$fetch['mypassword'])){
         $_SESSION["username"] = $fetch['email'];
         $_SESSION['id'] = $fetch['id'];
         header('location:'.Appindex.'');
      
      }
      else{
 echo"<script> alert('Email or password not correct' )</script>";
      }

}else{
  echo"<script> alert('one or two input field is empty' )</script>";
}
}
}



?>

<div class="container-fluid"> 
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form method="POST" class="p-auto" action="./login-admins.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
     </div>
    </div>
</div>

<?php  require_once '../includes/footer.php' ?>