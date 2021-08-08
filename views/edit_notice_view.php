<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ID<?= $notice->id ?>番目の登録情報編集</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
    img{
        width:  80%;
    }
    </style>
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
<h1>ID<?= $notice->id ?>番目の登録情報編集</h1>
 
    <?php if($errors !== null): ?>
    <ul>
    <?php foreach($errors as $error ): ?>
        <li class="error"><?= $error ?></li>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>
 
    <form action="update_notice.php" method="POST" enctype="multipart/form-data">
         <dl>
            <dt>ID</dt>
            <dd><?= $notice->id ?></dd>
            <dt>登録日<span class="must">※必須</span></dt>
            <dd><input type="date" id="name" name="regist_date" value="<?= $notice->regist_date ?>"></dd>
            <dt>タイトル<span class="must">※必須</span></dt>
            <dd><input type="text" id="title" name="title" value="<?= $notice->title ?>"></dd>
            <dt>概要<span class="must">※必須</span></dt>
            <dd><input type="text" id="overview" name="overview" value="<?= $notice->overview ?>"></dd>
            <dt>リンクURL</dt>
            <dd><input type="text" id="link_url" name="link_url" value="<?= $notice->link_url ?>"></dd>
            <dt>登録済み画像</dt>
            <dd><img src="upload/<?= $notice->image ?>"></dd>
            <dt>画像選択</dt>
            <dd><input type="file" name="image" value="<?= $notice->image ?>"></dd>
            <input type="hidden" name="id" value="<?= $notice->id ?>">
        </dl>
            <input type="reset" value="リセットする"><br>
            <input type="submit" value="登録">
    </form>
    
    <p><a href="admin_notice.php">キャンセル</a></p>
    
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