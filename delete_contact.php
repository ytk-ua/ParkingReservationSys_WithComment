<?php
    //(C)
    require_once 'daos/ContactDAO.php';
    session_start();
    // var_dump($_GET);
    $id = $_GET['id'];

    //$id番目のユーザーを削除
    ContactDAO::delete($id);
    
    $_SESSION['flash_message'] ='ID:' . $id . '番目の問い合わせを削除しました';
    
    header('Location: admin_contact.php');
    exit;