<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>予約登録</title>

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
            <li><a href="reservation_list.php?id=<?= $login_user->id ?>">予約確認</a></li>
            <li><a href="use_list.php?id=<?= $login_user->id ?>">利用実績確認</a></li>
        </ul>
    </nav>
</header>
<!--/ヘッダー-->

<!--メイン-->
<div id="main">    
<h1>予約登録</h1>
<h2>駐車場予約登録画面</h2>
    <p class="session"><?= $login_user->name ?>さん、ご希望の予約を登録ください</p>

    <form action="reservation_store.php" method="POST">
    <dl>
        <dt>開始日時[自動入力]</dt>
        <dd><input type="date" name="start_date"  value="<?= $start_date ?>" readonly><input type="time" name="start_time" step="1800" value="<?= $start_time ?>" readonly></dd>
        <!--開始日時： <?= $start_date ?> / <?= $start_time ?><br>-->
        <!--終了日時： <input type="date" name="end_date" value="<?= $start_date ?>" readonly><input type="time" name="end_time" step="1800" min="<?= $start_time ?>" value="<?= $start_time ?>"><br>-->
        <input type="hidden" name="end_date" value="<?= $start_date ?>">
        <dt>終了時間(選択)<span class="must">※必須</span></dt> 
        <dd>
        <select name="end_time">
            <?php for($i = $start + 1; $i <= $limit + 1; $i++): ?>
            <option value="<?= ($i < 10) ? ('0' . $i . ':00:00') : ($i . ':00:00') ?>"><?= ($i < 10) ? ('0' . $i . ':00') : ($i . ':00') ?></option>
            <?php endfor; ?>
        </select>
        </dd>
        <!--利用駐車場番号： <select name= "parking_mul">-->
        <!--    <option value = "">選択してください</option>-->
        <!--    <option value = "park1">No.1</option>-->
        <!--    <option value = "park2">No.2</option>-->
        <!--    <option value = "park3">No.3</option>-->
        <!--    </select><br>-->
        <dt>利用駐車場名[自動入力]</dt>
        <dd>
        <select name= "parking_id">
        <?php if(count($parkings) === 0): ?>
        <p>登録された駐車場はありません</p>
        <?php else: ?>
        <?php foreach($parkings as $parking): ?>
        <?php if($parking_id === $parking->id): ?>
        <option value = "<?= $parking->id ?>"><?= $parking->parking_name ?></option>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
        </select>
        </dd>
        <dt>メールアドレス</dt>
        <dd><input type="email" name="email" value="<?= $login_user->email ?>"></dd>
        <dt>電話番号</dt>
        <dd><input type="tel" name="tel" value="<?= $login_user->tel ?>"></dd>
        <dt>備考/連絡事項</dt>
        <dd><input type="text" name="remarks"></dd>
    </dl>
        <input type="hidden" name="id" value="<?= $login_user->id ?>">
        <input type="reset" value="リセット"><br>
        <input type="submit" value="予約登録">
    </form>

    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">前のページに戻る</a>
    <!--<p><a href="top.php">マイページトップに戻る</a></p>-->

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