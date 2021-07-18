<?php
// 啟動session
session_start();
if (isset($_SESSION['is_login']) == TRUE) {
    // header('Location: background.php');
} else {
    header('Location: login.html');
}
require_once("conn.php");
$edit = $_GET["id"];
$Select = "SELECT * FROM testtable where id = '$edit'";
$result = mysqli_query($connect, $Select);

// 獲取所有行數據
// $arrs = mysqli_fetch_array($result, MYSQLI_ASSOC)


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>檢視數量</title>
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
        <h3>每天收件量</h3>
    </div>

    <form action="view.php?anotherid=<?php echo $edit; ?>" method="post">
        <?php while ($arrs = mysqli_fetch_assoc($result)) { ?>
            <div class="main">
                <div class="maintable">
                    <table>
                        <tr>
                            <th>時間:<?php echo $arrs['date'] ?></th>
                            <th>類型:<?php echo $arrs['type'] ?></th>
                            <th>收件箱數量:<?php echo $arrs['FastReceive'] ?></th>
                            <th>當天收件數:<?php echo $arrs['total'] ?></th>
                        </tr>
                        <tr>
                            <td colspan="2">市府:<?php echo $arrs['live'] ?></td>
                            <td>郵寄:<?php echo $arrs['mail'] ?></td>
                            <td>線上:<?php echo $arrs['online'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="title">
                    <h3>各區收件數</h3>
                </div>
                <div class="maintable">
                    <table>
                        <tr>
                            <td>中區:<?php echo $arrs['num1'] ?></td>
                            <td>東區:<?php echo $arrs['num2'] ?></td>
                            <td>西區:<?php echo $arrs['num3'] ?></td>
                            <td>南區:<?php echo $arrs['num4'] ?></td>
                            <td>北區:<?php echo $arrs['num5'] ?></td>
                        </tr>
                        <tr>
                            <td>西屯:<?php echo $arrs['num6'] ?></td>
                            <td>南屯:<?php echo $arrs['num7'] ?></td>
                            <td>北屯:<?php echo $arrs['num8'] ?></td>
                            <td>大里:<?php echo $arrs['num9'] ?></td>
                            <td>大雅:<?php echo $arrs['num10'] ?></td>
                        </tr>
                        <tr>
                            <td>大甲:<?php echo $arrs['num11'] ?></td>
                            <td>潭子:<?php echo $arrs['num12'] ?></td>
                            <td>龍井:<?php echo $arrs['num13'] ?></td>
                            <td>豐原:<?php echo $arrs['num14'] ?></td>
                            <td>陽明大樓:<?php echo $arrs['num15'] ?></td>
                        </tr>
                        <tr>
                            <td>太平:<?php echo $arrs['num16'] ?></td>
                            <td>沙鹿:<?php echo $arrs['num17'] ?></td>
                            <td>烏日:<?php echo $arrs['num18'] ?></td>
                            <td>東勢:<?php echo $arrs['num19'] ?></td>
                            <td>神岡:<?php echo $arrs['num20'] ?></td>
                        </tr>
                        <tr>
                            <td>大安:<?php echo $arrs['num21'] ?></td>
                            <td>大肚:<?php echo $arrs['num22'] ?></td>
                            <td>外埔:<?php echo $arrs['num23'] ?></td>
                            <td>石岡:<?php echo $arrs['num24'] ?></td>
                            <td>后里:<?php echo $arrs['num25'] ?></td>
                        </tr>
                        <tr>
                            <td>和平:<?php echo $arrs['num26'] ?></td>
                            <td>梧棲:<?php echo $arrs['num27'] ?></td>
                            <td>清水:<?php echo $arrs['num28'] ?></td>
                            <td>新社:<?php echo $arrs['num29'] ?></td>
                            <td>霧峰:<?php echo $arrs['num30'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php } ?>
        <div class="button">
        <input type="button" value="返回總表" onclick="location.href='totalpaper.php'">
        </div>
        <!-- <div class="submit">
            <span>
                <input type="submit" name="update" value="更新">
                <input id="date" name="date">
            </span>
        </div> -->
    </form>
</body>

</html>