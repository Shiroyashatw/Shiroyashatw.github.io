<?php
    // 啟動session
    session_start();
    // 設定值

    $username = $_POST["username"];
    $password = $_POST["password"];

    // 連接資料庫
    //實例化mysqli(資料庫路徑, 登入帳號, 登入密碼, 資料庫)
    $conn = new mysqli('localhost', 'root', '@Shiroyasha1132', '109住補');
    if ($conn->connect_error){
        echo '資料庫連接失敗!';
        exit(0);
    }else{
        if ($username == ''){
            echo '<script>alert("請輸入帳號名稱!");history.go(-1);</script>';
            exit(0);
        }
        if ($password == ''){
            echo '<script>alert("請輸入密碼!");history.go(-1);</script>';
            exit(0);
        }
        $sql = "select * from 住補帳密 where username = '$username' and password = '$password'" ;
        $result = $conn->query($sql);
        $number = mysqli_num_rows($result);
        if ($number) {
            $_SESSION['is_login'] = true;
            echo '<script>window.location.href="index.html";</script>';
            // header('Location: file.html');
        } else{
            $_SESSION['is_login'] = false;
            echo '<script>alert("使用者名稱或密碼錯誤!");history.go(-1);</script>';
        }
    }
?>
<?php
$_SESSION['user'] = $username;
?>