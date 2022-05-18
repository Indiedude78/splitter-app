<?php
require_once(__DIR__ . "/partials/heading.php");
//remove session variables and destroy session
session_unset();
session_destroy();
echo "You have been logged out";
header("refresh:1;url=welcome/login.php");
