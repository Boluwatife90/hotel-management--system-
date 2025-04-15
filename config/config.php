<?php 




        try{
    $conne = new PDO(dsn:"mysql: host=localhost; dbname=hostel",username:'root', password:'');

        }catch(PDOException $e){
echo $e->getMessage();
        }
   



