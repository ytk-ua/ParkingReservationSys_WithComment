<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>管理者用ログイン</title>
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
    <h1>管理者用ログイン</h1>
    <h2>ログイン</h2>
    <p>管理者専用のページです<br>
        ログインするには以下のアカウント名、パスワードを入力してください<br>
        
        <?php if($errors !== null): ?>
        <ul>
        <?php foreach($errors as $error ): ?>
            <li class="error"><?= $error ?></li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?> 
        
        <form action="admin_login_check.php" method="POST">
        アカウント名<br>
        <input type="text" name="account" placeholder="アカウント名(半角英数字)" style="width: 30%;"><br>
        パスワード<br>
        <input type="password" name="password" placeholder="パスワード(半角英数字)" style="width: 30%;"><br>
        <input type="checkbox" name="login_keep">次回からアカウント名の入力を省略する<br>

        <p id="submit_button"><input type="submit" value="ログイン"></p>

    <!--<p><a href="admin.php">（仮設：管理者ページトップ）</a></p>        -->
        
    </form>
        
    <!--<p>パスワードをお忘れの方</p>-->
    <!--<p><a href="user_create.php">新規ユーザー登録</a></p>-->
    
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