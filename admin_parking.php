<?php
    //(C)
    require_once 'daos/ParkingDAO.php';
    session_start();
    //ParkingDAOを使ってデータベースから全ユーザー情報を取得
    $parkings = ParkingDAO::get_all_parkings();
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;

    // $flash_message2 = $_SESSION['flash_message2'];
    // $_SESSION['flash_message2'] = null;
    
    include_once 'views/admin_parking_view.php';