<?php
require_once(__DIR__ . "/partials/heading.php");
if (!is_logged_in()) {
    die(header("Location:index.php"));
}
include_once(__DIR__ . "/partials/nav.php");
echo '<p>Welcome ' . get_user_fullname() . '</p>';
?>

<button id="create_party_button" name="create_party" value="Create">Create a Party</button>
<?php include_once(__DIR__ . "/partials/create_party.php"); ?>
<button id="join_party_button" name="join_party" value="Join">Join a Party</button>
<?php include_once(__DIR__ . "/partials/join_party.php"); ?>
<div>
    <?php include_once(__DIR__ . "/partials/get_party.php"); ?>
</div>
<h4><a href="logout.php">logout</a></h4>
<script src="jquery/jquery.js"></script>
<script src="static/js/show_join.js"></script>