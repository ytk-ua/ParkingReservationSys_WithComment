<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規管理者登録</title>
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
    <h1>新規管理者登録</h1>
    <h2>新規管理者登録フォーム</h2>

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
    
    <form action="admin_store.php" method="POST">
        <dl>
            <dt>名前<span class="must">※必須</span></dt>
            <dd><input type="text" id="name" name="name" value="<?= $admin->name ?>" placeholder="氏名"></dd>
            <dt>アカウント名<span class="must">※必須</span></dt>
            <dd><input type="text" id="account" name="account" value="<?= $admin->account ?>" placeholder="アカウント名(半角英数字)"></dd>
            <dt>パスワード<span class="must">※必須</span></dt>
            <dd><input type="password" id="password" name="password" value="<?= $admin->password ?>" placeholder="パスワード(半角英数字)"></dd>
            <dt>メールアドレス</dt>
            <dd><input type="email" id="email" name="email" value="<?= $admin->email?>" placeholder="Emailアドレス"></dd>
        </dl>
            <input type="reset" value="リセットする"><br>
            <input type="submit" value="登録">
    </form>
    
    <br>
    <p><a href="admin_list.php">キャンセル</a></p>

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