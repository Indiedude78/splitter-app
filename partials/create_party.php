<?php require_once(__DIR__ . "/heading.php"); ?>
<h3>Create a new party</h3>
<form id="create_party" class="form" method="post" autocomplete="off">
    <label for="party_name">Name</label>
    <input type="text" id="party_name" name="party_name" maxlength="60" required />
    <input type="submit" name="create" value="Create" id="p_submit" />
</form>

<?php
if (isset($_POST["create"])) {
    $party_id = null;
    $party_name = null;
    $user_id = null;
    if (isset($_POST["party_name"])) {
        $party_id = generate_random_number(8);
        $party_name = $_POST["party_name"];
        $user_id = get_user_id();

        if (isset($user_id) && isset($party_name)) {
            $db = getDB();
            $query = "INSERT INTO Party(party_name, party_id, creator_id) VALUES(:party_name, :party_id, :creator_id)";
            $stmt = $db->prepare($query);
            $params = array(
                ":party_name" => $party_name,
                ":party_id" => $party_id,
                ":creator_id" => $user_id
            );
            $r = $stmt->execute($params);
            $e = $stmt->errorInfo();
            if ($e[0] == "00000") {
                $query = "SELECT id FROM Party WHERE party_id = :party_num";
                $stmt = $db->prepare($query);
                $params = array(":party_num" => $party_id);
                $r = $stmt->execute($params);
                $e = $stmt->errorInfo();
                if ($e[0] != "00000") {
                    echo "Something went wrong";
                } else {
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    if (isset($result) && isset($result["id"])) {
                        $pid = $result["id"];
                        $query = "INSERT INTO PartyUsers(party_id, `user_id`, is_creator) VALUES(:pid, :userid, :is_creator)";
                        $stmt = $db->prepare($query);
                        $params = array(
                            ":pid" => $pid,
                            ":userid" => $user_id,
                            "is_creator" => 1
                        );
                        $r = $stmt->execute($params);
                        $e = $stmt->errorInfo();
                        if ($e[0] == "00000") {
                            echo "Created Party Successfully";
                            echo "<h2>Use Code: $party_id to invite people to join</h2>";
                        } else {
                            echo "Fatal Uncaught Error";
                        }
                    }
                }
            }
        }
    }
}
?>