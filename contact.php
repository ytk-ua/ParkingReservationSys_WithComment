<?php
    //(C)
    //viewの表示
    
    require_once 'models/User.php';
    session_start();
    $login_user = $_SESSION['login_user'];

    //error情報を$errorsでSESSIONから取り出し
    $errors = $_SESSION['errors'];
    //セッションに保存されたエラー情報を破棄
    $_SESSION['errors'] = null;

    include_once 'views/contact_view.php';