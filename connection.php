<?php
$host="localhost";
$user="root";
$pass="";
$database="blogsite";
$conn=mysqli_connect($host,$user,$pass);
/*
$host="sql206.epizy.com";
$user="epiz_31163290";
$password="5XweAJJ8FD9l";
$database="epiz_31163290_blog";
*/
if (!$conn) {
    echo "error".mysqli_connect_error();
}

#create database
//$createdb="CREATE DATABASE IF NOT EXISTS blogsite";
//$query1=mysqli_query($conn,$createdb);
//if(!$query1){
//    echo "! Database not created".mysqli_connect_error();
//}
#connect to database
mysqli_select_db($conn,$database);
#create table posts
/*$createtableposts="CREATE TABLE IF NOT EXISTS posts(
    id int(20) NOT NULL AUTO_INCREMENT,
    photo varchar(30) NOT NULL,
    Topic varchar(40) NOT NULL,
    content varchar(1000) NOT NULL,
    category varchar(20) NOT NULL,
    sub_category varchar(20) NOT NULL,
    link varchar(100),
    author varchar(30) NOT NULL,
    postdata date NOT NULL,
    star varchar(10) NOT NULL,
    PRIMARY KEY(id)
    
)";
$query2=mysqli_query($conn,$createtableposts);
if(!$query2){
    echo "!! Table not created".mysqli_error($conn);
}

#createtable admins
$creatableadmin="CREATE TABLE IF NOT EXISTS admin(
    id int(20) NOT NULL AUTO_INCREMENT,
    name varchar(40) NOT NULL,
    username Varchar(20) NOT NULL,
    email varchar(40) NOT NULL,
    phoneno varchar(20) NOT NULL,
    password varchar(20) NOT NULL,
    PRIMARY KEY(id),
    UNIQUE KEY(username),
    UNIQUE KEY(email),
    UNIQUE KEY(phoneno)
)";

$query3=mysqli_query($conn,$creatableadmin);
if(!$query3){
    echo "!! Table not created".mysqli_error($conn);   
}

#createtable users
$createtableusers="CREATE TABLE IF NOT EXISTS users(
    id int(20) NOT NULL AUTO_INCREMENT,
    firstname varchar(20) NOT NULL,
    lastname varchar(20) NOT NULL,
    email varchar(50) NOT NULL,
    phoneno varchar(20) NOT NULL,
    username varchar(20) NOT NULL,
    password varchar(20) NOT NULL,
    PRIMARY KEY(id),
    UNIQUE KEY(email),
    UNIQUE KEY(username)
)";

$query4=mysqli_query($conn,$createtableusers);
if(!$query4){
    echo "!! table users not created".mysqli_error($conn);
}

#create table comments
$createtablecomments="CREATE TABLE IF NOT EXISTS comments(
    id int(20) NOT NULL AUTO_INCREMENT,
    postid int(20) NOT NULL,
    commentor varchar(20) NOT NULL,
    comment varchar(500) NOT NULL,
    star varchar(10) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(postid) REFERENCES posts(id) 
)";

$query5=mysqli_query($conn,$createtablecomments);
if(!$query5){
    echo "!! table comments not created".mysqli_error($conn);
}


#create table messages
$createmessages="CREATE TABLE IF NOT EXISTS messages(
    id int(20) NOT NULL AUTO_INCREMENT,
    name varchar(40) NOT NULL,
    email varchar(40),
    phoneno varchar(20) NOT NULL,
    subject varchar(40) NOT NULL,
    message varchar(300) NOT NULL,
    mark varchar(10) NOT NULL,
    PRIMARY KEY(id)

)";

$query6=mysqli_query($conn,$createmessages);
if(!$query6){
    echo "!! table messages not created".mysqli_error($conn);
}

//create table subscribers
$createtablesubscribere="CREATE TABLE IF NOT EXISTS subscribers(
    id int(20) NOT NULL AUTO_INCREMENT,
    email varchar(40) NOT NULL,
    PRIMARY KEY(id),
    UNIQUE KEY(email)
)";
$query7=mysqli_query($conn,$createtablesubscribere);
if(!$query7){
    echo "!! table subscribers not created".mysqli_error($conn);
}

*/
?>