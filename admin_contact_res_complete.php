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

    // 問い合わせ内容を＄contact２としてSESSIONから引き出し
    $contact2 = $_SESSION['contact2'];
    
    $user_id = '-999';
    $name = $contact2->name;
    $email = $contact2->email;
    $tel = $contact2->tel;
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
        $_SESSION['flash_message'] = '返信が登録されました';
        $flash_message = $_SESSION['flash_message'];
        $_SESSION['flash_message'] = null;  
        include_once 'views/admin_contact_res_complete_view.php';
        // header('Location: index.php');
        // exit;
    }else{ //エラーが一つでもあればセッションにエラー配列を保存
        $_SESSION['errors'] = $errors;
        //error情報を$errorsでSESSIONから取り出し
        $errors = $_SESSION['errors'];
        //セッションに保存されたエラー情報を破棄
        $_SESSION['errors'] = null;
        include_once 'views/admin_contact_res_view.php';
        // header('location: user_create.php');
        // exit;
    }
    
    //自動返信メール
    // $mailto = $_POST['email'];
    $mailto = $email;
    $to = AdminMailAddress; 
    $mailfrom = "From:" . AdminMailAddress; 
    $subject = $subject;
 
    $content = "";
    $content .= $name . " 様\r\n";
    $content .= "お問い合わせ有難うございました。\r\n";
    $content .= "お問い合わせへのご回答をお送りいたします。\r\n";
    $content .= "=================================\r\n";
    $content .= "タイトル   " . htmlspecialchars($subject) . "\r\n";
    $content .= "ご回答   " . htmlspecialchars($body) . "\r\n";
    $content .= "ご回答日時   " . $request_datetime . "\r\n";
    $content .= "=================================\r\n";
 
    //管理者確認用メール
    $subject2 = $name . " 様へ返信を送付しました。";
    $content2 = "";
    $content2 .= $name . " 様へ返信を送付しました。\r\n";
    $content2 .= "返信内容は下記通りです。\r\n";
    $content2 .= "=================================\r\n";
    $content2 .= "タイトル   " . htmlspecialchars($subject) . "\r\n";
    $content2 .= "返信内容   " . htmlspecialchars($body) . "\r\n";
    $content2 .= "返信日時   " . $request_datetime . "\r\n";
    $content2 .= "=================================\r\n";
    $content2 .= "お名前	      " . htmlspecialchars($name) . "\r\n";
    $content2 .= "メールアドレス   " . htmlspecialchars($email) . "\r\n";
    $content2 .= "電話番号   " . htmlspecialchars($tel) . "\r\n";
    $content2 .= "================================="."\r\n";
     
    mb_language("ja");
    mb_internal_encoding("UTF-8");
    
    //mail 送信
    if(mb_send_mail($to, $subject2, $content2, $mailfrom)){
        mb_send_mail($mailto, $subject, $content, $mailfrom);
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