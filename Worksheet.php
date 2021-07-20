<?php

// 啟動session
session_start();
if (isset($_SESSION['is_login']) == TRUE) {
    // header('Location: background.php');
} else {
    header('Location: login.html');
}

// 引入資料庫
require_once("conn.php");

// 取得今天日期
$date = date("m月d日");
// 加入sql 語法，白話文：從 XX 的資料表中選擇所有欄位，並依照 cID 遞增排序
$sql = "SELECT * FROM test1 WHERE username not in (SELECT username FROM test2 WHERE date = '$date')";

// 使用 mysqli_query() 函式可以在 MySQL 中執行 sql 指令後會回傳一個資源識別碼，否則回傳 False。
$result = mysqli_query($connect, $sql);

// 獲取所有行數據
$arrs = mysqli_fetch_all($result, MYSQLI_ASSOC);

// 使用 mysqli_num_rows() 函式來取得資料筆數
// $records = mysqli_num_rows($result);

// $result = $connect->query('SELECT SUM(live + mail + online) AS value_sum FROM testtable');
// $row = $result->fetch_assoc();
// $sum = $row['value_sum'];

// $results = mysqli_query($connect, 'SELECT SUM(live) AS value_sum FROM testtable GROUP BY date'); 
// $row = mysqli_fetch_assoc($results); 
// $sum = $row['value_sum'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>工作表</title>
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
    <nav>
        <ul>
            <li><a href="index.html">佈告欄</a></li>
            <li>
                <a href="#">社宅資訊</a>
                <ul>
                    <li>
                        <a href="FUA.html">豐原社宅</a>
                    </li>
                    <li>
                        <a href="DLA.html">大里社宅</a>
                    </li>
                    <li>
                        <a href="NTA.html">南屯社宅</a>
                    </li>
                    <li>
                        <a href="TPA.html">太平社宅</a>
                    </li>
                    <li>
                        <a href="bulid.html">施工中社宅</a>
                    </li>
                </ul>
            </li>
            <li><a href="QA.html">基本觀念</a></li>
            <li><a href="gongyi.html">公益出租人</a></li>
            <li><a href="management.html">包租代管</a></li>
            <li><a href="process.html">案件處理</a></li>
            <li><a href="download.html">表單下載</a></li>
            <li><a href="login.html">資料處理</a>
                <ul>
                    <li>
                        <a href="Worksheet.php">工作回報</a>
                    </li>
                </ul>
            </li>
            <li><a href="web.html">常用網站</a></li>
        </ul>
    </nav>

    <div class="title">
        <h3>工作回報進度</h3>
    </div>


    <div class="button">
        <input type="button" value="回報工作數量" onclick="window.open('Returnwork.php')">
    </div>

    <div class="form">
        <table>
            <tr>
                <th>尚未回報人員</th>
            </tr>
            <!-- 循環二為數組 -->
            <?php
            foreach ($arrs as $arr) {

            ?>
                <tr>
                    <td><?php echo $arr['username'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>