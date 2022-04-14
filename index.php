<?php
session_start();
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
}else{
    $username="";
}
include "connection.php";
$sql="SELECT * FROM posts WHERE star='yes'";
$stared=mysqli_query($conn,$sql);
if(mysqli_num_rows($stared)>0){
    while($row=mysqli_fetch_assoc($stared)){
        $favtopic=$row['Topic'];
        $favimage=$row['photo'];
        break;
    }
}
$sql="SELECT * FROM posts WHERE category='News' ORDER BY id DESC";
$news=mysqli_query($conn,$sql);
if(mysqli_num_rows($news)>0){
    while($row=mysqli_fetch_assoc($news)){
        $newstopic=$row['Topic'];
        $newsimage=$row['photo'];
        break;
    }
}else{
    $newstopic="No News content";
}
//=================================================================
$sql="SELECT * FROM posts WHERE category='Trending' ORDER BY id DESC";
$trending=mysqli_query($conn,$sql);
if(mysqli_num_rows($trending)>0){
    while($row=mysqli_fetch_assoc($trending)){
        $trendingtopic=$row['Topic'];
        $trendingimage=$row['photo'];
        break;
    }
}else{
    $trendingtopic="No Trending content";
}
//===============================================================
$sql="SELECT * FROM posts WHERE category='Sports' ORDER BY id DESC";
$sports=mysqli_query($conn,$sql);
if(mysqli_num_rows($sports)>0){
    while($row=mysqli_fetch_assoc($sports)){
        $sportstopic=$row['Topic'];
        $sportsimage=$row['photo'];
        break;
    }
}else{
    $sportstopic="No sports content";
}
//=============================================================
$sql="SELECT * FROM posts WHERE category='Advert' ORDER BY id DESC";
$advert=mysqli_query($conn,$sql);
if(mysqli_num_rows($advert)>0){
    while($row=mysqli_fetch_assoc($advert)){
        $adverttopic=$row['Topic'];
        $advertimage=$row['photo'];
        break;
    }
}else{
    $adverttopic="No advert content";
}
//==============================================
$sql="SELECT * FROM posts WHERE category='Adverture' ORDER BY id DESC";
$adverture=mysqli_query($conn,$sql);
if(mysqli_num_rows($adverture)>0){
    while($row=mysqli_fetch_assoc($adverture)){
        $adverturetopic=$row['Topic'];
        $advertureimage=$row['photo'];
        break;
    }
}else{
    $adverturetopic="No adverture content";
    $advertureimage="adventure.png";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/ericbloglogo.png" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="static/styles/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="static/styles/style.css">
    <script src="https://kit.fontawesome.com/f4a5ea10c5.js" crossorigin="anonymous"></script>
    <script src="static/js/jquery-3.6.0.min.js"></script>
    <script src="static/js/index.js" defer></script>
    <title>Eric Blog | Home</title>
</head>
<body>
<nav>
    <div class="logo">
        <a href="#">Eric Blog</a>
    </div>
    <ul class="navlinks">
        <li><a href="#">Home</a></li>
        <li><a href="#">Posts</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">About</a></li>
    </ul>
    <button class="btn menubtn" data="show">
        <img src="icons/menuicon.png">
    </button>
</nav>
<div class="menufilters d-flex p-2">
    <div class="d-flex justify-content-start align-items-center">
        <button class="btn btn-sm mx-1 btnlogin btn-primary">Login</button>
        <button class="btn btn-sm mx-1 btnregister btn-success">Register</button>
        <h6 class="text-white welcometext">Welcome <?php echo $username;?></h6>
    </div>
    <!--<div class="d-flex justify-content-end align-items-center ml-auto submenu">
        <li>News</li>
        <li>Trending</li>
        <li>Sports</li>
        <li>Advert</li>
        <li>Adventure</li>
    </div>-->
</div>
<div class="container-fluid">
<div id="my-modal" class="modal modallogin" tabindex="-1" role="dialog" aria-hidden="true" style="background: rgba(0, 0, 0, 0.1);">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body" style="background: rgb(16,16,44);">
                <h4 style="font-size: 16px;" class="text-center text-white text-uppercase">Login Eric Blog</h4>
                <span class="btn btn-sm btn-danger btnclosemodal"><img src="icons/close.png" height="18" width="18"></span>
                <form class="form p-4 m-3 bg-white formlogin" method="post" action="" enctype="multipart/form-data">
                    <p class="alertholder1 p-0 m-1"></p>
                    <div class="form-group">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text"><img src="icons/user.png" height="18" width="18"></span>
                        <input type="text" name="username" class="form-control username" placeholder="username" autocomplete="off">
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text"><img src="icons/lock.png" height="18" width="18"></span>
                        <input type="password" name="password" class="form-control" placeholder="password" autocomplete="off">
                    </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="my-modal" class="modal modalregister" tabindex="-1" role="dialog" aria-hidden="true" style="background: rgba(0, 0, 0, 0.1);">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body" style="background: rgb(16,16,44);">
                <h4 style="font-size: 16px;" class="text-center text-white text-uppercase">Register Eric blog</h4>
                <span class="btn btn-sm btn-danger btnclosemodal"><img src="icons/close.png" height="18" width="18"></span>
                <form class="form p-4 m-3 bg-white formregister" method="post" action="" enctype="multipart/form-data">
                    <p class="alertholder p-0 m-1"></p>
                    <div class="input-group flex-nowrap mb-1">
                        <span class="input-group-text"><img src="icons/user.png" height="18" width="18"></span>
                        <input type="text" name="firstname" class="form-control" placeholder="*First name" autocomplete="off">
                    </div>
                    <div class="input-group flex-nowrap mb-1">
                        <span class="input-group-text"><img src="icons/user.png" height="18" width="18"></span>
                        <input type="text" name="lastname" class="form-control" placeholder="*Last name" autocomplete="off">
                    </div>
                    <div class="input-group flex-nowrap mb-1">
                        <span class="input-group-text"><img src="icons/email.png" height="18" width="18"></span>
                        <input type="email" name="email" class="form-control" placeholder="*Email" autocomplete="off">
                    </div>
                    <div class="input-group flex-nowrap mb-1">
                        <span class="input-group-text"><img src="icons/phoneno.png" height="18" width="18"></span>
                        <input type="text" name="phoneno" class="form-control" placeholder="*Phone no." autocomplete="off">
                    </div>
                    <div class="input-group flex-nowrap mb-1">
                        <span class="input-group-text"><img src="icons/user.png" height="18" width="18"></span>
                        <input type="text" name="username" class="form-control" placeholder="*Username" autocomplete="off">
                    </div>
                    <div class="input-group flex-nowrap mb-1">
                        <span class="input-group-text"><img src="icons/lock.png" height="18" width="18"></span>
                        <input type="password" name="password" class="form-control" placeholder="password" autocomplete="off">
                    </div>
                    <div>
                        <button class="btn btnsubmit btn-success btn-block">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <h3 class="text-center">Welcome To Eric Blog. Get latest news, Trending infomation on the internet, sport news</h3>
        <h4 class="text-center">Do you want to advertise your business, company, content
            <br>
            <button class="btn btn-secondary">Get started</button>
        </h4>
    </div>
</div>
<div class="ncontainer-fluid p-1">
    <div class="row justify-content-start">
        <div class="col-md-4 col-lg-4 col-xl-4 col-7 col-sm-6">
            <div class="card cardintro">
                <div class="cardimage">
                    <img src="<?php echo "images/uploads/".$favimage;?>">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title p-0 m-0">Popular</h5>
                    <p class="card-text text-left"><a href="<?php echo "#".$favtopic; ?>"><?php echo $favtopic; ?></a></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-7 col-sm-6">
            <div class="card cardintro">
                <div class="cardimage">
                    <img src="<?php echo "images/uploads/".$newsimage;?>">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title p-0 m-0">News</h5>
                    <p class="card-text text-left"><a href="<?php echo "#".$newstopic; ?>"><?php echo $newstopic; ?></a></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-7 col-sm-6">
            <div class="card cardintro">
                <div class="cardimage">
                    <img src="<?php echo "images/uploads/".$trendingimage;?>">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title p-0 m-0">Trending</h5>
                    <p class="card-text text-left"><a href="<?php echo "#".$trendingtopic; ?>"><?php echo $trendingtopic; ?></a></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-7 col-sm-6">
            <div class="card cardintro">
                <div class="cardimage">
                    <img src="<?php echo "images/uploads/".$sportsimage;?>">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title p-0 m-0">Sports</h5>
                    <p class="card-text text-left"><a href="<?php echo "#".$sportstopic; ?>"><?php echo $sportstopic; ?></a></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-7 col-sm-6">
            <div class="card cardintro">
                <div class="cardimage">
                    <img src="<?php echo "images/uploads/".$advertimage;?>">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title p-0 m-0">Advert</h5>
                    <p class="card-text text-left"><a href="<?php echo "#".$adverttopic; ?>"><?php echo $adverttopic; ?></a></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-7 col-sm-6">
            <div class="card cardintro">
                <div class="cardimage">
                    <img src="<?php echo "images/uploads/".$advertureimage;?>">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title p-0 m-0">Adventure</h5>
                    <p class="card-text text-left"><a href="<?php echo "#".$adverturetopic; ?>"><?php echo $adverturetopic; ?></a></p>
                </div>
            </div>
        </div>
    </div>
    
</div>
<section class="container-fluid">
    <div class="d-flex justify-content-center">
        <div class="mainposts">
            <div class="d-flex flex-column justify-content-center">
                <div class="divnews m-2">
                    <div class="border" style="background-color: rgb(16,16,44);">
                        <h4 class="text-warning text-center m-1">NEWS</h4>
                        <div class="d-flex m-0 p-3 flex-column border border-dark bg-white justify-content-center">
                            <?php
                            
                            //select all content with category news
                            $sql="SELECT * FROM posts WHERE category='news'";
                            $newsposts=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($newsposts)>0){
                                while($row=mysqli_fetch_assoc($newsposts)){
                                    ?>
                                    <div class="m-1 p-2 d-flex flex-column justify-content-center" id="<?php echo $row['Topic']?>">
                                    <div class="col-md-6" style="background: rgb(16,16,44);">
                                        <h4 class="text-white"><?php echo $row['Topic']?></h4>
                                        <img class="img postimage mx-2" src="<?php echo "images/uploads/".$row['photo'];?>" height="250" width="300px">
                                        <div class="hashtag">
                                            <span class="badge badge-primary">#<?php echo $row['category'];?></span>
                                            <span class="badge badge-warning">#<?php echo $row['subcategory'];?></span>
                                            <span class="badge text-white">Starred <?php echo "⭐".$row['star'];?></span>
                                        </div>
                                        <div>
                                            <p class="text-white">website: <a href="<?php echo $row['link']?>"><?php echo $row['link']?></a></p>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6 border border-dark p-2">
                                        <div class="mycontent">
                                            <p><?php echo $row['content']?></p>
                                        </div>
                                        <form action="" class="commentform" method="post" style="width: 100%;">
                                            <input type="hidden" name="postid" value="<?php echo $row['id'];?>">
                                            <input type="hidden" name="commentor" value="<?php echo $username;?>">
                                            <div class="input-group flex-nowrap mb-1 d-flex flex-row">
                                                
                                                <textarea class="form-control" placeholder="comment" rows="1" name="comment"></textarea>
                                                <button class="input-group-text btn text-white fa-solid fa-paper-plane"></button>
                                            </div>
                                        </form>
                                        <div class="mycontentfooter">
                                            <span><i class="fa-solid fa-calendar"></i><?php echo " ".$row['postdate']?></span>
                                            <span><i class="fa-solid fa-user"></i><?php echo " ".$row['author']?></span>
                                            <span><i class="fa-solid fa-share-nodes"></i><?php echo " share".$row['id']?></span>
                                        </div>
                                        
                                    </div>
                                    </div>
                                    <?php
                                }
                            }
                            
                            ?>
                        </div>
                    </div>
                    
                </div>
                <div class="divtrending m-2">
                    <div class="border" style="background-color: rgb(16,16,44);">
                        <h4 class="text-warning text-center m-1">TRENDING</h4>
                        <div class="d-flex m-0 p-3 flex-column border border-dark bg-white justify-content-center">
                            <?php
                            
                            //select all content with category news
                            $sql="SELECT * FROM posts WHERE category='Trending'";
                            $trendingposts=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($trendingposts)>0){
                                while($row=mysqli_fetch_assoc($trendingposts)){
                                    ?>
                                    <div class="m-1 p-2d-flex flex-column justify-content-center" id="<?php echo $row['Topic']?>">
                                    <div class="col-md-6" style="background: rgb(16,16,44);">
                                        <h4 class="text-white"><?php echo $row['Topic']?></h4>
                                        <img class="img postimage mx-2" src="<?php echo "images/uploads/".$row['photo'];?>" height="250" width="300px">
                                        <div class="hashtag">
                                            <span class="badge badge-primary">#<?php echo $row['category'];?></span>
                                            <span class="badge badge-warning">#<?php echo $row['subcategory'];?></span>
                                            <span class="badge text-white">Starred <?php echo "⭐".$row['star'];?></span>
                                        </div>
                                        <div>
                                            <p class="text-white">website: <a href="<?php echo $row['link']?>"><?php echo $row['link']?></a></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border border-dark p-2">
                                        <div class="mycontent">
                                            <p><?php echo $row['content']?></p>
                                        </div>
                                        <form action="" class="commentform" method="post" style="width: 100%;">
                                            <input type="hidden" name="postid" value="<?php echo $row['id'];?>">
                                            <input type="hidden" name="commentor" value="<?php echo $username;?>">
                                            <div class="input-group flex-nowrap mb-1 d-flex flex-row">
                                                
                                                <textarea class="form-control" placeholder="comment" rows="1" name="comment"></textarea>
                                                <button class="input-group-text btn text-white fa-solid fa-paper-plane"></button>
                                            </div>
                                        </form>
                                        <div class="mycontentfooter">
                                            <span><i class="fa-solid fa-calendar"></i><?php echo " ".$row['postdate']?></span>
                                            <span><i class="fa-solid fa-user"></i><?php echo " ".$row['author']?></span>
                                            <span><i class="fa-solid fa-share-nodes"></i><?php echo " share".$row['id']?></span>
                                        </div>
                                    </div>
                                    </div>
                                    <?php
                                }
                            }
                            
                            ?>
                        </div>
                    </div>
                </div>
                <div class="divsports m-2">
                    <div class="border" style="background-color: rgb(16,16,44);">
                        <h4 class="text-warning text-center m-1">SPORTS</h4>
                        <div class="d-flex m-0 p-3 flex-column border border-dark bg-white justify-content-center">
                            <?php
                            
                            //select all content with category sports
                            $sql="SELECT * FROM posts WHERE category='Sports'";
                            $sportsposts=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($sportsposts)>0){
                                while($row=mysqli_fetch_assoc($sportsposts)){
                                    ?>
                                    <div class="m-1 p-2 d-flex flex-column justify-content-center" id="<?php echo $row['Topic']?>">
                                    <div class="col-md-6" style="background: rgb(16,16,44);">
                                        <h4 class="text-white"><?php echo $row['Topic']?></h4>
                                        <img class="img postimage mx-2" src="<?php echo "images/uploads/".$row['photo'];?>" height="250" width="300px">
                                        <div class="hashtag">
                                            <span class="badge badge-primary">#<?php echo $row['category'];?></span>
                                            <span class="badge badge-warning">#<?php echo $row['subcategory'];?></span>
                                            <span class="badge text-white">Starred <?php echo "⭐".$row['star'];?></span>
                                        </div>
                                        <div>
                                            <p class="text-white">website: <a href="<?php echo $row['link']?>"><?php echo $row['link']?></a></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border border-dark p-2">
                                        <div class="mycontent">
                                            <p><?php echo $row['content']?></p>
                                        </div>
                                        <form action="" class="commentform" method="post" style="width: 100%;">
                                            <input type="hidden" name="postid" value="<?php echo $row['id'];?>">
                                            <input type="hidden" name="commentor" value="<?php echo $username;?>">
                                            <div class="input-group flex-nowrap mb-1 d-flex flex-row">
                                                
                                                <textarea class="form-control" placeholder="comment" rows="1" name="comment"></textarea>
                                                <button class="input-group-text btn btn-primary text-white fa-solid fa-paper-plane"></button>
                                            </div>
                                        </form>
                                        
                                        <div class="mycontentfooter">
                                            <span><i class="fa-solid fa-calendar"></i><?php echo " ".$row['postdate']?></span>
                                            <span><i class="fa-solid fa-user"></i><?php echo " ".$row['author']?></span>
                                            <span><i class="fa-solid fa-share-nodes"></i><?php echo " share".$row['id']?></span>
                                        </div>
                                    </div>
                                    </div>
                                    <?php
                                }
                            }
                            
                            ?>
                        </div>
                    </div>
                </div>
                <div class="divadvert m-2">
                    <div class="border" style="background-color: rgb(16,16,44);">
                        <h4 class="text-warning text-center m-1">ADVERT</h4>
                        <div class="d-flex m-0 p-3 flex-column border border-dark bg-white justify-content-center">
                            <?php
                            
                            //select all content with category advert
                            $sql="SELECT * FROM posts WHERE category='Advert'";
                            $advertposts=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($advertposts)>0){
                                while($row=mysqli_fetch_assoc($advertposts)){
                                    ?>
                                    <div class="m-1 p-2 d-flex flex-column justify-content-center" id="<?php echo $row['Topic']?>">
                                    <div class="col-md-6" style="background: rgb(16,16,44);">
                                        <h4 class="text-white"><?php echo $row['Topic']?></h4>
                                        <img class="img postimage mx-2" src="<?php echo "images/uploads/".$row['photo'];?>" height="250" width="300px">
                                        <div class="hashtag">
                                            <span class="badge badge-primary">#<?php echo $row['category'];?></span>
                                            <span class="badge badge-warning">#<?php echo $row['subcategory'];?></span>
                                            <span class="badge text-white">Starred <?php echo "⭐".$row['star'];?></span>
                                        </div>
                                        <div>
                                            <p class="text-white">website: <a href="<?php echo $row['link']?>"><?php echo $row['link']?></a></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border border-dark p-2">
                                        <div class="mycontent">
                                            <p><?php echo $row['content']?></p>
                                        </div>
                                        <div class="mycontentfooter">
                                            <span><i class="fa-solid fa-calendar"></i><?php echo " ".$row['postdate']?></span>
                                            <span><i class="fa-solid fa-user"></i><?php echo " ".$row['author']?></span>
                                            <span><i class="fa-solid fa-share-nodes"></i><?php echo " share".$row['id']?></span>
                                        </div>
                                    </div>
                                    </div>
                                    <?php
                                }
                            }
                            
                            ?>
                        </div>
                    </div>
                </div>
                <div class="divadventure m-2">
                    <div class="border" style="background-color: rgb(16,16,44);">
                        <h4 class="text-warning text-center m-1">ADVENTURE</h4>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<div id="my-modal" class="modal alertshow" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <p class="alert alertshowmsg" style="position: absolute;top:30px;"></p>
        <div class="modal-content">
            
        </div>
    </div>
