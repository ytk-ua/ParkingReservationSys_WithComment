<?php
    //(C)
    require_once 'filters/admin_login_filter.php';
    require_once 'models/User.php';
    require_once 'daos/AdminDAO.php';
    session_start();
    
    // //UserDAOを使ってデータベースから全ユーザー情報を取得
    // $users = UserDAO::get_all_users();
    
    $login_admin = $_SESSION['login_admin'];
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;

    // $flash_message2 = $_SESSION['flash_message2'];
    // $_SESSION['flash_message2'] = null;
    
    include_once 'views/admin_view.php';