<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?= $login_user->name ?>さんの予約情報</title>
    <link rel="stylesheet" href="css/style.css">
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
            <li><a href="search_vacant.php">空き状況確認</a></li>
            <li class="current"><a href="reservation_list.php?id=<?= $login_user->id ?>">予約確認</a></li>
            <li><a href="use_list.php?id=<?= $login_user->id ?>">利用実績確認</a></li>
        </ul>
    </nav>
</header>
<!--/ヘッダー-->

<!--メイン-->
<div id="main">    

    <h1><?= $login_user->name ?>さんの予約確認</h1>
    <h2>予約登録の一覧</h2>
    
    <?php if($flash_message !== null): ?>
    <p class="flash"><?= $flash_message ?></p>
    <?php endif; ?>


    <?php if(count($reservations) === 0): ?>
    <p>予約登録情報はありません</p>
    <?php else: ?>
       <table>
            <tr>
                <th>ID</th>
                <th>ユーザーID</th>
                <th>駐車場名</th>
                <th>予約開始日</th>
                <th>予約開始時間</th>
                <th>予約終了日</th>
                <th>予約終了時間</th>
                <th>メールアドレス</th>
                <th>電話番号</th>
                <th>備考/連絡事項</th>
                <th>削除</th>
            </tr>
    <?php foreach($reservations as $reservation): ?>
    <?php $parking = ParkingDAO::find($reservation->parking_id) ?>

            <tr>
                <td><a href="show_reservation.php?id=<?= $reservation->id ?>"><?= $reservation->id ?></a></td>
                <td><?= $reservation->user_id ?></td>
                <td><?= $parking->parking_name ?></td>
                <td><?= $reservation->start_date ?></td>
                <td><?= substr($reservation->start_time, 0, 5) ?></td>
                <td><?= $reservation->end_date ?></td>
                <td><?= substr($reservation->end_time, 0, 5) ?></td>
                <td><?= $reservation->email ?></td>
                <td><?= $reservation->tel ?></td>
                <td><?= $reservation->remarks ?></td>
                <td>
                    <form action="delete_reservation.php" method="POST">
                    <input type="hidden" name="id" value="<?= $reservation->id ?>">
                    <input type="hidden" name="user_id" value="<?= $reservation->user_id ?>">
                    <input type="hidden" name="parking_id" value="<?= $reservation->parking_id ?>">
                    <button type="submit">削除</button>
                    </form>
                </td>
            </tr>
        <!--編集しなくても一度予約削除でも可能なので、今回は編集機能をOFFにしておく。-->
        <!--<p><a href="edit_reservation.php?id=<?= $reservation->id ?>">編集</a></p>-->
    <?php endforeach; ?>
    </table>    
    <?php endif; ?>

<!--    <p><a href="top.php">マイページトップに戻る</a></p>-->
<!--    <p><a href="logout.php">ログアウト</a></p>-->

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