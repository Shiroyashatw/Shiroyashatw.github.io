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
$Select = "SELECT * FROM 住補總表 where id = '$edit'";
$run = mysqli_query($connect, $Select);
$row = mysqli_fetch_array($run);

// 主要目錄
$fileid = $row["fileid"];
$filesituation = $row["filesituation"];
$filepaper = $row["filepaper"];
$filewait = $row["filewait"];
$filecheck = $row["filecheck"];
$sendtxtsituation = $row["sendtxtsituation"];
$fileerror = $row["fileerror"];

// 送出時間
$date = $row["time"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>更新-總表-</title>
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        body {
            font-family: "標楷體";
            font-size: 27px;
        }

        .title h3 {
            padding-top: 15px;
            padding-bottom: 15px;
            font-size: 34px;
            text-align: center;
        }

        .main-item {
            padding-left: 15px;
            padding-top: 20px;
        }

        .main-item input {
            height: 25px;
        }

        .main-item input[type=radio] {
            width: 28px;
        }

        .middle {
            padding-left: 30px;
            padding-top: 20px;
            text-align: center;
        }

        .main-type {
            height: 100px;
            line-height: 100px;
            padding-left: 15px;
        }

        .main-type input {
            height: 25px;
        }

        .main-type input[type=checkbox] {
            width: 25px;
        }

        .submit {
            padding-left: 300px;
            padding-top: 30px;
            padding-bottom: 40px;
        }

        #date {
            width: 800px;
            font-size: 28px;
        }

        .submit input[type=submit] {
            font-size: 45px;
        }

        /* 上面導覽列 */
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
    </style>
</head>

