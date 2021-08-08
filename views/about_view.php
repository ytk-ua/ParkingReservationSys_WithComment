<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>システム概要</title>
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
            <li class="current"><a href = about.php>システム概要</a></li>
            <li><a href = guide.php>ご利用ガイド</a></li>
            <li><a href = contact.php>お問合せ</a></li>
        </ul>
    </nav>
</header>
<!--/ヘッダー-->

<!--メイン-->
<div id="main">
    <h1>システム概要</h1>

    <h2>マンション駐車場利用予約システムとは？</h2>
    <ul>
    <li>マンションの住人の方のための駐車場予約システムです</li>
    <li>事前予約によりご希望の時間の駐車場の利用が可能です</li>
    <li>基本料金は不要ですが、利用時間に応じたご利用料金が発生いたします</li>
    <li>ご利用料金の清算は毎月の管理費と合わせて銀行口座から引き落としになります</li>
    <li>ご利用の際にはユーザー登録（初回のみ）が必要です</li>
    <li><a href = guide.php>ご利用ガイド</a>から利用方法/ルールをご確認ください</li>
    <li>ご不明な点がありましたら<a href = contact.php>お問合せ</a>フォームもご利用ください</li>
    </ul>
    
    <!--<ul>-->
    <!--    <li><a href = about.php>システム概要</a></li>-->
    <!--    <li><a href = guide.php>ご利用ガイド</a></li>-->
    <!--    <li><a href = contact.php>お問合せ</a></li>-->
    <!--</ul>-->
    
    <!--<p><a href="top.php">トップページに戻る</a></p>-->
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