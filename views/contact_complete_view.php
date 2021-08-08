<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせ内容登録</title>
    <style>
        table, tr, th, td {
            border: solid 2px;
        } 
    </style>    
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
            <li><a href="top.php">HOME</a></li>
            <li><a href = about.php>システム概要</a></li>
            <li><a href = guide.php>ご利用ガイド</a></li>
            <li class="current"><a href = contact.php>お問合せ</a></li>
        </ul>
    </nav>
</header>
<!--/ヘッダー-->

<!--メイン-->
<div id="main">
    <h1>お問い合わせ内容登録</h1>
    
    <?php if($flash_message !== null): ?>
        <p class="flash"><?= $flash_message ?></p>
    <?php endif; ?>
    
    <?php if($send_message !== null): ?>
        <p class="flash"><?= $send_message ?></p>
    <?php endif; ?>
    
    <?php if($errors !== null): ?>
    <ul>
    <?php foreach($errors as $error ): ?>
        <li class="error"><?= $error ?></li>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <table>
        <tr>
            <th>ユーザーID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>電話番号</th>
            <th>件名</th>
            <th>本文</th>
        </tr>
        <tr>
            <td align="center"><?= $contact->user_id ?></td>
            <td align="center"><?= $contact->name ?></td>
            <td align="center"><?= $contact->email ?></td>
            <td align="center"><?= $contact->tel ?></td>
            <td align="center"><?= $contact->subject ?></td>
            <td align="center"><?= $contact->body ?></td>
        </tr>
    </table>

    <!--<p><a href="">確認用メールを送る</a></p>-->
    <p><a href="top.php">トップページに戻る</a></p>

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