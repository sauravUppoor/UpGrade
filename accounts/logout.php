<?php

session_start();

session_destroy();

header('location:edu-login.php');

?>