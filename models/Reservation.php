<?php
    //モデル（M）
    class Reservation{
        //プロパティ
        public $id; //ID
        public $user_id; //ユーザーID
        public $parking_id; //駐車場ID
        public $start_date; //予約開始日
        public $start_time; //予約開始時間
        public $end_date; //予約終了日
        public $end_time; //予約終了時間
        public $email; //メールアドレス
        public $tel; //電話番号
        public $remarks; //備考/連絡事項
        public $created_at; //登録時間
        
        //コンストラクタ($nameから$name=''に変更。エラー対応で空文字を与えている)
        public function __construct($user_id='', $parking_id='', $start_date='', $start_time='', $end_date='', $end_time='', $email='', $tel='', $remarks=''){
            $this->user_id = $user_id;
            $this->parking_id = $parking_id;
            $this->start_date = $start_date;
            $this->start_time = $start_time;
            $this->end_date = $end_date;
            $this->end_time = $end_time;
            $this->email = $email;
            $this->tel = $tel;
            $this->remarks = $remarks;
            }
    }