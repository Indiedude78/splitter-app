<?php
if (!is_logged_in()) {
    die();
}
?>

<?php
$p_id = get_party_id();
$u_id = get_user_id();
if (isset($_POST["enter"])) {
    $comment = null;
    if (isset($_POST["comment"])) {
        $comment = $_POST["comment"];
    }
    $db = getDB();
    $query = "INSERT INTO Comments(comment_text, c_user_id, c_party_id) VALUES(:c_text, :cuid, :cpid)";
    $stmt = $db->prepare($query);
    $params = array(
        ":c_text" => $comment,
        ":cuid" => $u_id,
        ":cpid" => $p_id
    );
    $r = $stmt->execute($params);
    $e = $stmt->errorInfo();
    if ($e[0] != "00000") {
        echo "Could not send message";
    }
}
$query = "SELECT Comments.comment_text, Comments.c_user_id, Comments.c_party_id, DATE_FORMAT(Comments.created, '%W %m-%d %l:%i %p') as mess_time, Users.username FROM Comments JOIN Users ON c_user_id = Users.id WHERE c_party_id = :p_id";
$params = array(":p_id" => $p_id);
$messages = get_data($query, $params);

?>

<h5>Send a message:</h5>
<div id="message-box">
    <?php foreach ($messages as $m) : ?>
        <div>
            <dl>
                <dt><?php echo $m["comment_text"]; ?></dt>
                <dd><?php echo "Sent by: " . $m["username"]; ?></dd>
                <dd><?php echo "----" . $m["mess_time"]; ?></dd>
            </dl>
        </div>
    <?php endforeach; ?>
</div>
<form id="comment-form" class="form" method="POST" autocomplete="off">
    <textarea id="comment-input" name="comment" rows="1" cols="50"></textarea>
    <input type="submit" id="comment-submit" name="enter" value="Enter" />
</form>