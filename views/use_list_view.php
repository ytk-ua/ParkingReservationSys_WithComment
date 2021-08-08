<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>利用実績管理</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /*table, tr, th, td {*/
        /*    border: solid 2px;*/
        /*} */
        /*table{*/
        /*    width: 80%;*/
        /*}*/
    </style>    
</head>
<body>
<!--ヘッダー-->
<header>
    <a href="index.php"><img src="images/logo.png" alt="Parking Reservation System" id="logo"></a>
    <div id="header_button">
    <ul>
        <li><a href="logout.php" class="user_logout">ログアウト</a></li>
        <li><a href="edit.php?id=<?= $login_user->id ?>" class="user_edit">登録情報編集</a></li>
    </ul>
    </div>
    <nav id="global_navi">
        <ul>
            <li><a href="top.php">HOME</a></li>
            <li><a href="search_vacant.php">空き状況確認</a></li>
            <li><a href="reservation_list.php?id=<?= $login_user->id ?>">予約確認</a></li>
            <li class="current"><a href="use_list.php?id=<?= $login_user->id ?>">利用実績確認</a></li>
        </ul>
    </nav>
</header>
<!--/ヘッダー-->

<!--メイン-->
<div id="main">    

    <h1>利用実績管理</h1>
    <h2>利用実績の一覧</h2>
    
    <?php if($flash_message !== null): ?>
    <p class="flash"><?= $flash_message ?></p>
    <?php endif; ?>

   <p class="session"><?= $login_user->name ?>さんの駐車場利用実績</p>
   <table>
        <tr>
            <th>ユーザーID</th>
            <th>駐車場名</th>
            <th>利用開始日</th>
            <th>利用開始時間</th>
            <th>利用終了日</th>
            <th>利用終了時間</th>
            <th>利用時間</th>
            <th>駐車場料金</th>
            <th>利用料金</th>
        </tr>
    <?php foreach($reservations0 as $reservation): ?>
    <?php $start_time = substr($reservation->start_time, 0, 5) ?>
    <?php $end_time = substr($reservation->end_time, 0, 5) ?>
    <?php $timestamp1 = strtotime("$reservation->start_date $reservation->start_time" ) ?>
    <?php $timestamp2 = strtotime("$reservation->end_date $reservation->end_time" ) ?>
    <?php $parking = ParkingDAO::find($reservation->parking_id) ?>

        <tr>
            <td align="center"><?= $reservation->user_id ?></td>
            <td align="center"><?= $parking->parking_name ?></td>
            <td align="center"><?= $reservation->start_date ?></td>
            <td align="center"><?= $start_time ?></td>
            <!--<td><?= substr($reservation->start_time, 0, 5) ?></td>-->
            <td align="center"><?= $reservation->end_date ?></td>
            <td align="center"><?= $end_time ?></td>
            <!--<td><?= substr($reservation->end_time, 0, 5) ?></td>-->
            <td align="right"><?= ($timestamp2 - $timestamp1)/60/60 ?>時間</td>
            <td align="right">¥<?= ($parking->price) ?>/1h</td>
            <td align="right">¥<?= number_format((($timestamp2 - $timestamp1)/60/60)*($parking->price)) ?></td>
        </tr>
    <?php endforeach; ?>
    </table>

     <P> <a href="use_list.php?date=<?= date("Y-m", strtotime($date . '-01' . '-1 month')) ?>">前月</a> << <?= date('Y-m',  strtotime($date)) ?> 
     <!--未来の実績は表示されないようにif文の追加-->
       <?php if(strtotime($date . '+1 month') <= strtotime(date('Y-m'))): ?>
       >> <a href="use_list.php?date=<?= date("Y-m", strtotime($date . '+1 month')) ?>">翌月</a></P>
       <?php endif; ?>
    <!--<P> <a href="use_list.php?date=<?= date("Y-m", strtotime($date . '-01' . '-1 month')) ?>">前月</a> << <?= date('Y-m', strtotime($date)) ?> >> <a href="use_list.php?date=<?= date("Y-m", strtotime($date . '+1 month')) ?>">翌月</a></P>   -->
    <table>
        <tr>
            <th>ユーザーID</th>
            <th>駐車場名</th>
            <th>利用開始日</th>
            <th>利用開始時間</th>
            <th>利用終了日</th>
            <th>利用終了時間</th>
            <th>利用時間</th>
            <th>駐車場料金</th>
            <th>利用料金</th>
        </tr>
    <?php foreach($reservations as $reservation): ?>
    <?php $start_time = substr($reservation->start_time, 0, 5) ?>
    <?php $end_time = substr($reservation->end_time, 0, 5) ?>
    <?php $timestamp1 = strtotime("$reservation->start_date $reservation->start_time" ) ?>
    <?php $timestamp2 = strtotime("$reservation->end_date $reservation->end_time" ) ?>
    <?php $parking = ParkingDAO::find($reservation->parking_id) ?>

        <tr>
            <td align="center"><?= $reservation->user_id ?></td>
            <td align="center"><?= $parking->parking_name ?></td>
            <td align="center"><?= $reservation->start_date ?></td>
            <td align="center"><?= $start_time ?></td>
            <td align="center"><?= $reservation->end_date ?></td>
            <td align="center"><?= $end_time ?></td>
            <td align="right"><?= ($timestamp2 - $timestamp1)/60/60 ?>時間</td>
            <td align="right">¥<?= ($parking->price) ?>/1h</td>
            <td align="right">¥<?= number_format((($timestamp2 - $timestamp1)/60/60)*($parking->price)) ?></td>
        </tr>
    <?php endforeach; ?>
    </table>

  <!--<p>（※修正中）<?= $this_year ?>年<?= $last_month ?>月の利用実績</p>-->
  <!-- <table>-->
  <!--      <tr>-->
  <!--          <th>ユーザーID</th>-->
  <!--          <th>駐車場名</th>-->
  <!--          <th>利用開始日</th>-->
  <!--          <th>利用開始時間</th>-->
  <!--          <th>利用終了日</th>-->
  <!--          <th>利用終了時間</th>-->
  <!--          <th>利用時間</th>-->
  <!--          <th>駐車場料金</th>-->
  <!--          <th>利用料金</th>-->
  <!--      </tr>-->
  <!--  <?php foreach($reservations as $reservation): ?>-->
  <!--  <?php $start_time = substr($reservation->start_time, 0, 5) ?>-->
  <!--  <?php $end_time = substr($reservation->end_time, 0, 5) ?>-->
  <!--  <?php $timestamp1 = strtotime("$reservation->start_date $reservation->start_time" ) ?>-->
  <!--  <?php $timestamp2 = strtotime("$reservation->end_date $reservation->end_time" ) ?>-->
  <!--  <?php $parking = ParkingDAO::find($reservation->parking_id) ?>-->

  <!--      <tr>-->
  <!--          <td align="center"><?= $reservation->user_id ?></td>-->
  <!--          <td align="center"><?= $parking->parking_name ?></td>-->
  <!--          <td align="center"><?= $reservation->start_date ?></td>-->
  <!--          <td align="center"><?= $start_time ?></td>-->
            <!--<td><?= substr($reservation->start_time, 0, 5) ?></td>-->
  <!--          <td align="center"><?= $reservation->end_date ?></td>-->
  <!--          <td align="center"><?= $end_time ?></td>-->
            <!--<td><?= substr($reservation->end_time, 0, 5) ?></td>-->
  <!--          <td align="right"><?= ($timestamp2 - $timestamp1)/60/60 ?>時間</td>-->
  <!--          <td align="right">¥<?= ($parking->price) ?>/1h</td>-->
  <!--          <td align="right">¥<?= number_format((($timestamp2 - $timestamp1)/60/60)*($parking->price)) ?></td>-->
  <!--      </tr>-->
  <!--  <?php endforeach; ?>-->
  <!--  </table>-->
 
    <!--<p><a href="top.php">マイページトップに戻る</a></p>-->
    <!--<p><a href="logout.php">ログアウト</a></p>-->
    
</div>
<!--/メイン-->

<!--フッター-->
<footer>
    <div id="footer_nav">
        <ul>
            <li><a href = top.php>HOME</a></li>
            <li><a href = about.php>システム概要</a></li>
            <li><a href = guide.php>ご利用ガイド</a></li>
            <li><a href = contact.php>お問合せ</a></li>
        </ul>
    </div>
    <small>&copy; 2021 ParkingReservationSystem</small>
</footer>
<!--/フッター-->
    
</body>
</html>