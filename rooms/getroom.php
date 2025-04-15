<?php 
require_once './config/config.php';

$hotels = $conne->query("SELECT * FROM hotelroom  WHERE status=1 ");
$hotels->execute();
$alldatas = $hotels->fetchAll(PDO::FETCH_OBJ);



?>