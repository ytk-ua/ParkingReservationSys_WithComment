<?php
    //(C)
    //viewの表示
    require_once 'models/Contact.php';
    require_once 'daos/ParkingDAO.php';
    require_once 'daos/ContactDAO.php';
    require_once 'models/User.php';
    session_start();
    //login_check.phpでSESSIONにいれたログインユーザー情報を引き出す
    $login_user = $_SESSION['login_user'];
    // var_dump($_POST);
    
    if($login_user !== null){
        $user_id = $_POST['id'];
        $name = $login_user->name;
        $email = $login_user->email;
        $tel = $login_user->tel;
    }else{
        $user_id = '-';
        $name = $_POST['name'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
    }
    // $name = $_POST['name'];
    // $name = $login_user->name;
    // $email = $_POST['email'];
    // $email = $login_user->email;
    // $email_check = $_POST['email_check'];
    // $tel = $_POST['tel'];
    // $tel = $login_user->tel;
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    
    //Contactクラスの新しいインスタンス生成
    $contact = new Contact($user_id, $name, $email, $tel, $subject, $body);
    // var_dump($contact);

   //入力チェック(検証)
    $errors = $contact->validate();
    //エラーが一つもなければ
    if(count($errors) === 0){
        //ContactDAOを使ってDBに保存
        ContactDAO::insert($contact);
        $_SESSION['flash_message'] = '問い合わせが登録されました';
        include_once 'views/contact_complete_view.php';
        // header('Location: index.php');
        // exit;
    }else{ //エラーが一つでもあればセッションにエラー配列を保存
        $_SESSION['errors'] = $errors;
        include_once 'views/contact_complete_view.php';
        // header('location: user_create.php');
        // exit;
    }
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;

    //error情報を$errorsでSESSIONから取り出し
    $errors = $_SESSION['errors'];
    //セッションに保存されたエラー情報を破棄
    $_SESSION['errors'] = null;

    include_once 'views/contact_complete_view.php';