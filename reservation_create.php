<?php
    //(C)
    //viewの表示
    
    require_once 'models/User.php';
    require_once 'daos/ParkingDAO.php';
    require_once 'daos/ReservationDAO.php';
    session_start();
    $login_user = $_SESSION['login_user'];

    //ParkingDAOを使ってデータベースから全駐車場情報を取得
    //Parkingの選択肢用に駐車場情報を利用
    $parkings = ParkingDAO::get_all_parkings();

    $start_date = $_GET['start_date'];
    $start_time = $_GET['start_time'];
    $parking_id = $_GET['parking_id'];
    // var_dump($_GET);

    $end_date_times = ReservationDAO::find7($start_date, $start_time, $parking_id);
    $parking = ParkingDAO::find($parking_id);
    // var_dump($parking);

    // var_dump($end_date_times);

    if(count($end_date_times) === 0){
        $limit = 23;
    }else{
        $limit = (int)substr($end_date_times[0]->start_time, 0, 2) - 1;    
    }

    $start = (int)substr($start_time, 0, 2);
    
    include_once 'views/reservation_create_view.php';