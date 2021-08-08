<?php
    //(C)
    require_once 'daos/ParkingDAO.php';
    session_start();
    // var_dump($_POST);
    $parking_name = $_POST['parking_name'];
    $price = $_POST['price'];
    $address = $_POST['address'];
    $size = $_POST['size'];
    $remarks = $_POST['remarks'];
    
    //Parkingクラスの新しいインスタンス生成
    $parking = new Parking($parking_name, $price, $address, $size, $remarks);
    // var_dump($parking);

   //入力チェック(検証)
    $errors = $parking->validate();
    //エラーが一つもなければ
    if(count($errors) === 0){
        //ParkingDAOを使ってDBに保存
        ParkingDAO::insert($parking);
        $_SESSION['flash_message'] = $parking_name . 'の駐車場が追加されました';
        header('location:admin_parking.php');
        exit;
    
    }else{ //エラーが一つでもあればセッションにエラー配列を保存
        $_SESSION['errors'] = $errors;
        //画面遷移
        header('location: parking_create.php');
        exit;
    }

    

    // 画面遷移（マイページトップへ）
    header('location:admin_parking.php');
    exit;