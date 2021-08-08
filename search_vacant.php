<?php
    //(C)
    require_once 'daos/ReservationDAO.php';
    require_once 'daos/ParkingDAO.php';
    require_once 'daos/UserDAO.php';
    session_start();
    $login_user = $_SESSION['login_user'];
    
    //タイムゾーンの設定
    date_default_timezone_set('Asia/Tokyo');
    
    // var_dump($_GET);
    $user_id = $_GET['id'];
    // print $user_id;
    
    //GET通信でstart_dateというキーワードで値が飛んできたならば
    if(isset($_GET['date'])){
        $date = $_GET['date'];
    }else{
        $date = date("Y-m-d");
    }
    // print $date;
    
    //DAOを使って＄user_mul番のユーザーの予約登録情報をDBから持ってくる
    // $reservations = ReservationDAO::find2($user_id);
    // var_dump($reservations);

    //ReserveDAOを使ってデータベースから全予約登録情報を取得
    // $reservations = ReservationDAO::get_all_reservations();
    

    //今日の日付を予約開始日と合う日を探すために設定
    // $start_date = date("Y-m-d");
    // $today2 = date("Y-m-d", strtotime('+1 day'));
    // var_dump($start_date);
    
    //DAOを使って＄start_dateの日付の予約登録情報をDBから持ってくる
    $reservations1 = ReservationDAO::find3($date, 1);
    // var_dump($reservations1);
    $reservations2 = ReservationDAO::find3($date, 4);
    $reservations3 = ReservationDAO::find3($date, 5);   
    // var_dump($reservations);

    // //セッションからflash_messageを取得し、セッションから削除
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    // 注目する予約一覧の中で注目する時間帯に予約している人の名前を取得
    function get_reserve_user_name($reserves, $date, $hour, $parking_id){
        // var_dump($reserves);
        foreach($reserves as $reserve){
            $start_time = (int)substr($reserve->start_time, 0, 2);
            $end_time = (int)substr($reserve->end_time, 0, 2);
            $start_date = $reserve->start_date;
            $end_date = $reserve->end_date;
            // 予約のユーザー情報表示のためにユーザー情報取得
            $user = UserDAO::find($reserve->user_id);
   
            // var_dump($end);
            // 開始と終了が同じ日
            if($start_time <= $hour && ($hour + 1) <= $end_time && strtotime($start_date) == strtotime($end_date)){
                return "予約済:" . $user->room_no . "号室";
                // return $reserve->user_id;
                // exit;
            } // 開始日が本日、終了日が翌日
            else if(strtotime($start_date) < strtotime($end_date) && $start_time <= $hour && strtotime($start_date) == strtotime($date)){
                return "予約済:" . $user->room_no . "号室";
                // return $reserve->user_id;
                // exit;
            } // 終了日が本日
            else if(strtotime($end_date) == strtotime($date) && $hour < $end_time && strtotime($start_date) < strtotime($date) && strtotime($start_date) < strtotime($end_date)){
                return "予約済:" . $user->room_no . "号室";
                // return $reserve->user_id;
                // exit;
            } // 開始日が本日より前、終了日が本日より後
            else if(strtotime($start_date) < strtotime($date) && strtotime($date) < strtotime($end_date)){
                return "予約済:" . $user->room_no . "号室";
                // return $reserve->user_id;
            }
        }
                $start_time = ($hour < 10 ? '0' . $hour : $hour) . ':00:00';

                return '<a href="reservation_create.php?start_date=' . $date . '&start_time=' . $start_time . '&parking_id=' . $parking_id . '">予約可</a>';
        // return '<a href="xx">予約可</a>';
    }

    // //HTML表示
    // include_once 'views/search_vacant_view.php';    
    include_once 'views/search_vacant_view.php';
    

    