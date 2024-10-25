<?php
if (isset($_POST["submit"])){
    $email=$_POST["email"];
    $password=$_POST["password"];

    require_once 'db.php';
    require_once 'functions.php';

    if(emptyInputLogin($username, $password) !==false){
        exit(); 
    }

    loginUser($conn, $username, $password);
}
else{
    header('Location:../login.php');
}