<?php 
    if(!isset($_SESSION)){
        session_start() ;
    }
    include_once 'connect.php';
    $cookie_name = 'siteAuth';
    if(isset($_SESSION['username'])){
        echo "co name";

        if(isset($cookie_name)){

            if(isset($_COOKIE[$cookie_name])){

                parse_str($_COOKIE[$cookie_name]);

                $sql2="select * from account where ac_name = '$usr' and ac_pass = '$hash'";
                echo $sql2;
                $result2=mysqli_query($conn,$sql2);

                if($result2){

                    header('location:infomation.php');

                    exit;

                }

            }

        }

    }
    // else{

    //     header('location:infomation.php');//chuyển qua trang đăng nhập thành công

    //     exit;

    // }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo SSL By Ninh</title>
</head>
<body>
    <form action="dangnhap.php" method="post">
        <input name="username" type="text"      placeholder="Ten dang nhap">
        <input name="password" type="password"  placeholder="mat khau">
        <input type="checkbox"  name="remember" value="1"><label>Remember login</label>


        <input type="submit" value="dang nhap" name="submit">
    </form>
    <?php if(isset($_GET["errlogin"])) echo '<p style="color: red;"> sai ten dang nhap hoac mat khau</p>'; ?>
</body>
</html>

