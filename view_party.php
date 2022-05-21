<?php
require_once(__DIR__ . "/partials/heading.php");
if (!is_logged_in()) {
    echo "You do not have permission to view this page";
    die();
}

if (isset($_GET["id"])) {
    $pid = $_GET["id"];
    $uid = get_user_id();
    $db = getDB();
    $query = "SELECT Party.id, party_name, creator_id, PartyUsers.user_id, PartyUsers.is_creator FROM PartyUsers JOIN Party ON Party.id = PartyUsers.party_id WHERE Party.party_id = :party_num AND PartyUsers.user_id = :uid";
    $stmt = $db->prepare($query);
    $params = array(
        ":party_num" => $pid,
        ":uid" => $uid
    );
    $r = $stmt->execute($params);
    $e = $stmt->errorInfo();
    if ($e[0] = "00000") {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

<?php if ($result && isset($result)): ?>
    <h3><?php echo $result["party_name"]; ?></h3>
<?php endif; ?>
<?php
if (!isset($result["id"])) {
    echo "You do not have permission to view this page";
    die();
}
    $party_id = $result["id"];
    $query = "SELECT Users.fname, Users.lname, Users.username, PartyUsers.party_id, PartyUsers.user_id, PartyUsers.is_creator FROM PartyUsers JOIN Users ON Users.id = PartyUsers.user_id AND PartyUsers.party_id = :pid";
    $stmt = $db->prepare($query);
    $params = array(
        "pid" => $party_id
    );
    $r = $stmt->execute($params);
    $e = $stmt->errorInfo();
    if ($e[0] != "00000") {
        echo "Something went wrong";
    }
    else {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<ul>
<?php foreach ($result as $r): ?>
    <li><?php echo $r["username"]; ?></li>
<?php endforeach; ?>
</ul>