<?php
require_once(__DIR__ . "/partials/heading.php");
if (!is_logged_in()) {
    die(header("Location:index.php"));
}
include_once(__DIR__ . "/partials/nav.php");
echo '<p>Welcome ' . get_user_fullname() . '</p>';
?>

<button name="create_party" value="Create" onclick="parent.location='partials/create_party.php'">Create</button>
<h4><a href="logout.php">logout</a></h4>