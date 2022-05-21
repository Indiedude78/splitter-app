<form method="POST" class="form" id="party_num_form" style="display: None;">
    <label for="party_num_input">Enter Party Number</label>
    <input type="number" id="party_num_input" name="party_num_input" maxlength="8" required />
    <input type="submit" name="submit" id="party_num_submit" value="Join" />
</form>

<?php
if (isset($_POST["submit"])) {
    $party_num = null;
    if (isset($_POST["party_num_input"])) {
        $party_num = $_POST["party_num_input"];
        $db = getDB();
        $query = "SELECT id, party_name FROM Party WHERE party_id = :party_num";
        $stmt = $db->prepare($query);
        $params = array(":party_num" => $party_num);
        $r = $stmt->execute($params);
        $e = $stmt->errorInfo();
        if ($e[0] != "00000") {
            echo "Something went wrong";
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && isset($result["id"])) {

                $pid = $result["id"];
                $pname = $result["party_name"];
                $uid = get_user_id();
                $query = "SELECT COUNT(*) as results FROM PartyUsers WHERE party_id = :pid AND user_id = :uid";
                $stmt = $db->prepare($query);
                $params = array(
                    ":pid" => $pid, 
                    ":uid" => $uid
                );
                $stmt->execute($params);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
                    if ($result["results"] < 1) {
                        $query = "INSERT INTO PartyUsers(party_id, `user_id`, is_creator) VALUES(:pid, :uid, :is_creator)";
                        $stmt = $db->prepare($query);
                        $params = array(
                            ":pid" => $pid,
                            ":uid" => $uid,
                            ":is_creator" => 0
                        );
                        $r = $stmt->execute($params);
                        $e = $stmt->errorInfo();
                        //echo var_dump($e);
                        if ($e[0] == "00000") {
                            echo "Joined " . $pname . " successfully";
                        } else {
                            echo "Could not join!";
                        }
                    }
                    else {
                        echo "Already Joined";
                    }
                
            }
        }
    }
}
?>