<?php
    //モデル（M）
    class Notice{
        //プロパティ
        public $id; //ID
        public $regist_date; //登録日
        public $title; //タイトル
        public $overview; //概要
        public $link_url; //リンクURL
        public $image; //画像ファイルの名前
        public $created_at; //登録時間
        //コンストラクタ
        public function __construct($regist_date='', $title='', $overview='', $link_url='', $image=''){
            $this->regist_date = $regist_date;
            $this->title = $title;
            $this->overview = $overview;
            $this->link_url = $link_url;
            $this->image = $image;
        }
        //入力チェックをするメソッド
        public function validate(){
            //エラー情報を格納する配列作成
            $errors = array();
            //登録日が入力されていなければ
            if($this->regist_date === ''){
                $errors[] = '登録日を入力してください';
            }
            //タイトルが入力されていなければ
            if($this->title === ''){
                $errors[] = 'タイトルを入力してください';
            }
            //概要が入力されていなければ
            if($this->overview === ''){
                $errors[] = '概要を入力してください';
            }
            // //リンクが入力されていなければ
            // if($this->link_url === ''){
            //     $errors[] = 'リンクのURLを入力してください';
            // }
            // 画像が選択されていなれば
            // if($this->image === ''){
            //     $errors[] = '画像が選択されていません';
            // }
            return $errors;
        }        
    }