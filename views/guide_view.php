<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ご利用ガイド</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        table, tr, th, td {
            border: solid 2px;
        } 
        table{
            width: 80%;
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
            <li class="current"><a href = guide.php>ご利用ガイド</a></li>
            <li><a href = contact.php>お問合せ</a></li>
        </ul>
    </nav>
</header>
<!--/ヘッダー-->

<!--メイン-->
<div id="main">
    <h1>ご利用ガイド[利用方法/ルール]</h1>
    <h2>駐車場予約システムの利用方法</h2>
    <h3>1.新規ユーザー登録</h3>
    <p>最初にご自身の情報を登録していただくために、新規ユーザー登録が必要です<br>
    <a href="user_create.php">新規ユーザー登録</a></p>

    <h3>2.予約登録</h3>
    <p>ユーザー登録後、マイページが作成されます<br>
       ログイン後、マイページにて駐車場の予約が可能です<br>
       予約の変更は利用開始時間の10分前まで可能です<br>
      <a href="login.php">ログインページ</a></p>
          
    <h3>3.駐車場情報</h3>
    <p>現在、ご利用いただける駐車場の情報です</p>
    <table id="park">
        <tr>
            <th>駐車場名</th>
            <th>料金</th>
            <th>場所</th>
            <th>サイズ</th>
            <th>備考/連絡事項</th>
        </tr>
    <?php foreach($parkings as $parking): ?>
        <tr>
            <td><?= $parking->parking_name ?></td>
            <td><?= $parking->price ?>円/60分</td>
            <td><?= $parking->address ?></td>
            <td><?= $parking->size ?></td>
            <td><?= $parking->remarks ?></td>
        </tr>
    <?php endforeach; ?>
    </table><br>

    <h3>4.利用</h3>
    <p>予約が確定したら、当日はそのままご利用いただけます(当日の手続きは不要です)<br>
       予約いただい時間は自由に駐車場の出し入れが可能です<br>
       利用開始後の利用時間延長はできませんので、予約システムで新たに予約の追加をお願いいたします</p>

    <h2>ご利用にあたってのお願い</h2>
    <h3>利用ルール/マナー</h3>
    <p>予約時間を過ぎての無断駐車は他の方のご迷惑になりますのでおやめください<br>
       過度な事前予約は他の方の予約ができなくなるためご注意ください<br>
       過度な事前予約とキャンセルが多すぎる方にはご利用に制限がかかる可能性がございます<br>
       利用後はゴミなどを放置しないようにお願いします<br>
       
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