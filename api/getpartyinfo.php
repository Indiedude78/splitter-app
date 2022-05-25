<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
?>
<?php
require_once(__DIR__ . "/../lib/helpers.php");
$p_id = get_party_id();
if (isset($p_id)) {
    $query = "SELECT COUNT(user_id) as usercount FROM PartyUsers WHERE party_id = :pid";
    $query2 = "SELECT SUM(amount) as total_amount FROM Expenses WHERE party_id = :pid";
    $params = array(":pid" => $p_id);
    $usercount = get_data($query, $params);
    $total_amount = get_data($query2, $params);

    $result["usercount"] = $usercount[0];
    $result["total"] = $total_amount[0];

    echo json_encode($result, JSON_PRETTY_PRINT);
}
