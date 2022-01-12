<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: left;
        }

        * {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        body {
            font-family: "標楷體";
            font-size: 28px;
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
    </style>
    <script type="text/javascript">
        // // 定義一個JS的提示函數
        // function confirmupdate(id) {
        //     location.href = "update.php?id=" + id;
        // }
    </script>
</head>

<body>

    <?php
    // 啟動session
    session_start();
    if (isset($_SESSION['is_login']) == TRUE) {
        // header('Location: background.php');
    } else {
        header('Location: login.html');
    }
    // 連接資料庫
    require_once("conn.php");

    // 分頁操作
    $num = 50;
    $page = isset($_GET['p']) ? $_GET['p'] : 1;

    // 計算偏移數值
    $offset = ($page - 1) * $num;

    // 顯示表頭
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