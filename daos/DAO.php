<?php
    class DAO {
                //データベースに接続するメソッド
        protected static function get_connection(){
        // 接続オプション設定
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            );
            // データベース(rsv_sys)を操作する万能の神様誕生(PDO:PHP Database Object)
            // $pdo = new PDO('mysql:host=mysql1.php.xdomain.ne.jp;dbname=xd038993_rsv', 'xd038993_rsv', 'xfreeyuta0914', $options);
            $pdo = new PDO('mysql:host=localhost;dbname=rsv_sys', 'root', '', $options);
            // 神様、はいあげる
            return $pdo;
        }
        //データベースを切断するメソッド
        protected static function close_connection($pdo, $stmt){
            $pdo = null;
            $stmt = null;
        }
    }