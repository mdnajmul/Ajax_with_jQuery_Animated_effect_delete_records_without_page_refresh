<?php

    try{
        $con=new PDO('mysql:host=localhost;dbname=student_information','root','');
    }catch(PDOException $e){
        echo $e->getMessage();
    }

?>