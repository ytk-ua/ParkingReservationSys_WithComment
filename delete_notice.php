<?php
    //(C)
    require_once 'daos/NoticeDAO.php';
    session_start();
    var_dump($_POST);
    $id = $_POST['id'];

    //$id番目のユーザーを削除
    NoticeDAO::delete($id);
    
    $_SESSION['flash_message'] ='ID:' . $id . '番目のお知らせを削除しました';
    
    header('Location: admin_notice.php');
    exit;