<?php
    //(C)
    require_once 'daos/AdminDAO.php';
    session_start();
    // var_dump($_POST);
    $name = $_POST['name'];
    $account = $_POST['account'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    
    //Adminクラスの新しいインスタンス生成
    $admin = new Admin($name, $account, $password, $email);
    // var_dump($admin);

    //入力チェック(検証)
    $errors = $admin->validate();
    //エラーが一つもなければ
    if(count($errors) === 0){
        //AdminDAOを使ってDBに保存
        AdminDAO::update($admin, $id);
            $_SESSION['flash_message'] = $name . 'さんの情報を更新しました。';
        // index.phpへ移動(リダイレクト)
        header('Location: admin_list.php');
        exit;
    }else{ //エラーが一つでもあればセッションにエラー配列を保存
        $_SESSION['errors'] = $errors;
        //画面遷移
        header('location: edit_admin.php?id=' . $id);
        exit;
    }
    
    // $_SESSION['admin'] = $admin;
    
    // 画面遷移（admin_list.phpへ）
    header('location: admin_list.php');
    exit;