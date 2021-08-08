<?php
    //外部ファイルの読み込み
    require_once 'models/Reservation.php';
    require_once 'daos/DAO.php';
    //DAO(Database Access Object)
    class ReservationDAO extends DAO{
        //データベースから全予約登録情報を取得するメソッド
        public static function get_all_reservations(){
       // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行
                $stmt = $pdo->query('SELECT * FROM reservations');
                // Fetch ModeをReserveクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Reservation');
                // SELECT文の結果を Reserveクラスのインスタンス配列に格納。Fetch->抜き出せの意。
                $reservations = $stmt->fetchAll();
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー一覧、はいあげる
            return $reservations;     
        }
       //データーベースに新しい予約情報を登録するメソッド
        public static function insert($reservation){
            // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // 具体的な値はあいまいにしたまま INSERT文の実行準備
                $stmt = $pdo->prepare('INSERT INTO reservations(user_id, parking_id, start_date, start_time, end_date, end_time, email, tel, remarks) VALUES(:user_id, :parking_id, :start_date, :start_time, :end_date, :end_time, :email, :tel, :remarks)');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':user_id', $reservation->user_id, PDO::PARAM_INT);
                $stmt->bindValue(':parking_id', $reservation->parking_id, PDO::PARAM_STR);
                $stmt->bindValue(':start_date', $reservation->start_date, PDO::PARAM_STR);
                $stmt->bindValue(':start_time', $reservation->start_time, PDO::PARAM_STR);
                $stmt->bindValue(':end_date', $reservation->end_date, PDO::PARAM_STR);
                $stmt->bindValue(':end_time', $reservation->end_time, PDO::PARAM_STR);
                $stmt->bindValue(':email', $reservation->email, PDO::PARAM_STR);
                $stmt->bindValue(':tel', $reservation->tel, PDO::PARAM_STR);
                $stmt->bindValue(':remarks', $reservation->remarks, PDO::PARAM_STR);

                // INSERT文本番実行
                $stmt->execute();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
        }
        
        //id番目の予約登録情報を取得するメソッド
        public static function find($id){
          // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT * FROM reservations WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();                
                
                // Fetch ModeをResereveクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Reservation');
                // SELECT文の結果を Userクラスのインスタンスに格納。Fetch->抜き出せの意。
                $reservation = $stmt->fetch();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー、はいあげる
            return $reservation;             
        }

        //user_id番目のユーザーの予約登録情報を全て取得するメソッド
        public static function find2($user_id){
          // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT * FROM reservations WHERE user_id=:user_id order by start_date desc, start_time desc');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();                
                
                // Fetch ModeをResereveクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Reservation');
                // SELECT文の結果を Reserveクラスのインスタンスに格納。Fetch->抜き出せの意。
                $reservations = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成した予約情報、はいあげる
            return $reservations;             
        }

        //$start_dateの日付の$parking_idの駐車場の予約登録情報を全て取得するメソッド
        public static function find3($date, $parking_id){
          // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT * FROM reservations WHERE (start_date <= :date AND :date <= end_date) ANd parking_id=:parking_id');
                // $stmt = $pdo->prepare('SELECT * FROM reservations WHERE (start_date=:start_date OR end_date=:end_date) AND parking_id=:parking_id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':date', $date, PDO::PARAM_STR);
                // $stmt->bindValue(':end_date', $start_date, PDO::PARAM_STR);
                
                $stmt->bindValue(':parking_id', $parking_id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();                
                
                // Fetch ModeをResereveクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Reservation');
                // SELECT文の結果を Reserveクラスのインスタンスに格納。Fetch->抜き出せの意。
                $reservations = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成した予約情報、はいあげる
            return $reservations;             
        }
 
        //parking_id番目の駐車場の予約登録情報を降順で並び替えて全て取得するメソッド
        public static function find4($parking_id){
          // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT * FROM reservations WHERE parking_id=:parking_id order by start_date desc, start_time desc');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':parking_id', $parking_id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();                
                
                // Fetch ModeをResereveクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Reservation');
                // SELECT文の結果を Reserveクラスのインスタンスに格納。Fetch->抜き出せの意。
                $reservations = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成した予約情報、はいあげる
            return $reservations;             
        }

        //user_id番目のユーザーの予約登録情報を降順に並び替えて全て取得するメソッド
        public static function find5($user_id){
          // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT * FROM reservations WHERE user_id=:user_id order by start_date desc, start_time desc');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();                
                
                // Fetch ModeをResereveクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Reservation');
                // SELECT文の結果を Reserveクラスのインスタンスに格納。Fetch->抜き出せの意。
                $reservations = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成した予約情報、はいあげる
            return $reservations;             
        }
 
        //（※元find3の内容。現在は使用していない）$start_dateの日付の予約登録情報を全て取得するメソッド
        public static function find6($start_date){
          // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT * FROM reservations WHERE start_date=:start_date');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':start_date', $start_date, PDO::PARAM_STR);
                // SELECT文本番実行
                $stmt->execute();                
                
                // Fetch ModeをResereveクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Reservation');
                // SELECT文の結果を Reserveクラスのインスタンスに格納。Fetch->抜き出せの意。
                $reservations = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成した予約情報、はいあげる
            return $reservations;             
        }
        
        //20210615_by_shimaからコピーしたfind7。
        public static function find7($start_date, $start_time, $parking_id){
          // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT * FROM reservations WHERE start_date=:start_date AND parking_id=:parking_id AND start_time >= :start_time');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':start_date', $start_date, PDO::PARAM_STR);
                $stmt->bindValue(':start_time', $start_time, PDO::PARAM_STR);
                $stmt->bindValue(':parking_id', $parking_id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();                

                // Fetch ModeをResereveクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Reservation');
                // SELECT文の結果を Reserveクラスのインスタンスに格納。Fetch->抜き出せの意。
                $reservations = $stmt->fetchAll();

            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成した予約情報、はいあげる
            return $reservations;             
        }

     //parking_id番目の指定した月の駐車場の予約登録情報を全て取得して降順で表示するメソッド
        public static function find100($user_id, $now, $next){
          // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{

                // print $user_id  . '<br>';
                // print $now  . '<br>';
                // print $next  . '<br>';
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT * FROM reservations WHERE user_id=:user_id AND :now <= start_date AND start_date <= :next order by start_date desc, start_time desc');
                // print 1 . '<br>';
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
                // print 2 . '<br>';
                $stmt->bindValue(':now', $now, PDO::PARAM_STR);
                // print 3 . '<br>';
                $stmt->bindValue(':next', $next, PDO::PARAM_STR);
                // SELECT文本番実行
                // print 4 . '<br>';
                $stmt->execute();                
                // print 5 . '<br>';
                // Fetch ModeをResereveクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Reservation');
                // SELECT文の結果を Reserveクラスのインスタンスに格納。Fetch->抜き出せの意。
                // print 6;
                $reservations = $stmt->fetchAll();
                // var_dump($reservations);
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成した予約情報、はいあげる
            return $reservations;             
        }
        
        //$id番目のユーザー情報を更新
        public static function update($user, $id){
            // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // 具体的な値はあいまいにしたまま UPDATE文の実行準備
                $stmt = $pdo->prepare('UPDATE users SET name=:name, user_id=:user_id, email=:email, password=:password WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':name', $user->name, PDO::PARAM_STR);
                $stmt->bindValue(':user_id', $user->user_id, PDO::PARAM_STR);
                $stmt->bindValue(':email', $user->email, PDO::PARAM_STR);
                $stmt->bindValue(':password', $user->password, PDO::PARAM_STR);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                
                // UPDATE文本番実行
                $stmt->execute();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
        }
        
        //id番目のユーザーを削除
        public static function delete($id){
          // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // DELETE文実行準備
                $stmt = $pdo->prepare('DELETE FROM reservations WHERE id=:id');
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
                //データベースからキーワード検索するメソッド
        public static function search($keyword){
       // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT * FROM users WHERE name LIKE :name');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':name', '%' . $keyword . '%', PDO::PARAM_STR);
                // SELECT文本番実行
                $stmt->execute();                
                // Fetch ModeをUserクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'User');
                // SELECT文の結果を Userクラスのインスタンス配列に格納。Fetch->抜き出せの意。
                $users = $stmt->fetchAll();
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー一覧、はいあげる
            return $users;     
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