<?php
$host = 'localhost';
//改成你登入phpmyadmin帳號
$user = 'root';
//改成你登入phpmyadmin密碼
$passwd = '@Shiroyasha1132';
//資料庫名稱
$database = '109住補';
//實例化mysqli(資料庫路徑, 登入帳號, 登入密碼, 資料庫)
$connect = new mysqli($host, $user, $passwd, $database);

if ($connect->connect_error) {
    die("連線失敗: " . $connect->connect_error);
}
// echo "連線成功";

//設定連線編碼，防止中文字亂碼
$connect->query("SET NAMES 'utf8'");
?>