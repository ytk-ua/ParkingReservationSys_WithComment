<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="css/style.css">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        textarea {
            width: 200px;
            height: 200px;
        }
    </style>
    </head>
<body>
            <div class="container">
            <div class="row mt-3">
                <h1 class="col-sm-12 text-center">お問い合わせフォーム</h1>
                <p class="col-sm-12 text-center">以下のフォームからお問い合わせください。</p>
            </div>

            <?php if($errors !== null): ?>
            <ul>
            <?php foreach($errors as $error ): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
            </ul>
            <?php endif; ?>
    
            <div class="row">
                <h2 class="col-sm-12 text-center"><?= $flash_message ?></h2>
            </div>
            <form action="contact_complete.php" method="POST">
            <?php if($login_user !== null): ?>
                お名前：<?= $login_user->name ?><br>
                Email：<?= $login_user->email ?><br>
                お電話番号：<?= $login_user->tel ?><br>
            <?php else: ?>
                <!-- 1行 -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">お名前（必須）</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="<?= $contact->name ?>" placeholder="氏名">
                    </div>
                </div>
                <!-- 1行 -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email（必須）</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="<?= $contact->email ?>" placeholder="Emailアドレス">
                    </div>
                </div>
                <!-- 1行 -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">お電話番号（半角英数字”-"(ハイフン)不要）</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tel" value="<?= $contact->tel ?>" placeholder="お電話番号（半角英数字でご入力ください）">
                    </div>
                </div>
                <?php endif; ?>
                <!-- 1行 -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">件名（必須）</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="subject"  value="<?= $contact->subject ?>" placeholder="件名">
                    </div>
                </div>
                <!-- 1行 -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">お問い合わせ内容（必須）</label>
                    <div class="col-sm-10">
                        <!--<textarea name="body" class="form-control" placeholder="お問い合わせ内容をお書きください"></textarea>-->
                        <input type="body" class="form-control"  name="body" value="<?= $contact->body ?>" placeholder="お問い合わせ内容をお書きください">
                    </div>
                </div>
                <!-- 1行 -->
                    <div class="form-group row">
                    <div class="offset-2 col-10">
                    <input type="hidden" name="id" value="<?= $login_user->id ?>">
                    <input type="reset" value="リセット"><br>
                        <button type="submit" class="btn btn-primary">送信</button>
                    </div>
                </div>
            </form>
        </div>
        

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS, then Font Awesome -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    
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
    
    
    <p><a href="top.php">トップページに戻る</a></p>
</body>
</html>
