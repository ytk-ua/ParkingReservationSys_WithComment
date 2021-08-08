<?php
    //(C)
    require_once 'daos/NoticeDAO.php';
    session_start();
    
    $id = $_GET['id'];
    // var_dump($_GET);
    // print $id;
    
    //DAOを使って＄id番の駐車場情報をDBから持ってくる
    $notice = NoticeDAO::find($id);
    // var_dump($notice);
    
    //セッションからflash_messageを取得し、セッションから削除
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    //HTML表示
    include_once 'views/show_notice_view.php';

    