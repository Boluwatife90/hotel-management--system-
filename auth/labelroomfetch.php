<?php    
require_once './config/config.php';



if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:'.APPURL.'/index.php');
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

}
$fetchroom = $conne->query("SELECT * from apartmentroom WHERE status=1  and hotelid= $id");
$fetchroom->execute();
$roomdata = $fetchroom->fetchAll(PDO::FETCH_OBJ);

?>