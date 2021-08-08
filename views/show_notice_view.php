<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ID<?= $notice->id ?>番のお知らせ</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
    img{
        width:  80%;
    }
    </style>
</head>
<body>

<!--ヘッダー-->
<header>
    <a href="index.php"><img src="images/logo.png" alt="Parking Reservation System" id="logo"></a>
    <div id="header_button">
    <ul>
        <li><a href="admin_login.php" class="login_admin">管理者用<br>ログイン</a></li>
        <li><a href="login.php" class="login_user">ログイン・新規ユーザー登録</a></li>
    </ul>
    </div>
    <nav id="global_navi">
        <ul>
            <li><a href="top.php">HOME</a></li>
            <li><a href = about.php>システム概要</a></li>
            <li><a href = guide.php>ご利用ガイド</a></li>
            <li><a href = contact.php>お問合せ</a></li>
        </ul>
    </nav>
</header>
<!--/ヘッダー-->

<!--メイン-->
<div id="main">
    <h1>ID<?= $notice->id ?>番のお知らせ</h1>
    <h2>お知らせ詳細情報</h2>
    
    <?php if($flash_message !== null): ?>
    <p class="flash"><?= $flash_message ?></p>
    <?php endif; ?>

         <dl>
            <dt>ID</dt>
            <dd><?= $notice->id ?></dd>
            <dt>登録日</dt>
            <?php $date = $notice->regist_date ?>
            <dd><?= date('Y年m月d日', strtotime($date)) ?></dd>            
            <dt>タイトル</dt>
            <dd><?= $notice->title ?></dd>
            <dt>概要</dt>
            <dd><?= $notice->overview ?></dd>
            <dt>画像</dt>
            <dd><img src="upload/<?= $notice->image ?>"></dd>
            <dt>リンクURL</dt>
            <dd><a href="<?= $notice->link_url ?>"><?= $notice->link_url ?></dd>
        </dl>
        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">前のページに戻る</a>

    <!--<p><a href="admin_parking.php">駐車場管理に戻る</a></p>-->
    <!--<p><a href="admin.php">管理者ページトップに戻る</a></p>-->

</div>
<!--/メイン-->

<!--フッター-->
<footer>
    <div id="footer_nav">
        <ul>
            <li><a href = top.php>HOME</a></li>
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