<?php
    //(C)
    session_start();
    require_once 'daos/AdminDAO.php';
    // var_dump($_POST);
    $account = $_POST['account'];
    // echo $user_id;
    $password = $_POST['password'];
    // print $password;

    // DAOを使ってログインの入力エラーチェック
    $errors = AdminDAO::login_validate($account, $password);
    // var_dump($errors);
    if(count($errors) !== 0){
        $_SESSION['errors'] = $errors;
        header('Location: admin_login.php');
        exit;
        }else{
            //AdminDAOを使ってDBにそんな入力値を持つ人がいるかを探す
            $admin = AdminDAO::check($account, $password);
            // var_dump($admin);
    
            //そんな人がいれば、
            if($admin !== false){
                //セッションにその人を保存
                $_SESSION['login_admin'] = $admin;
                header('Location: admin.php');
                exit;
            }else{
                $errors = array();
                $errors[] = 'アカウント名またはパスワードの確認ができませんでした<br>入力内容を確認して再度ログインしてください';
                $_SESSION['errors'] = $errors;
                header('Location: admin_login.php');
                exit;
            }
        }
    
    // //AdminDAOを使ってDBにそんな入力値を持つ人がいるかを探す
    // $admin = AdminDAO::check($account, $password);
    // // var_dump($admin);
    
    // //そんな人がいれば、
    // if($admin !== false){
    //     //セッションにその人を保存
    //     $_SESSION['login_admin'] = $admin;
    //     header('Location: admin.php');
    //     exit;
    // }else{
    //     header('Location: admin_login.php');
    //     exit;
    // }