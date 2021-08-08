<?php
    //モデル（M）
    class Admin{
        //プロパティ
        public $id; //ID
        public $name; //名前
        public $account; //アカウント名
        public $password; //パスワード
        public $email; //メールアドレス
        public $created_at; //登録時間
        //コンストラクタ($nameから$name=''に変更。エラー対応で空文字を与えている)
        public function __construct($name='', $account='', $password='', $email=''){
            $this->name = $name;
            $this->account = $account;
            $this->password = $password;
            $this->email = $email;
        }
        //入力チェックをするメソッド
        public function validate(){
            //エラー情報を格納する配列作成
            $errors = array();
            //名前が入力されていなければ
            if($this->name === ''){
                $errors[] = '名前を入力してください';
            }
            //アカウント名が入力されていなければ
            if($this->account === ''){
                $errors[] = 'アカウント名を入力してください';
            }else if(AdminDAO::check_duplicate_account($this->account) === true){
                $errors[] = 'このアカウント名はすでに使用されています<br>別のアカウント名を入力してください';
            }
            //パスワードが入力されていなければ
            if($this->password === ''){
                $errors[] = 'パスワードを入力してください';
            }
            return $errors;
        }
    }