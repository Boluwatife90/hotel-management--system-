<?php 
require_once '../includes/header.php';
require_once '../../config/config.php';

if(isset($_GET['num'])){
    $numb = $_GET['num'];

    $counthotel = $conne->query("SELECT * FROM apartmentroom WHERE id=".$numb."" );
$counthotel->execute();
$allhotel = $counthotel->fetch(PDO::FETCH_OBJ);

unlink("room_image/" .$allhotel->image);
}



$deletehotel = $conne->query("DELETE  FROM apartmentroom WHERE id =".$numb."");
$deletehotel->execute();
header("location:".Appindex."/rooms-admins/show-rooms.php");

?>