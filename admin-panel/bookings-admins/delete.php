<?php 
require_once '../includes/header.php';
require_once '../../config/config.php';

if(isset($_GET['num'])){
    $numb = $_GET['num'];

}



$deletehotel = $conne->query("DELETE  FROM bookings WHERE id =".$numb."");
$deletehotel->execute();
header("location:".Appindex."/bookings-admins/show-bookings.php");

?>