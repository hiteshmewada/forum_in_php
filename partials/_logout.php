<?php
    session_start();
    echo "Logging you out.... Wait for some time.........";
    session_destroy();
    header('Location: /forum_in_php/index.php');
?>