<?php
    //(C)
    require_once 'daos/ParkingDAO.php';
    //$_POSTを指定してないので＄_GETで飛んでくる
    // var_dump($_GET);
    session_start();
    $keyword = $_GET['parking_id'];
    
    //$keywordであいまい検索する。
    $parkings = ParkingDAO::search($keyword);
    // var_dump($parkings);
    
    //検索キーワードが空の場合は、flash_messageに何も表示しない。
    if($keyword === ''){
        $flash_message = '';
    }else{
    $flash_message =$keyword . 'で検索しました';
    }
    
    //HTML表示
    include_once 'views/admin_parking_view.php';