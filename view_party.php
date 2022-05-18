<?php
require_once(__DIR__ . "/partials/heading.php");
if (!is_logged_in()) {
    die();
}

if (isset($_GET["id"])) {
    $pid = $_GET["id"];
    $db = getDB();
    $query = "SELECT Party.id, party_name, creator_id, PartyUsers.user_id FROM Party JOIN PartyUsers ON Party.id = PartyUsers.party_id WHERE Party.party_id = :party_num";
    $stmt = $db->prepare($query);
    $params = array(":party_num" => $pid);
    $r = $stmt->execute($params);
    $e = $stmt->errorInfo();
    if ($e[0] = "00000") {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result["user_id"] != get_user_id()) {
            echo "You do not have permission to view this page";
        }
    }
}
?>
<h3><?php echo $result["party_name"]; ?></h3>