<?php
    // (C)
    // require_once 'models/Admin.php';
    require_once 'daos/AdminDAO.php';
    session_start();
    // var_dump($_POST);
    $name = $_POST['name'];
    $account = $_POST['account'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    //Userクラスの新しいインスタンス生成
    $admin = new Admin($name, $account, $password, $email);
    // var_dump($admin);
 
    //入力チェック(検証)
    $errors = $admin->validate();
    //エラーが一つもなければ
    if(count($errors) === 0){
        //UserDAOを使ってDBに保存
        AdminDAO::insert($admin);
        $_SESSION['flash_message'] = $name . 'さんが追加されました';
        // index.phpへ移動(リダイレクト)
        header('Location: admin_list.php');
        exit;
    
    }else{ //エラーが一つでもあればセッションにエラー配列を保存
        $_SESSION['errors'] = $errors;
        //入力項目に入力した内容を保持するためにPOSTで受け取った内容で構成した＄userをSessionで共有する
        $_SESSION['admin'] = $admin;
        //画面遷移
        header('location: admin_create.php');
        exit;
    }

    // $_SESSION['login_admin'] = $admin;
    
    // 画面遷移（管理者登録情報ページへ）
    header('location: admin_list.php');
    exit;