<body>
    <nav>
        <div class="main-menu">
            住宅服務科
        </div>
    </nav>
    <nav>
        <div class="side-menu">
            <ul>
            <li><a href='search.html'>檢視總表</a></li>
                <li><a href='https://has.cpami.gov.tw/index/index.aspx' target="_blank">住補系統</a></li>
                <li><a href='https://single-newlywed.cpami.gov.tw/manage/login' target="_blank"> 青租系統</a></li>
                <li><a href='https://glir.land.moi.gov.tw/GlirNew/Home/NEWOLDURL' target="_blank">地政系統</a></li>
                <li><a href='新筆記.html' target="_blank">筆記</a></li>
                <li><a href='who.php' target="_blank">自己總表</a></li>
                <li><a href='filecheck.php' target="_blank">待發文</a></li>
                <li><a href='filecheck.php' target="_blank">已發文</a></li>
                <li><a href='https://docs.google.com/spreadsheets/d/1iWTtniPfJbmRubh0ajol8qaMNLt73oxrKN_M9ISCehM/edit#gid=1969159688' target="_blank">補正大表</a></li>
                <li><a href='logout.php'>登出</a></li>
            </ul>
        </div>
    </nav>
    <div class="title">
        <h3>案件狀況</h3>
    </div>
    <form action="update.php?id=<?php echo $edit; ?>" method="post">
        <div class="main">
            <div class="main-item">
                <span>案件編號:<?php echo $fileid; ?>
            </div>
            <div class="main-item">
                <span>
                    案件狀況:
                    <input type="radio" name="filesituation" value="申請" <?php if($filesituation=='申請'){ echo "checked=checked";}  ?>checked>申請
                    <input type="radio" name="filesituation" value="補件" <?php if($filesituation=='補件'){ echo "checked=checked";}  ?>>補件
                    <input type="radio" name="filesituation" value="初審退件" <?php if($filesituation=='初審退件'){ echo "checked=checked";}  ?>>初審退件
                    <input type="radio" name="filesituation" value="複審退件" <?php if($filesituation=='複審退件'){ echo "checked=checked";}  ?>>複審退件
                    <input type="radio" name="filesituation" value="撤銷案件" <?php if($filesituation=='撤銷案件'){ echo "checked=checked";}  ?>>撤銷案件
                    <input type="radio" name="filesituation" value="案件消失" <?php if($filesituation=='案件消失'){ echo "checked=checked";}  ?>>案件消失
                    <input type="radio" name="filesituation" value="初審合格" <?php if($filesituation=='初審合格'){ echo "checked=checked";}  ?>>初審合格
                    <input type="radio" name="filesituation" value="複審合格" <?php if($filesituation=='複審合格'){ echo "checked=checked";}  ?>>複審合格
                </span>
            </div>
            <div class="main-item">
                <span>
                    登打狀況:
                    <input type="radio" name="filepaper" value="尚未看過" <?php if($filepaper=='尚未看過'){ echo "checked=checked";}  ?>checked>尚未看過
                    <input type="radio" name="filepaper" value="已看完紙本(未登打)" <?php if($filepaper=='已看完紙本(未登打)'){ echo "checked=checked";}  ?>>已看完紙本(未登打)
                    <input type="radio" name="filepaper" value="已登打" <?php if($filepaper=='已登打'){ echo "checked=checked";}  ?>>已登打
                </span>
            </div>
            <div class="main-item">
                <span>
                    等待情形:
                    <input type="radio" name="filewait" value="無" <?php if($filewait=='無'){ echo "checked=checked";}  ?>checked>無
                    <input type="radio" name="filewait" value="等戶政" <?php if($filewait=='等戶政'){ echo "checked=checked";}  ?>>等戶政
                    <input type="radio" name="filewait" value="等財稅" <?php if($filewait=='等財稅'){ echo "checked=checked";}  ?>>等財稅
                    <input type="radio" name="filewait" value="課稅明細表" <?php if($filewait=='課稅明細表'){ echo "checked=checked";}  ?>>課稅明細表
                    <input type="radio" name="filewait" value="協議中" <?php if($filewait=='協議中'){ echo "checked=checked";}  ?>>協議中
                    <input type="radio" name="filewait" value="重複申請" <?php if($filewait=='重複申請'){ echo "checked=checked";}  ?>>重複申請
                </span>
            </div>
            <div class="main-item">
                <span>
                    補件狀況:
                    <input type="radio" name="filecheck" value="不用補件" <?php if($filecheck=='不用補件'){ echo "checked=checked";}  ?>>不用補件
                    <input type="radio" name="filecheck" value="需補件" <?php if($filecheck=='需補件'){ echo "checked=checked";}  ?>>需補件(記得key補正大表)
                </span>
            </div>
            <div class="main-item">
                <span>
                    發文狀況:
                    <input type="radio" name="sendtxtsituation" value="不用發文" <?php if($sendtxtsituation=='不用發文'){ echo "checked=checked";}  ?>checked>不用發文
                    <input type="radio" name="sendtxtsituation" value="等待發文" <?php if($sendtxtsituation=='等待發文'){ echo "checked=checked";}  ?>>等待發文
                    <input type="radio" name="sendtxtsituation" value="已發文" <?php if($sendtxtsituation=='已發文'){ echo "checked=checked";}  ?>>已發文
                    <input type="radio" name="sendtxtsituation" value="補正完成" <?php if($sendtxtsituation=='補正完成'){ echo "checked=checked";}  ?>>補正完成
                </span>
            </div>
            <div class="main-item">
                <span>
                    漏開補正:
                    <input type="radio" name="fileerror" value="無" <?php if($fileerror=='無'){ echo "checked=checked";}  ?>checked>無
                    <input type="radio" name="fileerror" value="有" <?php if($fileerror=='有'){ echo "checked=checked";}  ?>>有
            </div>
        </div>
        <div class="submit">
            <span>
                <input type="submit" name="update" value="更新">
                <input type="hidden" id="date" name="date">
                <input type="hidden" id="lastupdater" name="lastupdater">
            </span>
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
            // document.getElementById('date').value = Date();
        </script>
    </form>
</body>

</html>

<!-- 更新資料後寫法 -->
<?php
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $filesituation_update = $_POST['filesituation'];
    $filepaper_update = $_POST['filepaper'];
    $filewait_update = $_POST['filewait'];
    $filecheck_update = $_POST['filecheck'];
    $sendtxtsituation_update = $_POST['sendtxtsituation'];
    $date = $_POST['date'];
    $fileerror_update = $_POST['fileerror'];
    $lastupdater = $_SESSION['user'];

    $update = "UPDATE 住補總表 SET filesituation = '$filesituation_update', filepaper = '$filepaper_update', filewait = '$filewait_update', filecheck = '$filecheck_update' ,sendtxtsituation='$sendtxtsituation_update',time = '$date'
    ,lastupdater = '$lastupdater', fileerror = '$fileerror_update'
     WHERE id = '$id'";

    $run_update = mysqli_query($connect, $update);
    if ($run_update) {
        echo '<script>window.location.href="search.html";</script>';
    } else {
        echo "<script>alert('更新失敗!!!')</script>";
    }
}

?>