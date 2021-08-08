<?php
    //(C)
    require_once 'filters/login_filter.php';
    require_once 'models/User.php';
    require_once 'daos/NoticeDAO.php';
    session_start();
    $login_user = $_SESSION['login_user'];
    
    // var_dump($login_user);
    
    //NoticeDAOを使ってデータベースから全お知らせ情報を取得
    $notices = NoticeDAO::get_all_notices();
    
    //セッションからflash_messageを取得し、セッションから削除
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    //view表示
    include_once 'views/top_view.php';