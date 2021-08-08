<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="css/style.css">
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
            <li><a href = guide.php>ご利用ガイド</a></li>
            <li class="current"><a href = contact.php>お問合せ</a></li>
        </ul>
    </nav>
</header>
<!--/ヘッダー-->

<!--メイン-->
<div id="main">
    <h1>お問い合わせ</h1>
    <h2>お問い合わせ入力フォーム</h2>
    <p>以下のフォームからお問い合わせください。</p>

        <?php if($errors !== null): ?>
        <ul>
        <?php foreach($errors as $error ): ?>
        <li class="error"><?= $error ?></li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    
        <p class="flash"><?= $flash_message ?></p>
        
        <form action="contact_complete.php" method="POST">
        <?php if($login_user !== null): ?>
        <dl>
            <dt>お名前</dt>
            <dd><?= $login_user->name ?></dd>
            <dt>Email</dt>
            <dd><?= $login_user->email ?></dd>
            <dt>お電話番号</dt>
            <dd><?= $login_user->tel ?></dd>
            <dt>件名<span class="must">※必須</span></dt>
            <dd><input type="text" name="subject" value="<?= $contact->subject ?>" placeholder="件名" style="width: 80%;"></dd>
            <dt>お問い合わせ内容<span class="must">※必須</span></dt>
            <dd><textarea id="body" name="body" value="<?= $contact->body ?>" placeholder="お問い合わせ内容をお書きください" style="width: 80%;"></textarea></dd> 
        </dl>            
        <?php else: ?>
        <dl>
            <dt>お名前<span class="must">※必須</span></dt>
            <dd><input type="text" name="name" value="<?= $contact->name ?>" placeholder="氏名" style="width: 80%;"></dd>
            <dt>Email<span class="must">※必須</span></dt>
            <dd><input type="email" name="email" value="<?= $contact->email ?>" placeholder="Emailアドレス" style="width: 80%;"></dd>
            <dt>お電話番号<span class="must">※必須</span></dt>
            <dd><input type="text" name="tel" value="<?= $contact->tel ?>" placeholder="お電話番号（半角英数字-(ハイフン)不要)" style="width: 80%;"></dd>
            <dt>件名<span class="must">※必須</span></dt>
            <dd><input type="text" name="subject" value="<?= $contact->subject ?>" placeholder="件名" style="width: 80%;"></dd>
            <dt>お問い合わせ内容<span class="must">※必須</span></dt>
            <dd><textarea id="body" name="body" value="<?= $contact->body ?>" placeholder="お問い合わせ内容をお書きください" style="width: 80%;"></textarea></dd> 
        </dl>
        <?php endif; ?>
            <input type="hidden" name="id" value="<?= $login_user->id ?>">
            <input type="reset" value="リセット"><br>
            <button type="submit" class="btn btn-primary">送信</button>
        </form>

    <!--<h1>お問い合わせフォーム</h1>-->
    <!--<p>以下のフォームからお問い合わせください。</p>-->
    
    <!--<form action="contact_complete.php" method="POST">-->
    <!--    <?php if($login_user !== null): ?>-->
    <!--        お名前：<?= $login_user->name ?><br>-->
    <!--        Email：<?= $login_user->email ?><br>-->
    <!--        お電話番号：<?= $login_user->tel ?><br>-->
    <!--    <?php else: ?>-->
    <!--        お名前（必須）<br>-->
    <!--        <input type="text" name="name" placeholder="氏名"><br>-->
    <!--        Email（必須）<br>-->
    <!--        <input type="email" name="email" placeholder="Emailアドレス"><br>-->
    <!--        Email（確認用必須）<br>-->
    <!--        <input type="email" name="email_chedck" placeholder="Emailアドレス(確認のためもう一度後入力ください)"><br>-->
    <!--        お電話番号（半角英数字”-"(ハイフン)不要）<br>-->
    <!--        <input type="text" name="tel" placeholder="お電話番号（半角英数字でご入力ください）"><br>-->
    <!--    <?php endif; ?>-->
    <!--        件名（必須）<br>-->
    <!--        <input type="text" name="subject" placeholder="件名"><br>-->
    <!--        お問い合わせ内容（必須）<br>-->
    <!--        <textarea name="body" placeholder="お問い合わせ内容（１０００字まで）をお書きください"></textarea><br>-->
    <!--        <input type="hidden" name="id" value="<?= $login_user->id ?>">-->
    <!--        <input type="reset" value="リセット"><br>-->
    <!--        <input type="submit" value="送信">-->
    <!--</form>-->
    <br>
    <p><a href="top.php">トップページに戻る</a></p>

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
