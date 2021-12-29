<?php

// 啟動session
session_start();
if (isset($_SESSION['is_login']) == TRUE) {
    // header('Location: background.php');
} else {
    header('Location: login.html');
};

// 引入資料庫
require_once("conn.php");

// 取得今天日期
$date = date("m月d日");
$today = date("Y-m-d");
$username = $_SESSION['user'];
// 加入sql 語法，白話文：從 XX 的資料表中選擇所有欄位，並依照 cID 遞增排序
$sql = "SELECT * FROM test1 WHERE username not in (SELECT username FROM test2 WHERE date = '$date')";

// 使用 mysqli_query() 函式可以在 MySQL 中執行 sql 指令後會回傳一個資源識別碼，否則回傳 False。
$result = mysqli_query($connect, $sql);

// 獲取所有行數據
$arrs = mysqli_fetch_all($result, MYSQLI_ASSOC);

$clockonsql = "SELECT * FROM clockon WHERE who  = '$username'";
$clockonresult = mysqli_query($connect, $clockonsql);
$clocks = mysqli_fetch_all($clockonresult, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>出勤系統</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/style.css">
    <script type="text/javascript">
        // 定義一個JS的提示函數
        function confirmupdate(id) {
            location.href = "update.php?id=" + id;
        }

        function confirmlook(id) {
            location.href = "view.php?id=" + id;
        }

        function confirmsend(id) {
            location.href = "send.php?id=" + id;
        }
    </script>
</head>

<body>

    <script src="header.js"></script>

    <div class="title">
        <h3>使用者:<?php echo $username ?></h3>
        <h3>今天日期:<?php echo $today ?></h3>
    </div>

    <div class="button">
        <input type="button" value="打卡上班" onclick="window.open('Clockon.php')">
    </div>

    <div class="button">
        <input type="button" value="加班報支" onclick="window.open('Worktime.php')">
    </div>

    <!-- <div class="button">
        <input type="button" value="回報工作數量" onclick="window.open('Returnwork.php')">
    </div> -->

    

    <div class="form">
        <table>
            <thead>
                <tr>
                    <td colspan="2">打卡紀錄</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>打卡時間</td>
                    <td>上班時數</td>
                </tr>
                <?php
                foreach ($clocks as $clock) {

                ?>
                    <tr>
                        <td><?php echo $clock['date'] ?></td>
                        <td><?php echo $clock['clockhour'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>
</body>

</html>