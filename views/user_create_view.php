<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規ユーザー登録</title>
    <link rel="stylesheet" href="css/style.css">
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
            <li class="current"><a href="index.php">HOME</a></li>
            <li><a href = about.php>システム概要</a></li>
            <li><a href = guide.php>ご利用ガイド</a></li>
            <li><a href = contact.php>お問合せ</a></li>
        </ul>
    </nav>
</header>
<!--/ヘッダー-->

<!--メイン-->
<div id="main">
    <h1>新規ユーザー登録</h1>
    <h2>新規ユーザー登録フォーム</h2>

    <?php if($errors !== null): ?>
    <ul>
    <?php foreach($errors as $error ): ?>
        <li class="error"><?= $error ?></li>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <p>以下にご登録いただく内容を入力し登録ボタンを押してください。</p>
    <form action="user_store.php" method="POST">
        <dl>
            <dt>名前<span class="must">※必須</span></dt>
            <dd><input type="text" id="name" name="name" value="<?= $user->name ?>" placeholder="氏名" ></dd>
            <dt>部屋番号<span class="must">※必須</span></dt>
            <dd><input type="number" id="room_no" name="room_no" min="101" max="3020" step="10"value="<?= $user->room_no ?>" placeholder="部屋番号(半角数字)"></dd>
            <dt>アカウント名<span class="must">※必須</span></dt>
            <dd><input type="text" id="account" name="account" value="<?= $user->account ?>" placeholder="アカウント名(半角英数字)"></dd>
            <dt>パスワード<span class="must">※必須</span></dt>
            <dd><input type="password" id="password" name="password" value="<?= $user->password ?>" placeholder="パスワード(半角英数字)"></dd>
            <dt>メールアドレス</dt>
            <dd><input type="email" id="email" name="email" value="<?= $user->email ?>" placeholder="Emailアドレス"></dd>
            <dt>電話番号</dt>
            <dd><input type="text" id="tel" name="tel" value="<?= $user->tel ?>" placeholder="電話番号(半角英数字-(ハイフン)不要)"></dd>
        </dl>
            <p id="reset_button"><input type="reset" value="リセット"></p>
            <p id="submit_button"><input type="submit" value="登録"></p>
            
    </form>
    <p><a href="index.php">キャンセル</a></p>
</div>
<!--/メイン-->

<!--フッター-->
<footer>
    <div id="footer_nav">
        <ul>
            <li class="current"><a href="index.php">HOME</a></li>
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