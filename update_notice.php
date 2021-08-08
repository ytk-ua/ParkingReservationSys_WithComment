<?php
    //(C)
    require_once 'daos/NoticeDAO.php';
    session_start();
    // var_dump($_POST);
    // var_dump($_FILES);

    // 入力画面から飛んできた値を取得する
    $id = $_POST['id'];
    $regist_date = $_POST['regist_date'];
    $title = $_POST['title'];
    $overview = $_POST['overview'];
    $link_url = $_POST['link_url'];
    $image = $_FILES['image']['name'];

    // NoticeDAOを使って $idからインスタンスを復元
    $notice = NoticeDAO::find($id);

    // そのインスタンスのプロパティ値を変更
    $notice->regist_date = $regist_date;
    $notice->title = $title;
    $notice->overview = $overview;
    $notice->link_url = $link_url;

    // ファイルが選択されていれば
    if($_FILES['image']['size'] !== 0){
        $notice->image = $image;
    }
    // var_dump($notice);
    
    //入力チェック(検証)
    $errors = $notice->validate();
    // var_dump($errors);
    //エラーが一つもなければ
    if(count($errors) === 0){
        //NoticeDAOを使ってDBに保存
        NoticeDAO::update($notice);
        // 新しいファイルが選択されていれば
        if($_FILES['image']['size'] !== 0){
            // 画像のフルパスを設定
            $file = 'upload/' . $image;
            // uploadディレクトリにファイル保存
            move_uploaded_file($_FILES['image']['tmp_name'], $file);
        }        
        $_SESSION['flash_message'] = '『' . $title . '』が更新されました';
        header('location: admin_notice.php');
        exit;
    }else{ //エラーが一つでもあればセッションにエラー配列を保存
        $_SESSION['errors'] = $errors;
        //画面遷移
        header('location: edit_notice.php?id=' . $id);
        exit;
    }
    
    // 画面遷移（show.phpへ）
    // header('location: admin_notice.php');
    // exit;