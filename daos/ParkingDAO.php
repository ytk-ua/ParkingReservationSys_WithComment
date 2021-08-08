<?php
    //外部ファイルの読み込み
    require_once 'models/Parking.php';
    require_once 'daos/DAO.php';
    //DAO(Database Access Object)
    class ParkingDAO extends DAO{
        //データベースから全ユーザー情報を取得するメソッド
        public static function get_all_parkings(){
       // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行
                $stmt = $pdo->query('SELECT * FROM parkings');
                // Fetch ModeをUserクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Parking');
                // SELECT文の結果を Userクラスのインスタンス配列に格納。Fetch->抜き出せの意。
                $parkings = $stmt->fetchAll();
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー一覧、はいあげる
            return $parkings;     
        }
       //データーベースに新しいユーザーを登録するメソッド
        public static function insert($parking){
            // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // 具体的な値はあいまいにしたまま INSERT文の実行準備
                $stmt = $pdo->prepare('INSERT INTO parkings(parking_name, price, address, size, remarks) VALUES(:parking_name, :price, :address, :size, :remarks)');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':parking_name', $parking->parking_name, PDO::PARAM_STR);
                $stmt->bindValue(':price', $parking->price, PDO::PARAM_INT);
                $stmt->bindValue(':address', $parking->address, PDO::PARAM_STR);
                $stmt->bindValue(':size', $parking->size, PDO::PARAM_STR);
                $stmt->bindValue(':remarks', $parking->remarks, PDO::PARAM_STR);
                
                // INSERT文本番実行
                $stmt->execute();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
        }
        
        //id番目のユーザーを取得するメソッド
        public static function find($id){
          // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT * FROM parkings WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();                
                
                // Fetch ModeをParkingクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Parking');
                // SELECT文の結果を Parkingクラスのインスタンスに格納。Fetch->抜き出せの意。
                $parking = $stmt->fetch();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したParking、はいあげる
            return $parking;             
        }
        
        //$id番目のユーザー情報を更新
        public static function update($parking, $id){
            // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // 具体的な値はあいまいにしたまま UPDATE文の実行準備
                $stmt = $pdo->prepare('UPDATE parkings SET parking_name=:parking_name, price=:price, address=:address, size=:size, remarks=:remarks WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':parking_name', $parking->parking_name, PDO::PARAM_STR);
                $stmt->bindValue(':price', $parking->price, PDO::PARAM_INT);
                $stmt->bindValue(':address', $parking->address, PDO::PARAM_STR);
                $stmt->bindValue(':size', $parking->size, PDO::PARAM_STR);
                $stmt->bindValue(':remarks', $parking->remarks, PDO::PARAM_STR);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                // UPDATE文本番実行
                $stmt->execute();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
        }
        
        //id番目の駐車場を削除
        public static function delete($id){
          // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // DELETE文実行準備
                $stmt = $pdo->prepare('DELETE FROM parkings WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                // DELETE文本番実行
                $stmt->execute();                
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
        }
        
        //データベースから"id"か”parking_name”のどちらかのキーワード検索するメソッド
        public static function search($keyword){
       // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT * FROM parkings WHERE parking_name LIKE :parking_name OR id LIKE :id ');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':parking_name', '%' . $keyword . '%', PDO::PARAM_STR);
                $stmt->bindValue(':id', '%' . $keyword . '%', PDO::PARAM_STR);
                // SELECT文本番実行
                $stmt->execute();                
                // Fetch ModeをUserクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Parking');
                // SELECT文の結果を Userクラスのインスタンス配列に格納。Fetch->抜き出せの意。
                $parkings = $stmt->fetchAll();
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー一覧、はいあげる
            return $parkings;     
        }
        
        //user_id, passwordをもらってその人をDBから探し出す
        public static function check($user_id, $password){
          // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT * FROM users WHERE user_id=:user_id AND password=:password');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
                $stmt->bindValue(':password', $password, PDO::PARAM_STR);
                // SELECT文本番実行
                $stmt->execute();                
                
                // Fetch ModeをUserクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'User');
                // SELECT文の結果を Userクラスのインスタンスに格納。Fetch->抜き出せの意。
                $user = $stmt->fetch();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー、はいあげる
            return $user;             
        }
        
    }