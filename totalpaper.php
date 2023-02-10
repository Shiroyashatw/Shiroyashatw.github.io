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

// 加入sql 語法，白話文：從 XX 的資料表中選擇所有欄位，並依照 cID 遞增排序

$sql = "SELECT * FROM testtable ";

// 使用 mysqli_query() 函式可以在 MySQL 中執行 sql 指令後會回傳一個資源識別碼，否則回傳 False。
$result = mysqli_query($connect, $sql);

// 獲取所有行數據
$arrs = mysqli_fetch_all($result, MYSQLI_ASSOC);

// 使用 mysqli_num_rows() 函式來取得資料筆數
$records = mysqli_num_rows($result);

$result = $connect->query('SELECT SUM(live + mail + online) AS value_sum FROM testtable');
$row = $result->fetch_assoc();
$sum = $row['value_sum'];

// $results = mysqli_query($connect, 'SELECT SUM(live) AS value_sum FROM testtable GROUP BY date'); 
// $row = mysqli_fetch_assoc($results); 
// $sum = $row['value_sum'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>總表</title>
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
            <li><a href="login.html">資料處理</a></li>
            <li><a href="web.html">常用網站</a></li>
        </ul>
    </nav>

    <div class="title">
        <h3>總表</h3>
        <p>目前資料筆數：<?php echo $records; ?></p>
    </div>


    <div class="button">
        <input type="button" value="新增每日案件數" onclick="window.open('addtotal.php')">
    </div>

    <div class="form">
        <table>
            <tr>
                <th>日期</th>
                <th>類型</th>
                <th>市府</th>
                <th>郵寄</th>
                <th>線上</th>
                <th>快速收件箱</th>
                <th>總和</th>
                <th>紀錄</th>
            </tr>
            <!-- 循環二為數組 -->
            <?php
            foreach ($arrs as $arr) {

            ?>
                <tr>
                    <td><?php echo $arr['date'] ?></td>
                    <td><?php echo $arr['type'] ?></td>
                    <td><?php echo $arr['live'] ?></td>
                    <td><?php echo $arr['mail'] ?></td>
                    <td><?php echo $arr['online'] ?></td>
                    <td><?php echo $arr['FastReceive'] ?></td>
                    <td><?php echo $arr['total'] ?></td>
                    <td>
                        <!-- onclick是單擊事件 -->
                        <!-- confirmupdate是JS自定義函數 -->
                        <a href="view.php?id=<?php echo $arr['id'] ?>">檢視</a>
                        <a href="update.php?id=<?php echo $arr['id'] ?>">修改</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>