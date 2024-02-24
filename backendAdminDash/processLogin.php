<?php
session_start();
require 'Model/db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    //sql statement
    $stmt = $pdo->prepare("SELECT * FROM adminlogin WHERE adminemail = :email");
    $stmt ->execute(['email'=> $email]);
    $admin = $stmt->fetch();

    //verify password
    if($admin && password_verify($password, $admin['adminpassword'])){
        $_SESSION['adminid'] = $admin['adminid'];
        $_SESSION['adminemail'] = $admin['adminemail'];
        //redirect to dashboard
        header("Location: adminDashboard.php");
        exit;
    }else{//failed login
        header("Location: adminLogin.php?error=invalidcredentials");
        exit;
    }

}
?>