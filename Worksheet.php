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
    
    <script src="header.js"></script>

    <div class="title">
        <h3>使用者:<?php echo $_SESSION['user']?></h3>
    </div>

    <div class="button">
        <input type="button" value="打卡上班" onclick="window.open('Clockon.php')">
    </div>

    <div class="button">
        <input type="button" value="加班報支" onclick="window.open('Worktime.php')">
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