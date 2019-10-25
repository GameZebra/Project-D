<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../shugardiary/index.php?loggedout=success");
            exit();
?>