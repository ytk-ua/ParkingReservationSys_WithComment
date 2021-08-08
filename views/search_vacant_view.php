<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>駐車場空き状況確認</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        table, tr, th, td {
            border: solid 2px;
        } 
        table{
            width: 60%;
        }
    </style>
</head>
<body>

<!--ヘッダー-->
<header>
    <a href="index.php"><img src="images/logo.png" alt="Parking Reservation System" id="logo"></a>
    <div id="header_button">
    <ul>
        <li><a href="logout.php" class="user_logout">ログアウト</a></li>
        <li><a href="edit.php?id=<?= $login_user->id ?>" class="user_edit">登録情報編集</a></li>
    </ul>
    </div>
    <nav id="global_navi">
        <ul>
            <li><a href="top.php">HOME</a></li>
            <li class="current"><a href="search_vacant.php">空き状況確認</a></li>
            <li><a href="reservation_list.php?id=<?= $login_user->id ?>">予約確認</a></li>
            <li><a href="use_list.php?id=<?= $login_user->id ?>">利用実績確認</a></li>
        </ul>
    </nav>
</header>
<!--/ヘッダー-->

<!--メイン-->
<div id="main">    

    <h1>駐車場空き状況確認</h1>
    <h2>空き状況の一覧</h2>
    
    <?php if($flash_message !== null): ?>
    <p class="flash"><?= $flash_message ?></p>
    <?php endif; ?>
    
    <?php $today = date("Y年m月d日 H:i"); ?>
    <?php $today2 = date("Y-m-d"); ?>
    <P class="session">現在の日時：<?= $today ?></P>

    <?php if(strtotime($date . '-1 day') < strtotime($today2)): ?>
    <p><?= $date ?> >> <a href="search_vacant.php?date=<?= date("Y-m-d", strtotime($date . '+1 day')) ?>">翌日</a></P>
    <?php else: ?>
    <P><a href="search_vacant.php?date=<?= date("Y-m-d", strtotime($date . '-1 day')) ?>">前日</a> << 
    <?= $date ?> >> <a href="search_vacant.php?date=<?= date("Y-m-d", strtotime($date . '+1 day')) ?>">翌日</a></P>
    <?php endif; ?>

    <P> <a href="search_vacant.php?date=<?= date("Y-m-d", strtotime($date . '-1 day')) ?>">前日</a> << <?= $date ?> >> <a href="search_vacant.php?date=<?= date("Y-m-d", strtotime($date . '+1 day')) ?>">翌日</a>
    [※デモ用のため過去の予約可能（削除予定）]</p>

    <table>
        <tr>
            <th rowspan="2">予約時間帯</th>
            <th colspan="3">予約状況</th>
        </tr>
        <tr>
            <th>Park1</th>
            <th>Park2</th>
            <th>Park3</th>
        </tr>
    <?php for($hour = 0; $hour < 24; $hour++): ?>
        <tr>
            <td><?= $hour < 10  ? '0' . $hour . ':00' : $hour . ':00' ?> - <?= ($hour + 1) < 10  ? '0' . ($hour + 1) . ':00' : ($hour + 1) . ':00' ?></td>
            <td><?= get_reserve_user_name($reservations1, $date, $hour, 1)?></td>
            <td><?= get_reserve_user_name($reservations2, $date, $hour, 4)?></td>
            <td><?= get_reserve_user_name($reservations3, $date, $hour, 5)?></td>
        </tr>
    <?php endfor; ?>    
    </table>

    <!--<p><a href="top.php">マイページトップに戻る</a></p>-->
    <!--<p><a href="logout.php">ログアウト</a></p>-->

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