<?php
    //(C)
    require_once 'daos/ReservationDAO.php';
    require_once 'daos/UserDAO.php';
    require_once 'daos/ParkingDAO.php';
    session_start();
    //login_check.phpでSESSIONにいれたログインユーザー情報を引き出す
    $login_user = $_SESSION['login_user'];
    
    $user_id = $_POST['id'];
    $parking_id = $_POST['parking_id'];
    $start_date = $_POST['start_date'];
    $start_time = $_POST['start_time'];
    $end_date = $_POST['end_date'];
    $end_time = $_POST['end_time'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $remarks = $_POST['remarks'];    

    var_dump($_POST);
    
    $id = $_POST['parking_id'];    
    // //DAOを使って＄id番の駐車場情報をDBから持ってくる
    $parking = ParkingDAO::find($id);
    // var_dump($parking);
    
    //Reservationクラスの新しいインスタンス生成
    $reservation = new Reservation($user_id, $parking_id, $start_date, $start_time, $end_date, $end_time, $email, $tel, $remarks);
    // var_dump($reservation);

    //ReserveDAOを使ってDBに保存
    ReservationDAO::insert($reservation);
    $_SESSION['flash_message'] = $login_user->name . 'さんの新しい予約が追加されました';
    
    // 画面遷移（マイページトップへ）
    // header('location: top.php');
    header('Location: search_vacant.php?date=' . $start_date);
    exit;
    