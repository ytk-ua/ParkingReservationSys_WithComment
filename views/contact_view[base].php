<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="style.css">
    <style>
        textarea {
            width: 200px;
            height: 200px;
        }
    </style>
    </head>
<body>
    <h1>お問い合わせフォーム</h1>
    <p>以下のフォームからお問い合わせください。</p>
    
    <p><a href="email/form.php">メール送信フォーム</a></p>
    
    <form action="contact_complete.php" method="POST">
        <?php if($login_user !== null): ?>
            お名前：<?= $login_user->name ?><br>
            Email：<?= $login_user->email ?><br>
            お電話番号：<?= $login_user->tel ?><br>
        <?php else: ?>
            お名前（必須）<br>
            <input type="text" name="name" placeholder="氏名"><br>
            Email（必須）<br>
            <input type="email" name="email" placeholder="Emailアドレス"><br>
            Email（確認用必須）<br>
            <input type="email" name="email_chedck" placeholder="Emailアドレス(確認のためもう一度後入力ください)"><br>
            お電話番号（半角英数字”-"(ハイフン)不要）<br>
            <input type="text" name="tel" placeholder="お電話番号（半角英数字でご入力ください）"><br>
        <?php endif; ?>
            件名（必須）<br>
            <input type="text" name="subject" placeholder="件名"><br>
            お問い合わせ内容（必須）<br>
            <textarea name="body" placeholder="お問い合わせ内容（１０００字まで）をお書きください"></textarea><br>
            <input type="hidden" name="id" value="<?= $login_user->id ?>">
            <input type="reset" value="リセット"><br>
            <input type="submit" value="送信">
    </form>
    
    
    <p><a href="top.php">トップページに戻る</a></p>
</body>
</html>
