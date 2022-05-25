<?php
if (!is_logged_in()) {
    die();
}
$db = getDB();
$query = "SELECT Expenses.user_id, Expenses.amount, `for`, Users.fname, Users.lname, date(Expenses.created) as cur_date FROM Expenses JOIN Users ON Expenses.user_id = Users.id WHERE party_id = :pid";
$stmt = $db->prepare($query);
$params = array(":pid" => $party_id);
$r = $stmt->execute($params);
$e = $stmt->errorInfo();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<dl>
    <?php if ($result && isset($result)) : ?>
        <?php foreach ($result as $r) : ?>
            <dt><?php echo $r["amount"]; ?></dt>
            <dd><?php echo "--" . $r["for"]; ?></dd>
            <dd><?php echo "added by: --- " . $r["fname"] . " " . mb_substr($r["lname"], 0, 1); ?></dd>
        <?php endforeach; ?>
    <?php endif; ?>
</dl>
<p id="total-amount"></p>