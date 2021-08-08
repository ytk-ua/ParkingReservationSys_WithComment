<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー管理</title>
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
            <li class="current"><a href="admin_user.php">ユーザー管理</a></li>
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

    <h1>ユーザー管理</h1>

    <!--<h2>新規ユーザー登録</h2>-->
    <!--<p>新規ユーザーの追加は以下から登録ください</p>-->
    <!--<p><a href="user_create.php">新規ユーザー登録</a></p>-->

    <h2>登録ユーザー一覧</h2>
    
    <?php if($flash_message !== null): ?>
    <p class="flash"><?= $flash_message ?></p>
    <?php endif; ?>
    
    <p>
        ユーザーの名前を入力し検索してください
            <form action="search_user.php">
                <input type="search" name="name" placeholder="検索項目入力" style="width: 20%;">
            <button type="submit">検索</button>
        </form>
    </p>
    <br>
    
    <p>現在登録されているユーザーの一覧です</p>    
    
    <?php if(count($users) === 0): ?>
    <p>ユーザーは誰もいません</p>
    <?php else: ?>
    <table>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>部屋番号</th>
            <th>アカウント名</th>
            <!--<th>パスワード</th>-->
            <th>メールアドレス</th>
            <th>アクセスログ</th>
            <!--<th>電話番号</th>-->
        </tr>
    <?php foreach($users as $user): ?>
        <tr>
            <td><a href="show.php?id=<?= $user->id ?>"><?= $user->id ?></a></td>
            <td><?= $user->name ?></td>
            <td><?= $user->room_no ?></td>
            <td><?= $user->account ?></td>
            <!--<td><?= $user->password ?></td>-->
            <td><?= $user->email ?></td>
            <td><a href="user_access.php?id=<?= $user->id ?>">アクセスログ</a></td>
            <!--<td><?= $user->tel ?></td>-->
        </tr>
    <?php endforeach; ?>
    </table>
    <?php endif; ?>
    
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