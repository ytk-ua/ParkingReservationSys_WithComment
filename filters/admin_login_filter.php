<?php
    //Filter
    //ログインしているかしていないかを判定
    require_once 'models/Admin.php';
    session_start();
    $login_admin = $_SESSION['login_admin'];
    
    if($login_admin === null){
        header('Location: index.php');
        exit;
    }
