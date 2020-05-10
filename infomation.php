<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>login thanh cong</h1>
    <?php
        $cookie_name = 'siteAuth';

            if(isset($cookie_name)){

                if(isset($_COOKIE[$cookie_name])){
    
                    parse_str($_COOKIE[$cookie_name]);
    
                  //  $sql2="select * from account where ac_name = '$usr' and ac_pass = '$hash'";
                    echo "</br> <h3>Xin chao ".$usr."</h3>";
    
                }
    
            }
    
        
    ?>
    <form action="dangxuat.php" method="post">
            <input type="submit" name="dangxuat" value="Dang xuat">
    </form>
</body>
</html>