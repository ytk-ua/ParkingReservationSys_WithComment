<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規駐車場登録</title>
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

    <h1>新規駐車場登録</h1>
    <h2>新規駐車場登録フォーム</h2>
 
     <?php if($errors !== null): ?>
    <ul>
    <?php foreach($errors as $error ): ?>
        <li class="error"><?= $error ?></li>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    
    <form action="parking_store.php" method="POST">
        <dl>
            <dt>駐車場名<span class="must">※必須</span></dt>
            <dd><input type="text" id="parking_name" name="parking_name" placeholder="駐車場名"></dd>
            <dt>料金[60分]<span class="must">※必須</span></dt>
            <dd><input type="number" id="price" name="price" placeholder="駐車場料金(30分毎の利用料金)"></dd>
            <dt>場所</dt>
            <dd><input type="text" id="address" name="address" placeholder="駐車場所在地"></dd>
            <dt>サイズ</dt>
            <dd><input type="text" id="size" name="size" placeholder="駐車場サイズ"></dd>
            <dt>備考/連絡事項</dt>
            <dd><input type="text" id="remarks" name="remarks" placeholder="備考/連絡事項があればご記入ください"></dd>
        </dl>
            <input type="reset" value="リセットする"><br>
            <input type="submit" value="登録">
    </form>
    <p><a href="admin_parking.php">キャンセル</a></p>

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