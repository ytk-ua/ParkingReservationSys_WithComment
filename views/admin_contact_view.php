<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>問い合わせ管理</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /*table, tr, th, td {*/
        .contact_body, .contact_subject{
            text-align: left;
            /*border: solid 2px;*/
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
            <li class="current"><a href="admin_contact.php">問合せ管理</a></li>
        </ul>
    </nav>
</header>
<!--/ヘッダー-->

<!--メイン-->
<div id="main">    
    <h1>問い合わせ管理</h1>
    <h2>問い合わせ一覧(新着順表示)</h2>
    <p>＜備考＞ユーザーIDの表記 『０：未ログインユーザーからの問合せ』、『−９９９：管理者からの返信』</p>
 
    <?php if($flash_message !== null): ?>
    <p class="flash"><?= $flash_message ?></p>
    <?php endif; ?>
    
    <!--<p>-->
    <!--    <form action="search_parking.php">-->
    <!--        <input type="search" name="parking_id">-->
    <!--        <button type="submit">検索</button>-->
    <!--    </form>-->
    <!--</p>-->

    <?php if(count($contacts) === 0): ?>
    <p>登録された問い合わせはありません</p>
    <?php else: ?>
    <table>
        <tr>
            <th>ID</th>
            <th>ユーザーID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>電話番号</th>
            <th>件名</th>
            <th>本文</th>
            <th>返信</th>
            <th>削除</th>
        </tr>
    <?php foreach($contacts as $contact): ?>
        <tr>
            <td><?= $contact->id ?></td>
            <td><?= $contact->user_id ?></td>
            <td><?= $contact->name ?></td>
            <td><?= $contact->email ?></td>
            <td><?= $contact->tel ?></td>
            <td class="contact_subject"><?= $contact->subject ?></td>
            <td class="contact_body"><?= $contact->body ?></td>
            <td><a href="admin_contact_res.php?id=<?= $contact->id ?>">返信</a></p>
            <td><a href="delete_contact.php?id=<?= $contact->id ?>">削除</a></p>
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