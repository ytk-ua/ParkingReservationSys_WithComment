<?php
    //(C)
    require_once 'daos/UserDAO.php';

    // var_dump($_GET);
    $id = $_GET['id'];
    // print $id;
    
    //DAOを使って＄id番のユーザー情報をDBから持ってくる
    $user = UserDAO::find($id);
    // var_dump($user);
    
    //HTML表示
    include_once 'views/edit_view.php';

    