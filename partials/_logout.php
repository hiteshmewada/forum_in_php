<?php
    session_start();
    echo "Logging you out.... Wait for some time.........";
    session_destroy();
    header('Location: http://hforum-hitesh.42web.io/index.php');
?>