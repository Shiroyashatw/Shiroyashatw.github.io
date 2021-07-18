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

$type = $_POST['type'];
$live = $_POST['live'];
$mail = $_POST['mail'];
$online = $_POST['online'];
$date = $_POST['date'];
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$num3 = $_POST['num3'];
$num4 = $_POST['num4'];
$num5 = $_POST['num5'];
$num6 = $_POST['num6'];
$num7 = $_POST['num7'];
$num8 = $_POST['num8'];
$num9 = $_POST['num9'];
$num10 = $_POST['num10'];
$num11 = $_POST['num11'];
$num12 = $_POST['num12'];
$num13 = $_POST['num13'];
$num14 = $_POST['num14'];
$num15 = $_POST['num15'];
$num16 = $_POST['num16'];
$num17 = $_POST['num17'];
$num18 = $_POST['num18'];
$num19 = $_POST['num19'];
$num20 = $_POST['num20'];
$num21 = $_POST['num21'];
$num22 = $_POST['num22'];
$num23 = $_POST['num23'];
$num24 = $_POST['num24'];
$num25 = $_POST['num25'];
$num26 = $_POST['num26'];
$num27 = $_POST['num27'];
$num28 = $_POST['num28'];
$num29 = $_POST['num29'];
$num30 = $_POST['num30'];

$FastReceive =
    $live + $num1 + $num2 + $num3 + $num4 + $num5
    + $num6 + $num7 + $num8 + $num9 + $num10 + $num11
    + $num12 + $num13 + $num14 + $num15 + $num16
    + $num17 + $num18 + $num19 + $num20 + $num21
    + $num22 + $num23 + $num24 + $num25 + $num26
    + $num27 + $num28 + $num29 + $num30;

$total = $mail + $online + $FastReceive;

// 收件項目

$update =
    "INSERT INTO testtable 
    (live, mail, online,num1,num2,num3,
    num4,num5,num6,num7,num8,num9,num10,
    num11,num12,num13,num14,num15,num16,
    num17,num18,num19,num20,num21,num22,
    num23,num24,num25,num26,num27,num28,
    num29,num30,FastReceive,total,
    type, date)
        values
        ('$live','$mail','$online',
        '$num1','$num2','$num3',
        '$num4','$num5','$num6',
        '$num7','$num8','$num9',
        '$num10','$num11','$num12',
        '$num13','$num14','$num15',
        '$num16','$num17','$num18',
        '$num19','$num20','$num21',
        '$num22','$num23','$num24',
        '$num25','$num26','$num27',
        '$num28','$num29','$num30',
        '$FastReceive','$total',
        '$type','$date')";

// 查詢子句
$sql = "SELECT * FROM testtable WHERE type = '$type' AND date = '$date'";

// 使用 mysqli_query() 函式可以在 MySQL 中執行 sql 指令後會回傳一個資源識別碼，否則回傳 False。
$result = mysqli_query($connect, $sql);

// 統計資料總共筆數
$records = mysqli_num_rows($result);
// 判斷資料裡面是否已有當天類型資料

if ($records >= 1) {
    echo
    "<script>
    alert('當天已有資料!!!');
    history.go(-1);
    </script>";
} else {
    $run_update = mysqli_query($connect, $update);
    if ($run_update) {
        echo '<script>window.location.href="totalpaper.php";</script>';
    } else {
        echo "<script>alert('新增失敗!!!')</script>";
    }
}
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

</body>

</html>