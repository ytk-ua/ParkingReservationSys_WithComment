<?php
    //モデル（M）
    class Contact{
        //プロパティ
        public $id; //ID
        public $user_id; //ユーザーID
        public $name; //名前
        public $email; //メールアドレス
        public $email_check; //メールアドレス（確認用）
        public $tel; //電話番号
        public $subject; //件名
        public $body; //本文
        public $created_at; //登録時間
        //コンストラクタ($nameから$name=''に変更。エラー対応で空文字を与えている)
        public function __construct($user_id='', $name='', $email='', $tel='', $subject='', $body=''){
            $this->user_id = $user_id;
            $this->name = $name;
            $this->email = $email;
            $this->tel = $tel;
            $this->subject = $subject;
            $this->body = $body;
        }
        //入力チェックをするメソッド
        public function validate(){
            //エラー情報を格納する配列作成
            $errors = array();
            //名前が入力されていなければ
            if($this->name === ''){
                $errors[] = '名前を入力してください';
            }
            //emailが入力されていなければ
            if($this->email === ''){
                $errors[] = 'メールアドレスを入力してください';
            }
            //telが入力されていなければ
            if($this->tel === ''){
                $errors[] = '電話番号を入力してください';
            }
           //件名が入力されていなければ
            if($this->subject === ''){
                $errors[] = '件名を入力してください';
            }
           //本文が入力されていなければ
            if($this->body === ''){
                $errors[] = '内容を入力してください';
            }
            return $errors;
        }        
    }