<?php
function  emptyInputSignUp($username, $email, $password, $repeatpassword){

    if(empty($username) || ($email) || ($password) || ($repeatpassword)){
        $result=true;
    }
    else{
        $result=false;
    } 
    return $result;
}

function invalidUsername($username){

    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result=true;
    }
    else{
        $result=false;
    } 
    return $result;
}

function invalidEmail($email){
   
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
    else{
        $result=false;
    } 
    return $result;
}

function passwordMacth($password, $repeatpassword){
    
    if($password !== $repeatpassword){
        $result=true;
    }
    else{
        $result=false;
    } 
    return $result;
}

function usernameExsists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersName = ? OR  usersEmail ?;"; 
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../registration.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        return false;
    }

    mysqli_stmt_close($stmt);
}

function  createUser($conn, $username, $email, $password){
    $sql= "INSERT INTO users(usersName, usersEmail, usersPassword) VALUES(?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../registration.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../login.php?error=none");
    exit();
}

function  emptyInputLogin ($email, $password){

    if(empty($username) || ($email) || ($password)){
        $result=true;
    }
    else{
        $result=false;
    } 
    return $result;
}

function  loginUser($conn, $username, $password, $email){
    $usernameExsists= usernameExsists($conn, $username, $email);
    if($usernameExsists === false){
        header("Location:../signUp.php?error=wronglogin");
        exit();
    }

    $passwordHashed = $usernameExsists["usersPassword"];
    $checkPassword = password_verify($password, $passwordHashed);

    if($checkPassword === false){
        header("Location:../signUp.php?error=wronglogin");
        exit();
    }
    elseif($checkPassword === true){
        session_start();
        $_SESSION["userid"] = $usernameExsists["usersId"];
        $_SESSION["userUid"] = $usernameExsists["usersUid"];
        header("Location:../contactus.php");
        exit();
    }
}