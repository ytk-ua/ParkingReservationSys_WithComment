<?php
    //(C)
    require_once 'daos/UserDAO.php';
    require_once 'daos/ReservationDAO.php';
    require_once 'daos/ParkingDAO.php';
    session_start();
    $login_user = $_SESSION['login_user'];
    // var_dump($login_user);
    
    // var_dump($_GET);
    $id = $_GET['id'];
    // print $id;
    
    //DAOを使って＄id番の予約登録情報をDBから持ってくる
    $reservation = ReservationDAO::find($id);
    // var_dump($reservation);
    
    //ParkingDAOを使ってデータベースから全駐車場情報を取得
    //Parkingの選択肢用に駐車場情報を利用
    $parkings = ParkingDAO::get_all_parkings();

    //HTML表示
    include_once 'views/edit_reservation_view.php';

    