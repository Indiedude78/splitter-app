<?php
require_once(__DIR__ . "/partials/heading.php");
if (!is_logged_in()) {
    die(header("Location:index.php"));
}
echo 'Welcome ' . get_user_fullname();
?>
<h4><a href="logout.php">logout</a></h4>