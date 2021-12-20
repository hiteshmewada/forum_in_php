<?php
    $showerr=false;
    $username="Hitesh";
    include '_dbconnect.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name=$_POST['loginname'];
        $pass=$_POST['loginpass'];
        $sql="select * from `users` where user_name='$name' ";
        $res=mysqli_query($con,$sql);
        $num=mysqli_num_rows($res);
        if($num==1){
            $row=mysqli_fetch_assoc($res);
            if(password_verify($pass,$row['user_pass'])){
                session_start();
                $_SESSION['user_name']=$name;
                $_SESSION['loggedin']=true;
                $_SESSION['sno']=$row['sno'];
                // $_SESSION['user_name']=$row['user_name'];
                // echo $_SESSION['sno'];
            }
            header("Location:/forum_in_php/index.php");
        }
        header("Location:/forum_in_php/index.php");
    }
?>