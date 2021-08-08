<?php
    // (C)
    // require_once 'models/User.php';
    require_once 'daos/UserDAO.php';
    session_start();
    // var_dump($_POST);
    $name = $_POST['name'];
    $room_no = $_POST['room_no'];
    $account = $_POST['account'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    
    //Userクラスの新しいインスタンス生成
    $user = new User($name, $room_no, $account, $password, $email, $tel);
    // var_dump($user);
    
    //入力チェック(検証)
    $errors = $user->validate();
    // var_dump($errors);
    
    //エラーが一つもなければ
    if(count($errors) === 0){
        //UserDAOを使ってDBに保存
        UserDAO::insert($user);
        $_SESSION['flash_message'] = $name . 'さんが追加されました';
        // index.phpへ移動(リダイレクト)
        header('Location: index.php');
        exit;
    }else{ //エラーが一つでもあればセッションにエラー配列を保存
        $_SESSION['errors'] = $errors;
        //入力項目に入力した内容を保持するためにPOSTで受け取った内容で構成した＄userをSessionで共有する
        $_SESSION['user'] = $user;

        //画面遷移
        header('location: user_create.php');
        exit;
    }

    // $_SESSION['login_user'] = $user;
    
    // 画面遷移（マイページトップへ）
    // header('location: index.php');
    // exit;