<?php
    require_once 'daos/UserDAO.php';
    //モデル（M）
    class User{
        //プロパティ
        public $id; //ID
        public $name; //名前
        public $room_no; //部屋番号
        public $account; //アカウント名
        public $password; //パスワード
        public $email; //メールアドレス
        public $tel; //電話番号
        public $created_at; //登録時間
        //コンストラクタ($nameから$name=''に変更。エラー対応で空文字を与えている)
        public function __construct($name='', $room_no='', $account='', $password='', $email='', $tel=''){
            $this->name = $name;
            $this->room_no = $room_no;
            $this->account = $account;
            $this->password = $password;
            $this->email = $email;
            $this->tel = $tel;
        }
        //入力チェックをするメソッド
        public function validate(){
            //エラー情報を格納する配列作成
            $errors = array();
            //名前が入力されていなければ
            if($this->name === ''){
                $errors[] = '名前を入力してください';
            }
            //部屋番号が入力されていなければ
            if($this->room_no === ''){
                $errors[] = '部屋番号を入力してください';
            // }else if(!preg_match('/^[0-9]+$/', $this->age)){ //０以上の整数でないならば
            //     $errors[] = '年齢は０以上の正数を入力してください';
            }
            //アカウント名が入力されていなければ
            if($this->account === ''){
                $errors[] = 'アカウント名を入力してください';
            }else if(UserDAO::check_duplicate_account($this->account) === true){
                $errors[] = 'このアカウント名はすでに使用されています<br>別のアカウント名を入力してください';
            }
            // if(empty($this->account)){
            //     $errors[] = 'アカウント名を入力してください';
            // }
            //パスワードが入力されていなければ
            if($this->password === ''){
                $errors[] = 'パスワードを入力してください';
            }
            // if($this->password === ''){
            //     $errors[] = 'パスワードを入力してください';
            // }elseif(!preg_match('[0-9]{8,}', $this->password)){
            //     $errors[] = 'パスワードは数字８文字以上で入力して下さい';
            // }
            //電話番号の正規表現チェック
            // if(!preg_match('/^[0-9]+$/', $this->tel)){ //０以上の整数でないならば
            //     $errors[] = '電話番号は０以上の正数を入力してください';
            // }
            
            return $errors;
        }
        
    }