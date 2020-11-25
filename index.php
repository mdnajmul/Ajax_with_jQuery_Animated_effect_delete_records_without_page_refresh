<?php

    include('db.php');

    $sql="SELECT * FROM student";
    $stmt=$con->prepare($sql);
    $stmt->execute();
    $studentArr=$stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Grid</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body style="padding-top: 100px">
        <div>&nbsp;</div>
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>  
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>City</th>
                            <th></th>
                        </tr>   
                    </thead>
                    <tbody>
                       <?php
                            $i=0;
                            foreach($studentArr as $list){
                                $i++;
                        ?>
                                <tr id="tr_<?php echo $list['id']?>">
                                    <td><?php echo $i?></td>
                                    <td><?php echo $list['name']?></td>
                                    <td><?php echo $list['email']?></td>
                                    <td><?php echo $list['city']?></td>
                                    <td><button type="button" class="btn btn-danger" style="cursor:pointer" onclick="delete_data('<?php echo $list['id']?>')">Delete</button></td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-1.12.0.min.js"></script>
        
        <script>
            function delete_data(id){
                jQuery.ajax({
                    url:'delete.php',
                    type:'post',
                    data:'id='+id,
                    success:function(result){
                       jQuery('#tr_'+id).hide(500); 
                    }
                });
                
            }
        </script>
    </body>
</html>