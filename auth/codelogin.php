<?php
require_once '../config/config.php';
require_once '../include/header.php';




if(isset($_POST['button'])){
    if(!empty($_POST['Email']) AND !empty($_POST['password']) ){
        $email = $_POST['Email'];
        $mypassword = $_POST['password'];
        $login = $conne->query("SELECT * FROM user WHERE email='$email'");
        $login->execute();
        $fetch = $login->fetch(PDO::FETCH_ASSOC);

       if($login->rowCount()>0){
        if(password_verify($mypassword,$fetch['mypassword'])){
           $_SESSION["username"] = $fetch['email'];
           $_SESSION['id'] = $fetch['id'];
           header('location:'.APPURL.'');
          
        }else{
            header('location:http://localhost/hotel-booking/login.php?not=true');
        }
       }else{
        
       }
    }else{
       
        header('location: ../login.php?subitted=false');

    }
}