</div>
<footer class="d-flex row justify-content-center text-center" style="background: rgb(16,16,44);">
<div class="about col-md-3">
    <h4 class="text-warning">About</h4>
    <p class="text-white">Eric blog we advertise businesses,<br> companies,<br> post latest news, trending and sports</p>
</div>
<div class="contact col-md-3" class="text-white">
    <h4 class="text-warning">Contact</h4>
    <p class="text-white"><i class="fa fa-home text-white text-lowercase"></i> Kenya</p>
    <p class="text-white"><i class="fa-solid fa-phone"></i> +254707273244</p>
    <p class="text-white"><i class="fa-solid fa-phone"></i> +254759091813</p>
    <p class="text-white"><i class="fa-solid fa-envelope"></i> gichurieric50@gmail.com</p>
</div>
<div class="subscribe col-md-3" class="text-white">
    <h4 class="text-warning">Subscribe</h4>
    <form class="form p-3" method="post" action="">
        <div class="input-group flex-nowrap">
            <input type="email" class="form-control subemail">
            <button class="btn btn-danger" style="background: red !important;">subscribe</button>
        </div>
        
    </form>
    <hr style="background-color: white;">
    <div class="otherservices d-flex flex-column justify-content-center" style="width: 100%;">
        <h6 class="text-warning text-center">Other services</h6>
        <a class=" text-center" href="https:ericgichuri.github.io/"><p class="text-white p-0 m-0">web development & design </p></a>
        <a class=" text-center" href="https:ericgichuri.github.io/"><p class="text-white p-0 m-0">Desktop app development</p></a>
    </div>
</div>
<div class="socialmedia col-md-3">
    <h4 class="text-warning">Social</h4>
    <div class="justify-content center" style="width: 100%;">
    <p class="mx-2 text-white"><i class="fa-brands fa-facebook"></i></p>
    <p class="mx-2 text-white"><i class="fa-brands fa-twitter"></i></p>
    <p class="mx-2 text-white"><i class="fa-brands fa-instagram"></i></p>
    <p class="mx-2 text-white"><i class="fa-brands fa-github"></i></p>
    </div>
</div>
</footer>
</body>
</html>