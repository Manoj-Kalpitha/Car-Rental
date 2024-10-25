<?php
if (isset($_POST["submit"])){
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $repeatpassword=$_POST["repeatpassword"];

    require_once 'db.php';
    require_once 'functions.php';

    // $emptyInput = emptyInputSignUp($username, $email, $password, $repeatpassword);
    // $invalidUsername = invalidUsername($username);
    // $invalidEmail = invalidEmail($email);
    // $passwordMacth = passwordMacth($password, $repeatpassword);
    // $usernameExsists = usernameExsists($conn, $username, $email);

    // if($emptyInput!==false){
    //     header("Location:../registration.php?error=emptyInput");
    //     exit(); 
    // } 
    // if($invalidUsername !==false){
    //     header("Location:../registration.php?error=invalidUsername");
    //     exit(); 
    // }
    // if( $invalidEmail !==false){
    //     header("Location:../registration.php?error= invalidEmail");
    //     exit(); 
    // } 
    // if($passwordMacth !==false){
    //     header("Location:../registration.php?error=passwordsdonotmacth");
    //     exit(); 
    // }

    // if($usernameExsists !==false){
    //     header("Location:../registration.php?error=usernametaken");
    //     exit(); 
    // }

    createUser($conn, $username, $email, $password);
}
else{
    header('Location:../registration.php');
}