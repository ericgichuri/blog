<?php

include "connection.php";

?>
<head>
    <link rel="stylesheet" type="text/css" href="static/styles/css/bootstrap.min.css">
</head>
<section>
<h3 class="text-center">My admins</h3>
<button class="btn btn-success btn-sm ml-2 btnaddadmin"><img src="icons/add.png" height="20" width="20">Add Admin</button>
    <div class="d-flex table-responsive p-2 mytableholder" >
        <table class="table table-sm table-striped table-bordered table-condensed text-center">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Photo</th>
                <th>username</th>
                <th>Email</th>
                <th>Phone no</th>
                <th colspan="2">Operations</th>
            </thead>
            <tbody>
                <?php
                
                $sql="SELECT * FROM admin";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                        ?>
                        <tr id="<?php echo $row['id'];?>">
                            <td data-target="id"><?php echo $row['id'];?></td>
                            <td data-target="name"><?php echo $row['name'];?></td>
                            <td data-target="image"><img src="images/admin/<?php echo $row['image'];?>" height="50" width="50"></td>
                            <td data-target="username"><?php echo $row['username'];?></td>
                            <td data-target="email"><?php echo $row['email'];?></td>
                            <td data-target="phoneno"><?php echo $row['phoneno'];?></td>
                            <td hidden data-target="password"><?php echo $row['password'];?></td>
                            <td><button class="btnedit btn btn-sm btn-primary" data-role="update" data-id="<?php echo $row['id'];?>"><img class="icon" src="icons/edit.png" width="20" height="20">Edit</button></td>
                            <td><button class="btndelete btn btn-sm btn-danger" data-role="delete" data-id="<?php echo $row['id'];?>"><img class="icon" src="icons/delete.png" width="20" height="20">Delete</button></td>
                        </tr>
                        <?php
                    }
                }else{
                    ?>
                    <tr>
                        <td colspan=8>NO ADMIN FOUND</td>
                    </tr>
                    <?php
                }
                
                ?>
            </tbody>
        </table>
    </div>
</section>

<div id="addadmin" class="modal" tabindex="-1" role="dialog" aria-hidden="true" style="background: rgba(0, 0, 0, 0.3);">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="form addadminform" method="post" action="" enctype="multipart/form-data">
                <h4>Add Admin</h4>
                <div class="row">
                    <div class="col">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control form-control-sm" required>
                        <label>Image</label>
                        <input type="file" name="image" class="form-control form-control-sm" required>
                        <label>Username</label>
                        <input type="text" name="username" class="form-control form-control-sm" required>
                        <label>Email</label>
                        <input type="email" name="email" class="form-control form-control-sm" required>
                        <label>Phone no</label>
                        <input type="text" name="phoneno" class="form-control form-control-sm" required>
                        <label>password</label>
                        <input type="password" name="password" class="form-control form-control-sm" required>
                        <button class="btn btn-success mt-2" type="submit">Save</button>
                        <button class="btn btn-danger mt-2 btnclosemodaladd">close</button>
                    </div>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="my-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true" style="background: rgba(0, 0, 0, 0.2);">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="position: relative;">
            
            <div class="modal-body">
            <button style="position: absolute;right:10px ;top:10px;" class="btn btn-float btn-sm btn-danger btnclosemodal"><img src="icons/close.png" height="20" width="20"></button>
                <form class="form updateform" method="post" action="">
                <h4 class="text-center m-0 text-success headertext">Update</h4>
                    <input type="text" name="id" id="myid" class="form-control form-control-sm" hidden>
                    <label>name</label>
                    <input type="text" name="name" id="name" class="form-control form-control-sm">
                    <label>username</label>
                    <input type="text" name="username" id="username" class="form-control form-control-sm">
                    <label>email</label>
                    <input type="email" name="email" id="email" class="form-control form-control-sm">
                    <label>phoneno</label>
                    <input type="text" name="phoneno" id="phoneno" class="form-control form-control-sm">
                    <label>password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-sm">
                    <button class="btn btn-block btn-success btn-sm mt-2" type="submit">Update</button>
                </form>
                
            </div>
                
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".addadminform").on("submit",function(e){
            e.preventDefault();
            var adminformdata=new FormData(this);
            $.ajax({
                url:"addadmin.php",
                method:"post",
                data:adminformdata,
                processData:false,
                contentType:false,

                success:function(data){
                    alert(data);
                    $(".addadminform")[0].reset();
                    $(".main").load("myadmins.php");
                }
            })
        })
        $(".btnaddadmin").click(function(){
            $("#addadmin").show()
        })
        $(".btnclosemodaladd").click(function(){
            $("#addadmin").hide()
        })
        $(".btnclosemodal").click(function(){
            $("#my-modal").hide();
        })
        $(".btndelete").click(function(){
            var id=$(this).attr("data-id")
        })
        $(".btnedit").click('button[data-role=update]',function(){
            var id=$(this).data("id")
            var name=$('#'+id).children('td[data-target=name]').text()
            var username=$('#'+id).children('td[data-target=username]').text()
            var email=$('#'+id).children('td[data-target=email]').text()
            var phoneno=$('#'+id).children('td[data-target=phoneno]').text()
            var password=$('#'+id).children('td[data-target=password]').text()
            
            $("#myid").val(id)
            $("#name").val(name)
            $("#username").val(username)
            $("#email").val(email)
            $("#phoneno").val(phoneno)
            $("#password").val(password)
            $("#my-modal").show()

        })
        $(".btndelete").click('button[data-role=delete',function(){
            var id =$(this).data('id')
            var todelete=confirm("Do you want to delete admin "+id)
            if(todelete==1){
                $.ajax({
                    url:"deleteadmin.php",
                    method:"post",
                    data:{id},

                    success:function(data){
                        alert(data)
                        $(".main").load("myadmins.php");
                    }
                })
            }
        })
        $(".updateform").on('submit',function(e){
            e.preventDefault();
            var updatedata=new FormData(this);

            $.ajax({
                url:"updateadmin.php",
                method:"post",
                data:updatedata,
                contentType:false,
                processData:false,
                
                success:function(data){
                    $(".headertext").html(data);
                    $(".updateform")[0].reset()
                    $(".main").load("myadmins.php");
                }
            })
        })

        
        
        
    })
</script>