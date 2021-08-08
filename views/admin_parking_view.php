<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>駐車場管理</title>
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
            <li class="current"><a href="admin_parking.php">駐車場管理</a></li>
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

    <h1>駐車場管理</h1>

    <?php if($flash_message !== null): ?>
    <p class="flash"><?= $flash_message ?></p>
    <?php endif; ?>
    
    <h2>新規駐車場登録</h2>
    <p>新規駐車場の追加は以下から登録ください</p>
    <p><a href="parking_create.php">新規駐車場登録</a></p>


    <h2>駐車場一覧</h2>
    
    <p>
        <form action="search_parking.php">
        駐車場ID or 駐車場名を入力し検索してください<br>
            <input type="search" name="parking_id" placeholder="検索項目入力" style="width: 20%;">
            <button type="submit">検索</button>
        </form>
    </p>
    
    <p>現在登録されている駐車場の一覧です</p>    
    
    <?php if(count($parkings) === 0): ?>
    <p>登録された駐車場はありません</p>
    <?php else: ?>
    <table>
    <tr>
        <th>ID</th>
        <th>駐車場名</th>
        <th>料金</th>
        <th>場所</th>
        <th>サイズ</th>
        <th>備考/連絡事項</th>
    </tr>
    <?php foreach($parkings as $parking): ?>
    <tr>
        <td><a href="show_parking.php?id=<?= $parking->id ?>"><?= $parking->id ?></td>
        <td><?= $parking->parking_name ?></td>
        <td><?= $parking->price ?>円/60分</td>
        <td><?= $parking->address ?></td>
        <td><?= $parking->size ?></td>
        <td><?= $parking->remarks ?></td>
    </tr>
    <?php endforeach; ?>
    </table>
    <?php endif; ?>

    <!--<ul>-->
    <!--    <li>ID:<a href="show_parking.php?id=<?= $parking->id ?>"><?= $parking->id ?></a></li>-->
    <!--    <li>駐車場名：<?= $parking->parking_name ?></li>-->
    <!--    <li>料金：<?= $parking->price ?>円/30分</li>-->
    <!--    <li>場所：<?= $parking->address ?></li>-->
    <!--</ul>-->
    <!--<div id="map"></div>-->

    <!--<p><a href="admin.php">管理者ページトップ</a></p>-->
    <!--<p><a href="index.php">ログアウト</a></p>-->

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