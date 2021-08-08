<?php
    //(C)
    session_start();

    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    // var_dump($errors);
    
    include_once 'views/admin_login_view.php';