<?php
    //(C)
    require_once 'daos/ParkingDAO.php';
    session_start();
 
    // var_dump($_GET);
    $id = $_GET['id'];
    // print $id;
    
    //DAOを使って＄id番の駐車場情報をDBから持ってくる
    $parking = ParkingDAO::find($id);
    // var_dump($user);
    
    $errors = $_SESSION['errors'];
    //セッションに保存されたエラー情報を破棄
    $_SESSION['errors'] = null;

    //HTML表示
    include_once 'views/edit_parking_view.php';

    