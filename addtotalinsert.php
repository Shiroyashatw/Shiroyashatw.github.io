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

$live = $_POST['live'];
$mail = $_POST['mail'];
$online = $_POST['online'];
$date = $_POST['date'];

// 收件項目

$update =
    "INSERT INTO testtable (live, mail, online, date)
        values
        ('$live','$mail','$online','$date')";

$run_update = mysqli_query($connect, $update);
if ($run_update) {
    echo '<script>window.location.href="totalpaper.php";</script>';
} else {
    echo "<script>alert('新增失敗!!!')</script>";
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