<?php
    //(C)
    require_once 'models/Admin.php';
    session_start();

    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    //admin_create.phpで発生したerror情報を$errorsでSESSIONから取り出し
    $errors = $_SESSION['errors'];
    //セッションに保存されたエラー情報を破棄
    $_SESSION['errors'] = null;

    // admin_store.phpで作成した＄adminをSESSIONから取り出し
    $admin = $_SESSION['admin'];
    $_SESSION['admin'] = null;

    // var_dump($admin);

    if($admin === null){
        $admin = new Admin();
    }

    //viewの表示
    include_once 'views/admin_create_view.php';