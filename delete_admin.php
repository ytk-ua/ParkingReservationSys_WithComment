<?php
    //(C)
    require_once 'daos/AdminDAO.php';
    session_start();
    // var_dump($_POST);
    $id = $_POST['id'];
    $name = $_POST['name'];
    
    //$id番目のユーザーを削除
    AdminDAO::delete($id);
    
    $_SESSION['flash_message'] = $id . '番目の:' . $name .'さんを削除しました';
    
    header('Location: admin_list.php');
    exit;