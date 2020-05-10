<?php
    if(isset($_POST['dangxuat'])){
        setcookie("siteAuth", "", time() - 3600);
        header('location:index.php');//chuyền qua trang index neu out thanh cong
    }
?>