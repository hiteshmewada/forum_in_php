<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $showerr="false";
        include '_dbconnect.php';
        $user_email=$_POST['signupemail'];
        $user_pass=$_POST['signuppass'];
        $user_cpass=$_POST['signupcpass'];
        $user_name=$_POST['signupuser'];
        // check whether this email exists
        $existsql="select * from `users` where user_email='$user_email' ";
        $res=mysqli_query($con,$existsql);
        $num=mysqli_num_rows($res);
        if($num>0){
            $showerr="Email is already in  use";
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
                    header("Location: /forum_in_php/index.php?signupsuccess=true");
                    exit();
                }
            }
        }
        header("Location: /forum_in_php/index.php?signupsuccess=false,$showerr");
    }
?>