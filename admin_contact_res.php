<?php
    //(C)
    //viewの表示
    
    require_once 'models/User.php';
    require_once 'daos/ContactDAO.php';
    session_start();
    $login_user = $_SESSION['login_user'];
    
    $id = $_GET['id'];
    // print $id;
    
    //ContactDAOを使ってDBに$idの問い合わせを探す
    $contact2 = ContactDAO::find($id);
    // var_dump($contact2);

    //問い合わせ情報を$contactでSESSIONに保存
    $_SESSION['contact2'] = $contact2;

    //error情報を$errorsでSESSIONから取り出し
    $errors = $_SESSION['errors'];
    //セッションに保存されたエラー情報を破棄
    $_SESSION['errors'] = null;

    include_once 'views/admin_contact_res_view.php';
    