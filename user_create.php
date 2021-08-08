<?php
    //(C)
    require_once 'models/User.php';
    session_start();
    //user_create.phpで発生したerror情報を$errorsでSESSIONから取り出し
    $errors = $_SESSION['errors'];
    //セッションに保存されたエラー情報を破棄
    $_SESSION['errors'] = null;

    // user_store.phpで作成した＄userをSESSIONから取り出し
    $user = $_SESSION['user'];
    $_SESSION['user'] = null;

    // var_dump($user);

    if($user === null){
        $user = new User();
    }

    //viewの表示
    include_once 'views/user_create_view.php';