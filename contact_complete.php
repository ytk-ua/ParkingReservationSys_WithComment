<?php
    //(C)
    //viewの表示
    require_once 'models/Contact.php';
    require_once 'daos/ParkingDAO.php';
    require_once 'daos/ContactDAO.php';
    require_once 'models/User.php';
    //メールアドレスの読み込み
    require_once 'contact_address.php';
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
    
    // お問い合わせ日時
    $request_datetime = date("Y年m月d日 H時i分s秒");
    
    //Contactクラスの新しいインスタンス生成
    $contact = new Contact($user_id, $name, $email, $tel, $subject, $body);
    // var_dump($contact);

   //入力チェック(検証)
    $errors = $contact->validate();
    //エラーが一つもなければ
    if(count($errors) === 0){
        //ContactDAOを使ってDBに保存
        ContactDAO::insert($contact);
        $_SESSION['flash_message'] = 'お問い合わせが登録されました';
        $flash_message = $_SESSION['flash_message'];
        $_SESSION['flash_message'] = null;  
        include_once 'views/contact_complete_view.php';
        // header('Location: index.php');
        // exit;
    }else{ //エラーが一つでもあればセッションにエラー配列を保存
        $_SESSION['errors'] = $errors;
        //error情報を$errorsでSESSIONから取り出し
        $errors = $_SESSION['errors'];
        //セッションに保存されたエラー情報を破棄
        $_SESSION['errors'] = null;
        include_once 'views/contact_view.php';
        // header('location: user_create.php');
        // exit;
    }
    
    //自動返信メール
    $mailto = $email;
    // $mailto = $_POST['email'];
    $to = AdminMailAddress; 
    $mailfrom = "From:" . AdminMailAddress; 
    $subject0 = "お問い合わせ有難うございます。";
 
    $content = "";
    $content .= $name . " 様\r\n";
    $content .= "お問い合わせ有難うございます。\r\n";
    $content .= "お問い合わせ内容は下記通りでございます。\r\n";
    $content .= "=================================\r\n";
    $content .= "お名前	      " . htmlspecialchars($name) . "\r\n";
    $content .= "メールアドレス   " . htmlspecialchars($email) . "\r\n";
    $content .= "電話番号   " . htmlspecialchars($tel) . "\r\n";
    $content .= "タイトル   " . htmlspecialchars($subject) . "\r\n";
    $content .= "お問い合わせ内容   " . htmlspecialchars($body) . "\r\n";
    $content .= "お問い合わせ日時   " . $request_datetime . "\r\n";
    $content .= "=================================\r\n";
 
    //管理者確認用メール
    $subject2 = $name . " 様よりお問い合わせがありました。";
    $content2 = "";
    $content2 .= $name . " 様よりお問い合わせがありました。\r\n";
    $content2 .= "お問い合わせ内容は下記通りです。\r\n";
    $content2 .= "=================================\r\n";
    $content2 .= "お名前	      " . htmlspecialchars($name) . "\r\n";
    $content2 .= "メールアドレス   " . htmlspecialchars($email) . "\r\n";
    $content2 .= "電話番号   " . htmlspecialchars($tel) . "\r\n";
    $content2 .= "タイトル   " . htmlspecialchars($subject) . "\r\n";
    $content2 .= "内容   " . htmlspecialchars($body) . "\r\n";
    $content2 .= "お問い合わせ日時   " . $request_datetime . "\r\n";
    $content2 .= "================================="."\r\n";
     
    mb_language("ja");
    mb_internal_encoding("UTF-8");
    
    //mail 送信
    if(mb_send_mail($to, $subject2, $content2, $mailfrom)){
        mb_send_mail($mailto, $subject0, $content, $mailfrom);
        $_SESSION['send_message'] = 'メールを送信しました';
        $send_message = $_SESSION['send_message'];
        $_SESSION['send_message'] = null;
        // header('Location: form.php');
        exit;
    } else {
        header('Content-Type: text/html; charset=UTF-8');
        echo "メールの送信に失敗しました";
    };

    // include_once 'views/contact_complete_view.php';