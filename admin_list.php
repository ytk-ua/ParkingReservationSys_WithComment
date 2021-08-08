<?php
    //(C)
    require_once 'daos/AdminDAO.php';
    session_start();
    //AdminDAOを使ってデータベースから全管理者情報を取得
    $admins = AdminDAO::get_all_admins();
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    $flash_message2 = $_SESSION['flash_message2'];
    $_SESSION['flash_message2'] = null;
    
    include_once 'views/admin_list_view.php';