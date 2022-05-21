<?php 
if (!is_logged_in()) {
    die();
}
?>
<form id="add_expense" class="form" method="POST">
    <label for="expense">Amount</label>
    <input type="number" id="expense" name="expense" step="any" required/>
    <br>
    <label for="expensef_for">For</label>
    <input type="text" id="expense_for" name="for" required/>
    <br>
    <input type="submit" name="add" id="e_submit" value="Add Expense"/>
</form>
<?php  
if (isset($_POST["add"])) {
    $expense = null;
    $for = null;
    if (isset($_POST["expense"]) && isset($_POST["for"])) {
        $expense = $_POST["expense"];
        $for = $_POST["for"];
        if ($expense > 0) {
            $db = getDB();
            $query = "INSERT INTO Expenses(party_id, `user_id`, `amount`, `for`) VALUES(:pid, :uid, :expense, :for)";
            $stmt = $db->prepare($query);
            $params = array(
                ":pid" => $party_id,
                ":uid" => $uid,
                ":expense" => $expense,
                ":for" => $for
            );
            $r = $stmt->execute($params);
            $e = $stmt->errorInfo();
            if ($e[0] == "00000") {
                echo "Expense added!";
            }
            else {
                echo "Error adding expense";
            
            }
        }
    }
}
?>