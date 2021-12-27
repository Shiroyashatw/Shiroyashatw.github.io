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

$date = $_POST['date'];
$clockhour = $_POST['clockhour'];
$who = $_SESSION['user'];


// 收件項目

// 數組新增方法(1)
// $count = count($_POST['date']);

// for ($i=0; $i <$count ; $i++) {
//     $sql = "INSERT INTO clockon (date, who) VALUES ('{$_POST['date'][$i]}', '$who')";
//     $connect->query($sql);
// }


// 數組新增方法 (2)

foreach ($_POST['date'] as $i => $value) {
    $sql = "INSERT INTO clockon (date, clockhour, who) VALUES ('{$_POST['date'][$i]}', '{$_POST['clockhour'][$i]}', '$who')";
};

$workdate = "SELECT * FROM clockon WHERE date = '$value'";
$result = mysqli_query($connect, $workdate);
$records = mysqli_num_rows($result);

if ($records > 0) {
    echo
    "<script>
alert('有日期已有打過卡!!!');
history.go(-1);
</script>";
} else {
    foreach ($_POST['date'] as $i => $value) {
        $connect->query($sql);
        echo '<script>window.location.href="Worksheet.php";</script>';
    };
}



// $update =
//     "INSERT INTO clockon 
//     (who, date)
//         values
//         ('$who','$date')";


// $run_update = mysqli_query($connect, $update);
//     if ($run_update) {
//         echo '<script>window.location.href="Worksheet.php";</script>';
//     } else {
//         echo "<script>alert('新增失敗!!!')</script>";
//     }
// 查詢子句
// $sql = "SELECT * FROM test2 WHERE username = '$username' AND date = '$date'";

// // 使用 mysqli_query() 函式可以在 MySQL 中執行 sql 指令後會回傳一個資源識別碼，否則回傳 False。
// $result = mysqli_query($connect, $sql);

// // 統計資料總共筆數
// $records = mysqli_num_rows($result);
// // 判斷資料裡面是否已有當天類型資料

// if ($records >= 1) {
//     echo
//     "<script>
//     alert('已回報過數量!!!');
//     history.go(-1);
//     </script>";
// } else {
//     $run_update = mysqli_query($connect, $update);
//     if ($run_update) {
//         echo '<script>window.location.href="Worksheet.php";</script>';
//     } else {
//         echo "<script>alert('新增失敗!!!')</script>";
//     }
// }
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