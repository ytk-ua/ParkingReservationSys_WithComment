<?php
    //(C)
    require_once 'daos/ReservationDAO.php';
    session_start();
    //ReserveDAOを使ってデータベースから全予約登録情報を取得
    $reservations = ReservationDAO::get_all_reservations();
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;

    // $flash_message2 = $_SESSION['flash_message2'];
    // $_SESSION['flash_message2'] = null;
    
    include_once 'views/admin_reservation_view.php';