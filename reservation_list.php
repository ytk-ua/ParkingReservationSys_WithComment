<?php
    //(C)
    require_once 'daos/ReservationDAO.php';
    require_once 'daos/ParkingDAO.php';
    require_once 'daos/UserDAO.php';
    session_start();
    $login_user = $_SESSION['login_user'];
    
    // var_dump($_GET);
    $user_id = $_GET['id'];
    // print $user_id;

    // // //DAOを使って＄user_mul番のユーザーの予約登録情報をDBから持ってくる
    // $reservations = ReservationDAO::find2($user_id);
    $reservations = ReservationDAO::find2($login_user->id);
    // var_dump($reservations);

    // //セッションからflash_messageを取得し、セッションから削除
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    // //HTML表示
    include_once 'views/reservation_list_view.php';

    