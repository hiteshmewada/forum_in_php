<?php
    // Script to connect to database
    $server="sql103.epizy.com";
    $user="epiz_31102680";
    $pass="MLwv7TEvug9u5Dx";
    $db="epiz_31102680_hforum";
    $con=mysqli_connect($server,$user,$pass,$db);

    if($con){
        ?>
        <script>
        // alert("Connected");
        </script>
        <?php
        // alert("Connected");
    }
    else{
        // int k=1;
        ?>
        <script>
        // alert("Not Connected");
        </script>
        <?php
        
    }   

    
?>