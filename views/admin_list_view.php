<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>管理者情報管理</title>
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
    <h1>管理者情報管理</h1>

    <h2>新規管理者登録</h2>
    <p>新規管理者の追加は以下からご登録ください</p>

    <p><a href="admin_create.php">新規管理者登録</a></p>
    
    
    <!--//カウント関数は数を数をかずえてくれる-->
    <h2>管理者登録情報一覧</h2>
    
    <p>現在登録されている管理者の一覧です</p>
    
    <!--<p>-->
    <!--    <form action="search_user.php">-->
    <!--        <input type="search" name="name">-->
    <!--        <button type="submit">検索</button>-->
    <!--    </form>-->
    <!--</p>-->
        
    <?php if($flash_message !== null): ?>
    <p class="flash"><?= $flash_message ?></p>
    <?php endif; ?>
    
    <?php if(count($admins) === 0): ?>
    <p>管理者は誰もいません</p>
    <?php else: ?>
    <?php foreach($admins as $admin): ?>
    <ul>
        <li>ID:<?= $admin->id ?></li>
        <li>名前：<?= $admin->name ?></li>
        <li>アカウント名：<?= $admin->account ?></li>
        <li>パスワード：<?= $admin->password ?></li>
        <li>メールアドレス：<?= $admin->email ?></li>
    </ul>
    <p><a href="edit_admin.php?id=<?= $admin->id ?>">編集</a></p>
    <p>
        <form action="delete_admin.php" method="POST">
        <input type="hidden" name="id" value="<?= $admin->id ?>">
        <input type="hidden" name="name" value="<?= $admin->name ?>">
        <button type="submit">削除</button>
        </form>
    </p>
    <?php endforeach; ?>
    <?php endif; ?>
   
    <p><a href="admin.php">管理者ページトップ</a></p>
    <p><a href="index.php">ログアウト</a></p>

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