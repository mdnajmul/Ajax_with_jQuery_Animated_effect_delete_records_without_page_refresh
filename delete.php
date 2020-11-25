<?php

    include('db.php');

    $id=$_POST['id'];

    $sql="DELETE FROM student WHERE id='$id'";
    $stmt=$con->prepare($sql);
    $stmt->execute();

?>