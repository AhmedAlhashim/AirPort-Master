<?php
    session_unset();
    session_destroy();
    header('Location: LogIn.php');
?>