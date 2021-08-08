<?php
    //(C)
    require_once 'daos/UserDAO.php';
    require_once 'daos/NoticeDAO.php';
    session_start();

    // var_dump($_GET);
    $id = $_GET['id'];
    // print $id;
    
    //DAOを使って＄id番のユーザー情報をDBから持ってくる
    $notice = NoticeDAO::find($id);
    // var_dump($notice);

    $errors = $_SESSION['errors'];
    //セッションに保存されたエラー情報を破棄
    $_SESSION['errors'] = null;    
    
    //HTML表示
    include_once 'views/edit_notice_view.php';

    