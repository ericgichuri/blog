<?php

include "connection.php";

?>
<head>
    <link rel="stylesheet" type="text/css" href="static/styles/css/bootstrap.min.css">
</head>
<section>

<h3 class="text-center">Users</h3>
<div class="d-flex table-responsive p-2">
    <table class="table table-condensed table-bordered table-sm table-striped text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone no</th>
                <th>Username</th>
                <th colspan="3">Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $sql="SELECT id,CONCAT(firstname,' ',lastname) AS name,email,phoneno,username,password FROM users";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                    
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['phoneno'];?></td>
                        <td><?php echo $row['username'];?></td>
                        <td><button class="btn btn-sm btn-warning"><img src="icons/view.png" height="20" width="20">View</button></td>
                        <td><button class="btn btn-sm btn-primary"><img src="icons/edit.png" height="20" width="20">Edit</button></td>
                        <td><button class="btn btn-sm btn-danger"><img src="icons/delete.png" height="20" width="20">Delete</button></td>
                    </tr>
                    
                    <?php
                }
            }else{
                ?>
                
                <tr>
                    <td colspan="8"><h6>NO USER REGISTERED</h6></td>
                </tr>
                <?php
            }
            
            ?>
        </tbody>
    </table>
</div>
</section>