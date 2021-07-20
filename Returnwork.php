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
    <title>每日數量</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/style.css">
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



    <!--  -->
    <div class="main">
        <form id="form1" action="Returnworkinsert.php" name="form1"  method="POST">

            <!-- 標題 -->
            <div class="title">
                <h3>回報工作</h3>
            </div>
            <div class="maintable">
                <table>
                    <tr>
                        <td>回報工作:</td>
                        <td><input type="text" name="work" value="0"></td>
                    </tr>
                </table>
            </div>
            
            <div class="button">
            <input type="submit" name="button" id="button" value="送出">
            <input type="hidden" id="date" name="date">
            </div>
        </form>
    </div>

    <script type="text/javascript">
        function getTodayDate() {
            var fullDate = new Date();
            var MM = (fullDate.getMonth() + 1) >= 10 ? (fullDate.getMonth() + 1) : ("0" + (fullDate.getMonth() + 1));
            var dd = fullDate.getDate() < 10 ? ("0" + fullDate.getDate()) : fullDate.getDate();
            var today = MM + "月" + dd + "日";
            return today;
        }
        document.getElementById('date').value = getTodayDate();
    </script>

</body>

</html>