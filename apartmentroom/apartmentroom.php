<?php 
require_once './config/config.php';


$hotels = $conne->query("SELECT * FROM apartmentroom WHERE status=1 ");
$hotels->execute();
$all = $hotels->fetchAll(PDO::FETCH_OBJ);
$newarr = array_splice($all,0,4);

?>