<?php
    //(C)
    require_once 'daos/ReservationDAO.php';
    require_once 'daos/ParkingDAO.php';
    require_once 'daos/UserDAO.php';
    session_start();
    // $login_user = $_SESSION['login_user'];

    //タイムゾーンの設定
    date_default_timezone_set('Asia/Tokyo');
    
    // var_dump($_GET);
    // $user_id = $_GET['id'];
    // print $user_id;

    // // //DAOを使って＄parking_id番の駐車場の予約登録情報をDBから持ってくる
    // $reservations1 = ReservationDAO::find5($user_id);

    //DAOを使って＄start_dateの日付の予約登録情報をDBから持ってくる
    $reservations1 = ReservationDAO::find4(1);
    $reservations2 = ReservationDAO::find4(4);
    $reservations3 = ReservationDAO::find4(5);   
    // var_dump($reservations3);
    
    //（試行）array_sum+array_columnでの合計値の算出
    // $sum = array_sum(array_column($reservations1, 'user_id'));
    
    //ReserveDAOを使ってデータベースから全予約登録情報を取得
    $reservations = ReservationDAO::get_all_reservations();
  
    // //セッションからflash_messageを取得し、セッションから削除
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;

    //合計金額を算出する関数
    function total_price($reservations){
        $total = 0;
        foreach($reservations as $reservation){
        $parking = ParkingDAO::find($reservation->parking_id);
        $parking_price = $parking->price;
        $timestamp1 = strtotime("$reservation->start_date $reservation->start_time" );
        $timestamp2 = strtotime("$reservation->end_date $reservation->end_time" );
        $use_time = ($timestamp2 - $timestamp1)/60/60;
        $total = $total + $use_time * $parking_price;
        }
        return number_format($total);
    }   
    
    //合計時間を算出する関数
    function total_time($reservations){
        $total = 0;
        foreach($reservations as $reservation){
        $timestamp1 = strtotime("$reservation->start_date $reservation->start_time" );
        $timestamp2 = strtotime("$reservation->end_date $reservation->end_time" );
        $use_time = ($timestamp2 - $timestamp1)/60/60;
        $total = $total + $use_time;
        }
        return $total;
    }   
    
    // //HTML表示
    include_once 'views/admin_use_view.php';

    