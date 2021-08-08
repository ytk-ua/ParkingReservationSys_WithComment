<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?= $parking->parking_name ?>駐車場の詳細情報</title>
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
            <li><a href="admin.php">HOME</a></li>
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

    <h1><?= $parking->parking_name ?>駐車場の詳細情報</h1>
    <h2>登録情報の詳細</h2>
    
    <?php if($flash_message !== null): ?>
    <p class="flash"><?= $flash_message ?></p>
    <?php endif; ?>

    <?php if($errors !== null): ?>
    <ul>
    <?php foreach($errors as $error ): ?>
        <li class="error"><?= $error ?></li>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <dl>
        <dt>ID</dt>
        <dd><?= $parking->id ?></dd>
        <dt>駐車場名</dt>
        <dd><?= $parking->parking_name ?></dd>
        <dt>料金</dt>
        <dd><?= $parking->price ?>円/60分</dd>
        <dt>場所</dt>
        <dd><?= $parking->address ?></dd>
        <dt>サイズ</dt>
        <dd><?= $parking->size ?></dd>
        <dt>備考/連絡事項</dt>
        <dd><?= $parking->remarks ?></dd>
    </dl>
    <p><a href="edit_parking.php?id=<?= $parking->id ?>">編集</a></p>
    <p>
        <form action="delete_parking.php" method="POST">
        <input type="hidden" name="id" value="<?= $parking->id ?>">
        <input type="hidden" name="parking_name" value="<?= $parking->parking_name ?>">
        <button type="submit">削除</button>
        </form>
    </p>
    
    <!--<h2>利用実績</h2>-->

    <!--<p><a href="admin_parking.php">駐車場管理に戻る</a></p>-->
    <!--<p><a href="admin.php">管理者ページトップに戻る</a></p>-->

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