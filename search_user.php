<?php
    //(C)
    require_once 'daos/UserDAO.php';
    //$_POSTを指定してないので＄_GETで飛んでくる
    // var_dump($_GET);
    session_start();
    $keyword = $_GET['name'];
    
    //$keywordであいまい検索する。
    $users = UserDAO::search($keyword);
    // var_dump($users);
    
    //検索キーワードが空の場合は、flash_messageに何も表示しない。
    if($keyword === ''){
        $flash_message = '';
    }else{
    $flash_message ='検索キーワード『' . $keyword . '』で検索しました';
    }
    
    //HTML表示
    include_once 'views/admin_user_view.php';