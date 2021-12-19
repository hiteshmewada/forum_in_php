<?php
    $showerr=false;
    $username="Hitesh";
    include '_dbconnect.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email=$_POST['loginemail'];
        $pass=$_POST['loginpass'];
        $sql="select * from `users` where user_email='$email' ";
        $res=mysqli_query($con,$sql);
        $num=mysqli_num_rows($res);
        if($num==1){
            $row=mysqli_fetch_assoc($res);
            if(password_verify($pass,$row['user_pass'])){
                session_start();
                $_SESSION['useremail']=$email;
                $_SESSION['loggedin']=true;
                $_SESSION['sno']=$row['sno'];
                // echo $_SESSION['sno'];
            }
            header("Location:/forum_in_php/index.php");
        }
        header("Location:/forum_in_php/index.php");
    }
?>