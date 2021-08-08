<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>管理者ページトップ</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!--ヘッダー-->
<header>
    <a href="index.php"><img src="images/logo.png" alt="Parking Reservation System" id="logo"></a>
    <div id="header_button">
    <ul>
        <li><a href="logout_admin.php" class="admin_logout">ログアウト</a></li>
        <li><a href="admin_list.php" class="admin_list">管理者情報管理</a></li>
    </ul>
    </div>
    <nav id="global_navi_admin">
        <ul>
            <li class="current"><a href="admin.php">HOME</a></li>
            <li><a href="admin_user.php">ユーザー管理</a></li>
            <li><a href="admin_parking.php">駐車場管理</a></li>
            <li><a href="admin_reservation.php">予約管理</a></li>
            <li><a href="admin_use.php">利用実績管理</a></li>        
            <li><a href="admin_notice.php">お知らせ管理</a></li>
            <li><a href="admin_contact.php">問合せ管理</a></li>
        </ul>
    </nav>
</header>
<!--/ヘッダー-->

<!--メイン-->
<div id="main">    

    <h1>管理者ページトップ</h1>
    <p class="session"><?= $login_admin->name ?>さん、ようこそ！</p>
    <h2>管理者専用メニュー</h2>
    <p>管理者専用メニューで各種管理機能が利用可能です<br>
        以下よりご希望のメニューをご利用ください</p>
    <ul>
        <li><a href="admin_user.php">ユーザー管理</a></li>
        <li><a href="admin_parking.php">駐車場管理</a></li>
        <li><a href="admin_reservation.php">予約管理</a></li>
        <li><a href="admin_use.php">利用実績管理</a></li>        
        <li><a href="admin_notice.php">お知らせ管理</a></li>
        <li><a href="admin_contact.php">問合せ管理</a></li>
        <li><a href="admin_list.php">管理者登録情報管理</a></li>
    </ul>

    <?php if($flash_message !== null): ?>
    <p class="flash"><?= $flash_message ?></p>
    <?php endif; ?>

    <!--<p><a href="admin_create.php">新規管理者登録</a></p>-->
    <!--<p><a href="logout_admin.php">ログアウト</a></p>-->

</div>
<!--/メイン-->

<!--フッター-->
<footer>
    <div id="footer_nav">
        <ul>
            <li><a href = admin.php>HOME</a></li>
            <li><a href = about.php>システム概要</a></li>
            <li><a href = guide.php>ご利用ガイド</a></li>
            <li><a href = contact.php>お問合せ</a></li>
        </ul>
    </div>
    <small>&copy; 2021 ParkingReservationSystem</small>
</footer>
<!--/フッター-->

</body>
</html>