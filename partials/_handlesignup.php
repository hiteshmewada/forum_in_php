<?php
include '_dbconnect.php';
    
    if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['submit'])){

        $showerr="false";
        
        $user_email=$_POST['signupemail'];
        $user_pass=$_POST['signuppass'];
        $user_cpass=$_POST['signupcpass'];
        $user_name=$_POST['signupuser'];
        //check whether this email exists
         $existsql="select * from `users` where user_name='$user_name' ";
        $res=mysqli_query($con,$existsql);
        $num=mysqli_num_rows($res);
        if($num>0){
            $showerr="Username is already in  use";
        }
        else{
            if($user_pass!=$user_cpass){
                $showerr="Password do not match";
                // header("location:/index.php?signupsuccess=false&error=$showerr");
                // exit();
            }
            else{
                $hash=password_hash($user_pass,PASSWORD_DEFAULT);
                $sql="insert into `users` (`user_email`,`user_name`,`user_pass`) values('$user_email','$user_name','$hash') ";
                $insres=mysqli_query($con,$sql);
                if($insres){
                    header("Location:http://hforum-hitesh.42web.io/");
                    exit();
                }
            }
        }
        header("Location: http://hforum-hitesh.42web.io/?signupsuccess=false,$showerr");
    }
    else {
        // echo "<script>window.location.href='google.com';</script>";?>
        // <?php
        // console.log("HELLO");
        // exit;
    }
?>