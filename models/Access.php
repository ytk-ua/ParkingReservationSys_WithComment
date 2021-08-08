<?php
    //モデル（M）
    class Access{
        //プロパティ
        public $id; //ID
        public $name; //名前
        public $visited_time; //訪問時間
        public $url; //URL
        public $created_at; //登録時間
        //コンストラクタ($nameから$name=''に変更。エラー対応で空文字を与えている)
        public function __construct($name='', $visited_time='', $url=''){
            $this->name = $name;
            $this->visited_time = $visited_time;
            $this->url = $url;
        }
    }