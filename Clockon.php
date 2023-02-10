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
    <title>打卡上班</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>

    <script src="header.js"></script>



    <!--  -->
    <div class="main">
        <form id="form1" action="Clockoninsert.php" name="form1" method="POST">

            <!-- 標題 -->
            <div class="title">
                <h3>打卡上班</h3>
            </div>
            <div class="maintable">
                <table>
                    <tbody id="new">
                    <tr>
                        <td><input type="date" name="date[]"><span><input type="hidden" name="clockhour[]" value="8"></span></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="button">
                <input type="submit" name="button" id="button" value="送出">
            </div>


        </form>
    </div>

    <div class="button">
        <button class="add">增加欄位</button>
        <button class="remove">刪除欄位</button>
    </div>


    <script>

        // 打卡表單新增欄位
        $('.add').click(function() {

            // 1.創建元素，換行寫法 "<>" + "<>"...
            var newtr = $("<tr>" +
                "<td><input type='date' name='date[]'><span><input type='hidden' name='clockhour[]' value='8'></span></td>" +
                "</tr>");

            // 2.添加元素

            $("#new").append(newtr);
        });


        // 加班表單刪除欄位
        $('.remove').click(function() {
            var rowcount = $('#new tr').length;
            if (rowcount > 1) {
                $('#new tr:last').remove();
            } else {
                alert("最後一欄無法刪除");
            }
        });
    </script>

    <!-- <script type="text/javascript">
        function getTodayDate() {
            var fullDate = new Date();
            var MM = (fullDate.getMonth() + 1) >= 10 ? (fullDate.getMonth() + 1) : ("0" + (fullDate.getMonth() + 1));
            var dd = fullDate.getDate() < 10 ? ("0" + fullDate.getDate()) : fullDate.getDate();
            var today = MM + "月" + dd + "日";
            return today;
        }
        document.getElementById('date').value = getTodayDate();
    </script> -->

</body>

</html>