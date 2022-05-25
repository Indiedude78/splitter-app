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
    $query3 = "SELECT Expenses.user_id, Expenses.amount, `for`, Users.fname, Users.lname, date(Expenses.created) as cur_date FROM Expenses JOIN Users ON Expenses.user_id = Users.id WHERE party_id = :pid";
    $params = array(":pid" => $p_id);
    $usercount = get_data($query, $params);
    $total_amount = get_data($query2, $params);
    $list_expenses = get_data($query3, $params);

    $result["usercount"] = $usercount[0];
    $result["total"] = $total_amount[0];
    $result["expenses"] = $list_expenses;

    echo json_encode($result, JSON_PRETTY_PRINT);
}
