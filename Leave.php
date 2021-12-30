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
    <title>加班</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>

    <script src="header.js"></script>


    <!-- 假別選項 -->
    <datalist id="browsers">
        <option value="病假">
        <option value="事假">
        <option value="疫苗假">
        <option value="喪假">
        <option value="婚假">
        <option value="公假">
        <option value="育嬰假">
    </datalist>
    <!--  -->


    <div class="main">


        <form id="form1" action="Leaveinsert.php" name="form1" method="POST">

            <!-- 標題 -->
            <div class="title">
                <h3>請假單</h3>
            </div>

            <div class="maintable" onchange="leavetotal()">
                <table id="worktime">
                    <thead>
                        <tr>
                            <th colspan="8">請假時數計算</th>
                        </tr>
                    </thead>
                    <tbody id="leavetbody">
                        <tr>
                            <td>請假日期</td>
                            <td>請假原因</td>
                            <td>起始時</td>
                            <td>起始分</td>
                            <td>結束時</td>
                            <td>結束分</td>
                            <td>時數結果(小時)</td>
                        </tr>
                        <tr>
                            <td><input type="date" name="date[]"></td>
                            <td><input list='browsers' name='leavebrowser[]'></td>
                            <td><input type="text" name="leavereason[]" class="leavereason" placeholder="原因"></td>
                            <td><input type="text" name="starthour[]" min="0" class="starthour" maxlength="2"></td>
                            <td><input type="text" name="startmin[]" min="0" class="startmin" maxlength="2"></td>
                            <td><input type="text" name="endhour[]" min="0" class="endhour" maxlength="2"></td>
                            <td><input type="text" name="endmin[]" min="0" class="endmin" maxlength="2"></td>
                            <td><input type="number" name="leavetime[]" min='0' class="leavetime" value="" placeholder="請假時數" readonly></td>
                        </tr>
                    </tbody>
                </table>
            </div>
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

         $('input').keyup(function() {
            if (this.value.length == this.maxLength) {
                $(this).closest('td').next('td').find('input').focus();
            }
        });

        // 請假表單新增欄位
        $('.add').click(function() {
            var newleavetr = $('<tr>' +
                "<td><input type='date' name='date[]'></td>" +
                "<td><input list='browsers' name='leavebrowser[]'></td>" +
                "<td><input type='text' name='leavereason[]' class='leavereason' placeholder='原因'></td>" +
                "<td><input type='text' name='starthour[]' min='0' class='starthour' maxlength='2'></td>" +
                "<td><input type='text' name='startmin[]' min='0' class='startmin' maxlength='2'></td>" +
                "<td><input type='text' name='endhour[]' min='0' class='endhour' maxlength='2'></td>" +
                "<td><input type='text' name='endmin[]' min='0' class='endmin' maxlength='2'></td>" +
                "<td><input class='leavetime' name='leavetime[]' type='number' min='0' value='' placeholder='請假時數' readonly></td>" +
                '</tr>');

            $('#leavetbody').append(newleavetr);
            $("#leavetbody tr:last td:eq(3) input").focus();

            $('input').keyup(function() {
                if (this.value.length == this.maxLength) {
                    $(this).closest('td').next('td').find('input').focus();
                }
            });
        })



        // 請假表單刪除欄位
        $('.remove').click(function() {
            var rowcount = $('#leavetbody tr').length;
            if (rowcount > 1) {
                $('#leavetbody tr:last').remove();
            } else {
                alert("已無欄位");
            }
        });



        // 請假時數計算

        function leavetotal() {
            leavestarthour = document.getElementsByClassName('starthour')
            leavestartmin = document.getElementsByClassName('startmin')
            leaveendhour = document.getElementsByClassName('endhour')
            leaveendmin = document.getElementsByClassName('endmin')
            leavetime = document.getElementsByClassName("leavetime")

            for (var x = 0; x < leavestarthour.length; x++) {

                leavetime[x].value = ((parseInt(leaveendhour[x].value) * 60 + parseInt(leaveendmin[x].value)) - (parseInt(leavestarthour[x].value) * 60 + parseInt(leavestartmin[x].value))) / 60
                if (leavetime[x].value > 4) {
                    leavetime[x].value = leavetime[x].value - 1 
                }
            }
        }
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