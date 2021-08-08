<?php
    //(C)
    require_once 'daos/NoticeDAO.php';
    require_once 'daos/UserDAO.php';
    require_once 'daos/AccessDAO.php';
    // require_once 'filters/access_filter.php';
    session_start();

    //NoticeDAOを使ってデータベースから全お知らせ情報を取得
    $notices = NoticeDAO::get_all_notices();

    //セッションからflash_messageを取得し、セッションから削除
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    // //Webスクレイピングを関数にして表示する関数
    // function scre( ){
    // require_once("./phpQuery-onefile.php");
    // $html = file_get_contents("https://ja.wikipedia.org/wiki/%E4%B8%89%E5%9B%BD%E5%BF%97");
    // echo phpQuery::newDocument($html)->find("p")->text();
    // }   

    //viewの表示
    include_once 'views/index_view.php';
    