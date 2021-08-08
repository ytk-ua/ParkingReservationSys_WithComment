<?php
    session_start();
    $flash_message = '';
    if($_SESSION['flash_message'] !== null){
        $flash_message = $_SESSION['flash_message'];
        $_SESSION['flash_message'] = null;
    }

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <title>お問い合わせフォーム</title>
    </head>
    <body>
        <div class="container">
            <div class="row mt-3">
                <h1 class="col-sm-12 text-center">お問い合わせフォーム</h1>
            </div>
            <div class="row">
                <h2 class="col-sm-12 text-center"><?= $flash_message ?></h2>
            </div>
            <form action="send.php" method="POST">
                <!-- 1行 -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">お名前</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <!-- 1行 -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">メールアドレス</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>
                <!-- 1行 -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">タイトル</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title">
                    </div>
                </div>
                
                <!-- 1行 -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">内容</label>
                    <div class="col-sm-10">
                        <textarea name="message" class="form-control"></textarea>
                    </div>
                </div>
                
                <!-- 1行 -->
                <div class="form-group row">
                    <div class="offset-2 col-10">
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
    </body>
</html>