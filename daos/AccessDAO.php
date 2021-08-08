<?php
    //外部ファイルの読み込み
    require_once 'models/Access.php';
    require_once 'daos/DAO.php';
    //DAO(Database Access Object)
    class AccessDAO extends DAO{
        
        //データベースから全ユーザー情報を取得するメソッド
        public static function get_all_accesses(){
       // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行
                $stmt = $pdo->query('SELECT * FROM accesses');
                // Fetch ModeをUserクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Access');
                // SELECT文の結果を Userクラスのインスタンス配列に格納。Fetch->抜き出せの意。
                $accesses = $stmt->fetchAll();
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー一覧、はいあげる
            return $accesses;     
        }
       //データーベースに新しいアクセスを登録するメソッド
        public static function insert($access){
            // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // 具体的な値はあいまいにしたまま INSERT文の実行準備
                $stmt = $pdo->prepare('INSERT INTO accesses(name, visited_time, url) VALUES(:name, :visited_time, :url)');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':name', $access->name, PDO::PARAM_STR);
                $stmt->bindValue(':visited_time', $access->visited_time, PDO::PARAM_STR);
                $stmt->bindValue(':url', $access->url, PDO::PARAM_STR);

                // INSERT文本番実行
                $stmt->execute();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
        }
        
        //id番目のユーザーを取得するメソッド
        public static function find($name){
          // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT * FROM accesses WHERE name=:name ORDER BY id DESC');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                // SELECT文本番実行
                $stmt->execute();                
                
                // Fetch ModeをUserクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Access');
                // SELECT文の結果を Userクラスのインスタンスに格納。Fetch->抜き出せの意。
                $user_accesses = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー、はいあげる
            return $user_accesses;             
        }

        //id番目のユーザーを取得するメソッド
        public static function find2($name){
          // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT count(*) FROM accesses WHERE name=:name');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                // SELECT文本番実行
                $stmt->execute();                
                
                // Fetch ModeをUserクラスに設定。マッピング。PHPで使いやすい様に書き換える。
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Access');
                // SELECT文の結果を Userクラスのインスタンスに格納。Fetch->抜き出せの意。
                $access = $stmt->fetch();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー、はいあげる
            return $access;             
        }
        
    //id番目のユーザーを取得するメソッド
        public static function find3($name){
          // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
             
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT count(*) AS count FROM accesses WHERE name=:name');
                
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                
                // SELECT文本番実行
                $stmt->execute();                
                
                // Fetch Modeを連想配列に指定
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                
                
                // SELECT文の結果を 取得
                $result = $stmt->fetch();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // アクセス数、はいあげる
            return $result['count'];             
        }    
        
        //$id番目のユーザー情報を更新
        public static function update($user, $id){
            // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // 具体的な値はあいまいにしたまま UPDATE文の実行準備
                $stmt = $pdo->prepare('UPDATE users SET name=:name, room_no=:room_no, account=:account, password=:password, email=:email, tel=:tel WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':name', $user->name, PDO::PARAM_STR);
                $stmt->bindValue(':room_no', $user->room_no, PDO::PARAM_INT);
                $stmt->bindValue(':account', $user->account, PDO::PARAM_STR);
                $stmt->bindValue(':password', $user->password, PDO::PARAM_STR);
                $stmt->bindValue(':email', $user->email, PDO::PARAM_STR);
                $stmt->bindValue(':tel', $user->tel, PDO::PARAM_STR);
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
                $stmt = $pdo->prepare('DELETE FROM users WHERE id=:id');
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
        public static function check($account, $password){
          // 例外処理:tryブロック。try chatch最後はcatchで終わる。
            try{
                // データベースに接続して万能の神様誕生。
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT * FROM users WHERE account=:account AND password=:password');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':account', $account, PDO::PARAM_STR);
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