<?php
if (!is_logged_in()) {
    die();
}
?>
<h5>Send a message:</h5>
<form id="comment-form" class="form" method="POST" autocomplete="off">
    <textarea id="comment-input" name="comment" rows="1" cols="50"></textarea>
    <input type="submit" id="comment-submit" name="enter" value="Enter" />
</form>

<?php

?>