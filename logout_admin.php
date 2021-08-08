<?php
    //(C)
    session_start();
    $_SESSION['login_admin'] = null;
    
    header('Location: index.php');
    exit;