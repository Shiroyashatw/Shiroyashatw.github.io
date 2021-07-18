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

    <div class="title">
        <h3>每日統計數量</h3>
    </div>


    <!--  -->
    <div class="main">
        <form id="form1" action="addtotalinsert.php" name="form1" action="" method="POST">

            <div class="radiotype">
                <span>數量類型:</span>
                <input type="radio" id="租金" name="type"  value="租金" checked /><label for="租金">租金</label>
                <input type="radio" id="自購" name="type"  value="自購"/><label for="自購">自購</label>
                <input type="radio" id="修繕" name="type"  value="修繕"/><label for="修繕">修繕</label>
            </div>

            <!-- 標題 -->
            <div class="title">
                <h3>主要地方</h3>
            </div>
            <div class="maintable">
                <table>
                    <tr>
                        <td>市府</td>
                        <td>
                            <input type="text" name="live" id="live" value="0">
                        </td>
                        <td>郵寄</td>
                        <td>
                            <input type="text" name="mail" id="mail" value="0">
                        </td>
                        <td>線上</td>
                        <td>
                            <input type="text" name="online" id="online" value="0">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="title">
                <h3>各區公所</h3>
            </div>
            <div class="maintable">
                <table>
                    <tr>
                        <td>中區</td>
                        <td><input type="text" name="num1" value="0"></td>
                        <td>東區</td>
                        <td><input type="text" name="num2" value="0"></td>
                        <td>西區</td>
                        <td><input type="text" name="num3" value="0"></td>
                        <td>南區</td>
                        <td><input type="text" name="num4" value="0"></td>
                        <td>北區</td>
                        <td><input type="text" name="num5" value="0"></td>
                    </tr>
                    <tr>
                        <td>西屯</td>
                        <td><input type="text" name="num6" value="0"></td>
                        <td>南屯</td>
                        <td><input type="text" name="num7" value="0"></td>
                        <td>北屯</td>
                        <td><input type="text" name="num8" value="0"></td>
                        <td>大里</td>
                        <td><input type="text" name="num9" value="0"></td>
                        <td>大雅</td>
                        <td><input type="text" name="num10" value="0"></td>
                    </tr>
                    <tr>
                        <td>大甲</td>
                        <td><input type="text" name="num11" value="0"></td>
                        <td>潭子</td>
                        <td><input type="text" name="num12" value="0"></td>
                        <td>龍井</td>
                        <td><input type="text" name="num13" value="0"></td>
                        <td>豐原</td>
                        <td><input type="text" name="num14" value="0"></td>
                        <td>陽明大樓</td>
                        <td><input type="text" name="num15" value="0"></td>
                    </tr>
                    <tr>
                        <td>太平</td>
                        <td><input type="text" name="num16" value="0"></td>
                        <td>沙鹿</td>
                        <td><input type="text" name="num17" value="0"></td>
                        <td>烏日</td>
                        <td><input type="text" name="num18" value="0"></td>
                        <td>東勢</td>
                        <td><input type="text" name="num19" value="0"></td>
                        <td>神岡</td>
                        <td><input type="text" name="num20" value="0"></td>
                    </tr>
                    <tr>
                        <td>大安</td>
                        <td><input type="text" name="num21" value="0"></td>
                        <td>大肚</td>
                        <td><input type="text" name="num22" value="0"></td>
                        <td>外埔</td>
                        <td><input type="text" name="num23" value="0"></td>
                        <td>石岡</td>
                        <td><input type="text" name="num24" value="0"></td>
                        <td>后里</td>
                        <td><input type="text" name="num25" value="0"></td>
                    </tr>
                    <tr>
                        <td>和平</td>
                        <td><input type="text" name="num26" value="0"></td>
                        <td>梧棲</td>
                        <td><input type="text" name="num27" value="0"></td>
                        <td>清水</td>
                        <td><input type="text" name="num28" value="0"></td>
                        <td>新社</td>
                        <td><input type="text" name="num29" value="0"></td>
                        <td>霧峰</td>
                        <td><input type="text" name="num30" value="0"></td>
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