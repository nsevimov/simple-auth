<?php
include "vendor/autoload.php";
use app\core\Auth;

    $logoutInstance = new Auth();
    $logoutInstance->logout();
?>