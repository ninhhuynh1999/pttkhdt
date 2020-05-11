<?php
 if(!isset($_SESSION)){
    session_start();
}
?>
<?php
   
    $cookie_name = 'siteAuth';
    $cookie_time = (3600 * 24 * 30); // 30 days

    include_once "connect.php";


    // if( isset($_POST['username']) && isset($_POST['password']) ){
    //     $user=$_POST['username'];
    //     $pass=$_POST['password'];
    // //    print_r($user."+".  $pass );
    //     $sql="select * from account where ac_name = '".$user."' and ac_pass = '".$pass."'";
    //     $result = mysqli_query($conn, $sql);
    //     if (mysqli_num_rows($result) > 0) {
    //         // output data of each row
    //         while($row = mysqli_fetch_assoc($result)) {
    //             echo "id: " . $row["ac_id"]. " - Name: " . $row["ac_name"]. " " . $row["ac_pass"] ."sdt". $row[sdt]."email".$row[email].  "<br>";
                
    //         }
    //     } else {
    //         echo "0 results";
    //     }
        
    //     mysqli_close($conn);
    // }




    if(empty($_SESSION['username'])){

        if(isset($cookie_name)){

            if(isset($_COOKIE[$cookie_name])){

                parse_str($_COOKIE[$cookie_name]);

                $sql2="select * from account where ac_name = '$user' and ac_pass = '$hash'";

                $result2=mysqli_query($conn,$sql2);

                if($result2){

                    header('location:infomation.php');

                    exit;

                }

            }

        }

    }

    else{

        header('location:infomation.php');//chuyển qua trang đăng nhập thành công

        exit;

    }    


    if(isset($_POST['submit'])){

        

        $username=$_POST['username'];

        $password=$_POST['password'];
        $we=12121;


        $a_check=((isset($_POST['remember'])!=0)?1:"");

        if($username=="" || $password==""){

            echo "vui long dien day du thong tin";

            exit;

        }else{

            $sql="select * from account where ac_name = '$username' and ac_pass = '$password'";

            echo $sql;

            $result=mysqli_query($conn,$sql);
            echo "11";

            if(mysqli_num_rows($result) == 0){

                echo "loi cau truy van";
                header('location:index.php?errlogin=1');//chuyền qua trang đăng nhập thành công
                exit;

            }

            $row = mysqli_fetch_assoc($result);

            $f_user=$row['ac_name'];

            $f_pass=$row['ac_pass'];
          //  echo "wewewe". $f_pass ."+". $f_user;

            if($f_user==$username && $f_pass==$password){

                $_SESSION['username']=$f_user;

                $_SESSION['password']=$f_pass;

                if($a_check==1){

                    setcookie ($cookie_name, 'usr='.$f_user.'&hash='.$f_pass, time() + $cookie_time);

                }

                header('location:infomation.php');//chuyền qua trang đăng nhập thành công

                exit;


            }

        }

    }

    

?>