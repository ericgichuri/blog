<?php

include "connection.php";

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/ericbloglogo.png" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eric Blog | Admin Login</title>
    <link rel="stylesheet" type="text/css" href="static/styles/css/bootstrap.min.css">
    <script type="text/javascript" src="static/js/jquery-3.6.0.min.js"></script>
</head>
<style>
    .nav{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 70px;
        padding: 10px;
    }
    .logo{
        margin-right: auto;
    }
    .links{
        width: 70%;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
    .links li{
        list-style: none;
    }
    .links li a{
        text-decoration: none;
        font-size: 18px;
        font-weight: 500;
        color: whitesmoke;
    }
</style>
<body style="background: rgba(11, 17, 36, 0.89);">
<div class="nav" style="background: rgba(11, 17, 36, 0.99);">
    <div class="logo">
        <h2 class="text-warning">Eric Blog</h2>
    </div>
    <ul class="links">
        <li><a href="javascript:void(0)">Back</a></li>
        <li><a href="javascript:void(0)">Home</a></li>
        <li><a href="javascript:void(0)">Contact</a></li>
        <li><a href="javascript:void(0)">About</a></li>
    </ul>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-5 border border-primary p-5 m-3">
            <div class="d-flex flex-item-center justify-content-center">
                <img src="images/ericbloglogo.png" height="70" width="60">
            </div>
        <form class="form p-2 m-2 text-white" action="" method="post">
            
            <h3 class="text-center">Admin Login Form</h3>
            <p class="error text-center"></p>
            <div class="form-group">
                <label for="username" class="font-weight-bold">Username</label>
                <input id="username" class="form-control" type="text" name="username" required>
            </div>
            <div class="form-group">
                <label for="email" class="font-weight-bold">Email</label>
                <input id="email" class="form-control" type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password" class="font-weight-bold">Password</label>
                <input id="password" class="form-control" type="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-success btn-block">Login</button>
            </div>
        </form>
        </div>
        <!--<div class="col-md-5 p-3" style="text-align: center;">
            <img src="images/ericbloglogo.png" width="300" height="400">
            <div>
                <h3 style="font-size: 30px;">
                    Welcome To Eric Blog
                </h3>
                <h5>
                    Get Latest Trending, News, Sports <br>Job Adverts, Adventure ,Technology
                </h5>
            </div>        
        </div>-->
        
    </div>
</div>
<style>
body{
    padding: 0;
    margin: 0;
    background: lightblue;
}
</style>
</body>
</html>
<?php

session_start();
if (isset($_POST['login'])) {
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $san_username=mysqli_real_escape_string($conn,$username);
    $san_email=mysqli_real_escape_string($conn,$email);
    $san_password=mysqli_real_escape_string($conn,$password);

    $sql="SELECT username,email,password FROM admin WHERE username='$san_username'";
    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
        while($row=mysqli_fetch_assoc($query)){
            $myusername=$row['username'];
            $myemail=$row['email'];
            $mypassword=$row['password'];

            if($san_username===$myusername && $san_password===$mypassword){
                $_SESSION['adminusername']=$san_username;
                echo "<script>window.location.href='admin.php'</script>";
            }else{
                ?>
                
                <script>
                    $(".error").empty();
                    $(".error").append("<span class='alert alert-danger text-center'>email or password incorrect</span>")
                </script>
                <?php
            }
        }
    }else{
        ?>
        
        <script>
            $(".error").empty();
            $(".error").append("<span class='alert alert-danger'>No username with this account</span>")
        </script>
        <?php
    }
}

?>