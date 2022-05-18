<?php
require_once(__DIR__ . "/partials/heading.php");
if (!is_logged_in()) {
    die();
}

if (isset($_GET["id"])) {
    $pid = $_GET["id"];
}
