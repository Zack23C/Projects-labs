<?php
    session_start();
    session_destroy();
    header("main_login.php");
