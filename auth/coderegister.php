<?php  
require_once '../config/config.php';








if(isset($_POST['submit'])){
    if(empty($_POST['username']) OR empty($_POST['Email']) OR empty($_POST['password'])){
        echo "<script> alert('one or more input are empty')</script>";
    }
    $email = $_POST['Email'];
    $login = $conne->query("SELECT * FROM user WHERE email='$email'");
    $login->execute();
    if($login->rowCount()>0){
        header('location:../register.php?present=true');
    }
else{
    

        $arr=[
            "username" => $_POST['username'],
            "email" => $_POST['Email'],
            "mypassword"  => password_hash($_POST['password'],PASSWORD_DEFAULT),
        ];
       
        $insert = $conne->prepare("INSERT INTO user (username, email, mypassword) VALUES (?,?,?)");
       $counter = 1;
        foreach( $arr as $key => $data){
            $insert->bindValue($counter,$data);
            $counter++;
        }
        $val = $insert->execute();
        
        if($val){
            header('location:../login.php');
        }else{
            echo "<script> alert('something went wrong')</script>";
        }
    
}
}