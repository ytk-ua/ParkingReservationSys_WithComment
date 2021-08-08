<?php
    //(C)
    session_start();
    //user_create.phpで発生したerror情報を$errorsでSESSIONから取り出し
    $errors = $_SESSION['errors'];
    //セッションに保存されたエラー情報を破棄
    $_SESSION['errors'] = null;

    //viewの表示
    include_once 'views/parking_create_view.php';