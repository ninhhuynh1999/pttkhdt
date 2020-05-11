<?php
 if(!isset($_SESSION)){
    session_start() ;
}
    if(isset($_POST['dangxuat'])){

        setcookie("siteAuth", "", time() - 3600);
        unset($_COOKIE['siteAuth']);
        session_destroy();
        header('location:index.php');//chuyền qua trang index neu out thanh cong
    }
?>