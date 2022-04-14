<?php

session_start();
if(!isset($_SESSION['adminusername'])){
    header("location: adminlogin.php");
}else{
    session_destroy();
    header("location: adminlogin.php");
}

?>