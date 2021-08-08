<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?= $user->name ?>さんの登録情報編集</title>
    <link rel="stylesheet" href="css/style.css">
    </head>
<body>
<!--ヘッダー-->
<header>
    <a href="index.php"><img src="images/logo.png" alt="Parking Reservation System" id="logo"></a>
    <div id="header_button">
    <ul>
        <li><a href="logout.php" class="user_logout">ログアウト</a></li>
        <!--<li><a href="edit.php?id=<?= $login_user->id ?>" class="user_edit">登録情報編集</a></li>-->
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

    <h1><?= $user->name ?>さんの登録情報編集</h1>
    <h2>登録情報編集フォーム</h2>
     
    <form action="update.php" method="POST">
        <dl>
            <dt>名前<span class="must">※必須</span></dt>
            <dd><input type="text" id="name" name="name" value="<?= $user->name ?>"></dd>
            <dt>部屋番号<span class="must">※必須</span></dt>
            <dd><input type="number" id="room_no" name="room_no" min="101" max="3020" step="10" value="<?= $user->room_no ?>"></dd>
            <dt>アカウント名<span class="must">※必須</span></dt>
            <dd><input type="text" id="account" name="account" value="<?= $user->account ?>"></dd>
            <dt>パスワード<span class="must">※必須</span></dt>
            <dd><input type="password" id="password" name="password" value="<?= $user->password ?>"></dd>
            <dt>メールアドレス</dt>
            <dd><input type="email" id="email" name="email" value="<?= $user->email ?>"></dd>
            <dt>電話番号</dt>
            <dd><input type="text" id="tel" name="tel" value="<?= $user->tel ?>"></dd>
        </dl>
            <input type="hidden" name="id" value="<?= $user->id ?>">
            <p id="reset_button"><input type="reset" value="リセット"></p>
            <p id="submit_button"><input type="submit" value="更新"></p>
        </ul>
    </form>

    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">前のページに戻る</a>
    <!--<p><a href="top.php">キャンセル</a></p>-->
</div>
<!--/メイン-->

<!--フッター-->
<footer>
    <div id="footer_nav">
        <ul>
            <li class="current"><a href="top.php">HOME</a></li>
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