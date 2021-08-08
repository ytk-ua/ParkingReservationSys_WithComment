<?php
    //(C)
    require_once 'daos/UserDAO.php';
    session_start();
    // var_dump($_POST);
    $name = $_POST['name'];
    $room_no = $_POST['room_no'];
    $account = $_POST['account'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $id = $_POST['id'];
    
    //Userクラスの新しいインスタンス生成
    $user = new User($name, $room_no, $account, $password, $email, $tel);
    // var_dump($user);

    //入力チェック(検証)
    $errors = $user->validate();
    
    //エラーが一つもなければ
    if(count($errors) === 0){
        //UserDAOを使ってDBに保存
        UserDAO::update($user, $id);
        $_SESSION['flash_message'] = $name . 'さんの情報を更新しました。';
        header('location: show.php?id=' . $id);
        exit;
    
    }else{ //エラーが一つでもあればセッションにエラー配列を保存
        $_SESSION['errors'] = $errors;

        header('location: show.php?id=' . $id);
        exit;
    }

    // // $_SESSION['user'] = $user;
    // //UserDAOを使ってDBに保存
    // UserDAO::update($user, $id);
    
    // $_SESSION['flash_message'] = $name . 'さんの情報を更新しました。';
    
    // 画面遷移（show.phpへ）
    header('location: show.php?id=' . $id);
    exit;