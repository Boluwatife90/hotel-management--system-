<?php

require_once './config/config.php';

$fetchroom = $conne->query("SELECT * from apartmentroom WHERE status=1 ");
$fetchroom->execute();
$roomdata = $fetchroom->fetchAll(PDO::FETCH_OBJ);

?>