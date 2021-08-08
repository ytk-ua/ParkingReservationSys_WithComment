<?php
    //(C)
    require_once 'daos/UserDAO.php';
    session_start();
    // var_dump($_POST);
    $id = $_POST['id'];
    $name = $_POST['name'];
    
    //$id番目のユーザーを削除
    UserDAO::delete($id);
    
    $_SESSION['flash_message'] = $id . '番目のユーザー:' . $name .'さんを削除しました';
    
    header('Location: admin_user.php');
    exit;