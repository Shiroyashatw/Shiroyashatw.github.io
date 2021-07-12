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

// 使用 mysqli_query() 函式可以在 MySQL 中執行 sql 指令後會回傳一個資源識別碼，否則回傳 False。
// $result = mysqli_query($connect, $sql);
// if (!$result) {
//     printf("Error: %s\n", mysqli_error($connect));
//     exit();
// }
// 獲取所有行數據
// $arrs = mysqli_fetch_all($result, MYSQLI_ASSOC);

// 使用 mysqli_num_rows() 函式來取得資料筆數
// $records = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統計</title>
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

        .main {
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .main form {
            text-align: center;
            margin: auto;
        }

        .main input {
            font-size: 28px;
        }

        .main input[type=radio] {
            height: 20px;
            width: 30px;
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

        /* table */
        .type{
            margin: 30px 0;
        }
        .type table {
            text-align: center;
            margin: auto;
            width: 1000px;
            border: 2px solid black;
            table-layout: fixed;
            border-collapse: collapse;
        }

        .type table th {
            padding: 10px;
            font-weight: 400;
            font-size: 30px;
        }

        .type table td {
            padding: 10px;
            border: 2px solid black;
        }

        /* 內部文字框 */
        .maintable {
            width: 1200px;
            margin: auto;
            text-align: left;
            table-layout: fixed;
        }
        .maintable table{
            border: 0;
            border-collapse: collapse;
        }
        .maintable td{
            padding: 10px;
            border: 0px;
            border-collapse: collapse;
        }
        #button{
            font-size: 36px;
            height: 60px;
            width: 200px;
        }
        #button:hover{
            font-size: 48px;
            background-color: #D5C7B9;
            transition: .2s;
        }
    </style>
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
        <h3>取號</h3>
    </div>

    <div class="main">
        <form id="form1" action="addtotalinsert.php" name="form1" action="" method="POST">
            <div class="maintable">
                <table>
                    <tr>
                        <td>
                            現場:<input type="text" name="live" id="live">
                        </td>
                    </tr>
                    <tr>
                        <td>郵寄:<input type="text" name="mail" id="mail"></td>
                    </tr>
                    <tr>
                        <td>線上:<input type="text" name="online" id="online">
                        </td>
                    </tr>
                    <tr>
                        <td>時間:<input type="text" name="date" id="date">
                        </td>
                    </tr>
                </table>
            </div>
            <input type="submit" name="button" id="button" value="取號">
        </form>
    </div>


</body>

</html>