<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?= $parking->parking_name ?>の駐車場登録情報編集</title>
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

    <h1><?= $parking->parking_name ?>の駐車場登録情報編集</h1>
    <h2>駐車場登録情報編集フォーム</h2>

    <?php if($errors !== null): ?>
    <ul>
    <?php foreach($errors as $error ): ?>
        <li class="error"><?= $error ?></li>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    
    <form action="update_parking.php" method="POST">
        <dl>
           <dt>駐車場名<span class="must">※必須</span></dt>
            <dd><input type="text" id="parking_name" name="parking_name" value="<?= $parking->parking_name ?>"></dd>
            <dt>料金[30分]<span class="must">※必須</span></dt>
            <dd><input type="number" id="name" name="price" value="<?= $parking->price ?>"></dd>
            <dt>場所</dt>
            <dd><input type="text" id="address" name="address" value="<?= $parking->address ?>"></dd>
            <dt>サイズ</dt>
            <dd><input type="text" id="size" name="size" value="<?= $parking->size ?>"></dd>
            <dt>備考/連絡事項</dt>
            <dd><input type="text" id="remarks" name="remarks" value="<?= $parking->remarks ?>"></dd>
       </dl>
            <input type="hidden" name="id" value="<?= $parking->id ?>">
            <input type="reset" value="リセットする"><br>
            <input type="submit" value="更新">
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