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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>



    <?php
    echo "<table>
    <tr>
    <th>案件編號</th>
    <th>來源</th>
    <th>申請人</th>
    <th>申請人id</th>
    <th>修改時間</th>
    <th>編輯</th>
    </tr>";


    if (isset($_GET['s'])) { // 如果有搜尋文字顯示搜尋結果

        $s = mysqli_real_escape_string($connect, $_GET['s']);
        $sql = "SELECT * FROM 總表 WHERE fileid LIKE '%" . $s . "%' OR assist LIKE '%" . $s . "%' LIMIT {$offset}, {$num}";
        $result = mysqli_query($connect, $sql);

        // SQL 搜尋錯誤訊息
        if (!$result) {
            echo ("錯誤：" . mysqli_error($connect));
            exit();
        }

        // 搜尋無資料時顯示「查無資料」
        if (mysqli_num_rows($result) <= 0) {
            echo "<tr><td colspan='9'>查無資料</td></tr>";
        }

        // 搜尋有資料時顯示搜尋結果
        // while ($row = mysqli_fetch_array($result)) {
        //     echo "<tr>";
        //     echo "<td>" . $row['fileid'] . "</td>";
        //     echo "<td>" . $row['filesituation'] . "</td>";
        //     echo "<td>" . $row['sendtxtsituation'] . "</td>";
        //     echo "<td>" . $row['sAccount'] . "</td>";
        //     echo "<td>" . $row['assist'] . "</td>";
        //     echo "</tr>";
        // }
        while ($arrs = mysqli_fetch_object($result)) { ?>
            <tr>
                <td><?php echo $arrs->fileid ?></td>
                <td><?php echo $arrs->filecom ?></td>
                <td><?php echo $arrs->who ?></td>
                <td><?php echo $arrs->whoid ?></td>
                <td><?php echo $arrs->uptime ?></td>
                <td>
                    <!-- onclick是單擊事件 -->
                    <!-- confirmupdate是JS自定義函數 -->
                    <a href="look.php?id=<?php echo $arrs->fileid ?>">檢視</a>
                    <a href="update.php?id=<?php echo $arrs->fileid ?>">修改</a>
                </td>
            </tr>
        <?php } ?>
        <?php
    } else { // 如果沒有搜尋文字顯示所有資料

        $sql = "SELECT * FROM 總表 LIMIT {$offset}, {$num}";
        $result = mysqli_query($connect, $sql);

        if (!$result) {
            echo ("錯誤：" . mysqli_error($connect));
            exit();
        }

        // while ($row = mysqli_fetch_array($result)) {
        //     echo "<tr>";
        //     echo "<td>" . $row['fileid'] . "</td>";
        //     echo "<td>" . $row['filesituation'] . "</td>";
        //     echo "<td>" . $row['sendtxtsituation'] . "</td>";
        //     echo "<td>" . $row['sAccount'] . "</td>";
        //     echo "<td>" . $row['assist'] . "</td>";
        //     echo "</tr>";
        // }
        while ($arrs = mysqli_fetch_object($result)) { ?>
            <tr>
                <td><?php echo $arrs->fileid ?></td>
                <td><?php echo $arrs->filecom ?></td>
                <td><?php echo $arrs->who ?></td>
                <td><?php echo $arrs->whoid ?></td>
                <td><?php echo $arrs->uptime ?></td>
                <td>
                    <!-- onclick是單擊事件 -->
                    <!-- confirmupdate是JS自定義函數 -->
                    <a href="look.php?id=<?php echo $arrs->fileid ?>">檢視</a>
                    <a href="update.php?id=<?php echo $arrs->fileid ?>">修改</a>
                </td>
            </tr>
        <?php } ?>
    <?php
    }

    echo "</table>";

    mysqli_close($connect); // 連線結束

    ?>


</body>

</html>