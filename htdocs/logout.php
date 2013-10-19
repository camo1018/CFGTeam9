<?php
    //ends the session and logs out
    session_start();
    session_destroy();
    header('Location: index.php');
?>
