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
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        body {
            font-family: "標楷體";
            font-size: 28px;
        }

        nav {
            font-size: 24px;
            background-color: #314c5e;
            margin-bottom: 60px;
        }

        /* 導覽列子分隔 */
        nav li {
            position: relative;
        }

        nav li ul {
            display: none;
            position: absolute;
            top: 100%;
            width: 10rem;
            background-color: #314c5e;
            -webkit-transition: all 10s ease;
            transition: all 10s ease;
        }

        nav ul li:hover ul {
            display: block;
            -webkit-transition: 10s ease;
            transition: 10s ease;
        }

        nav ul {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            list-style-type: none;
        }

        nav ul li {
            margin: auto;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        /*  */
        nav ul li a {
            padding: 0.75rem 1rem;
            margin: auto;
            color: white;
            text-decoration: none;
        }

        nav ul li a:hover {
            -webkit-transition: all 0.25s ease;
            transition: all 0.25s ease;
            background-color: goldenrod;
            color: firebrick;
        }

        nav ul li ul li a {
            width: 10rem;
            color: white;
            text-decoration: none;
        }

        nav ul li ul li a:hover {
            -webkit-transition: all 0.25s ease;
            transition: all 0.25s ease;
            background-color: goldenrod;
            color: firebrick;
        }

        .title {
            padding-top: 15px;
            font-size: 40px;
            text-align: center;
        }

        .item {
            text-align: center;
            margin: auto;
        }

        .main table {
            padding: 5px;
            margin: auto;
            border: 2px solid #000;
            border-collapse: collapse;
        }

        .main th {
            padding: 5px;
            font-size: 30px;
            border: 2px solid #000;
            border-collapse: collapse;
        }

        .main td {
            padding: 5px;
            border: 2px solid #000;
            border-collapse: collapse;
        }

        nav {
            display: flex;
        }

        nav>.main-menu {
            flex: auto;
            font-size: 32px;
            text-align: center;
            color: #fff;
            background-color: #003344;
        }

        .side-menu {
            background-color: #003344;
            flex: auto;
            padding-left: 150px;
        }

        .side-menu ul {
            list-style: none;
            float: left;
            margin: auto;
            padding: 0;
        }

        .side-menu ul a,
        .side-menu ul li {
            display: inline-block;
            color: #fff;
            text-decoration: none;
            text-align: center;
            font-size: 26px;
            line-height: 26px;
            padding: 10px 25px;
        }

        .side-menu ul a:hover {
            background-color: goldenrod;
        }

        .main a {
            text-decoration: none;
            color: saddlebrown;
        }

        .main a:hover {
            color: skyblue;
        }
    </style>
    <script type="text/javascript">
        // 定義一個JS的提示函數
        function confirmupdate(id) {
            location.href = "update.php?id=" + id;
        }

        function confirmlook(id) {
            location.href = "look.php?id=" + id;
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
    </div>

    <div class="item">
        <p>目前資料筆數：<?php echo $records; ?></p>
    </div>
    
    <!-- 橫向總和 -->
    <div class="item">
        <p>總收件數：<?php echo $sum; ?></p>
    </div>    
    
    <input type="button" value="新增每日案件數" onclick="window.open('addtotal.php')">

    <div class="main">
        <table>
            <tr>
                <th>日期</th>
                <th>現場</th>
                <th>郵寄</th>
                <th>線上</th>
                <th>總和</th>
            </tr>
            <!-- 循環二為數組 -->
            <?php
            foreach ($arrs as $arr) {
                $sums = ($arr['live']+$arr['mail']+$arr['online'])
            ?>
                <tr>
                    <td><?php echo $arr['date'] ?></td>
                    <td><?php echo $arr['live'] ?></td>
                    <td><?php echo $arr['mail'] ?></td>
                    <td><?php echo $arr['online'] ?></td>
                    <td><?php echo $sums ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>