<?php
include_once(__DIR__ . "/../partials/heading.php");

?>

<form id="registration" class="form" method="POST">
    <h4>Register Here</h4>
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="fname" value="<?php if (!isset($_POST["fname"])) {
                                                            echo '';
                                                        } else {
                                                            echo $_POST["fname"];
                                                        } ?>" required />
    <br>
    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lname" value="<?php if (!isset($_POST["lname"])) {
                                                            echo '';
                                                        } else {
                                                            echo $_POST["lname"];
                                                        } ?>" required />
    <br>
    <label for="username">Username</label>
    <input type="text" id="username" name="username" value="<?php if (!isset($_POST["username"])) {
                                                                echo '';
                                                            } else {
                                                                echo $_POST["username"];
                                                            } ?>" required />
    <br>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required />
    <br>
    <label for="pass">Password</label>
    <input type="password" id="pass" name="pass" required />
    <br>
    <label for="pass2">Confirm Password</label>
    <input type="password" id="pass2" name="pass2" required />
    <br>
    <input type="submit" id="r_submit" name="submit" value="Register" />
</form>
<h4>Already registered? <a href="login.php">Log in here</a></h4>

<?php
if (isset($_POST["submit"])) {
    $fname = null;
    $lname = null;
    $username = null;
    $email = null;
    $pass = null;
    $pass1 = null;

    if (isset($_POST["fname"])) {
        $fname = $_POST["fname"];
    }

    if (isset($_POST["lname"])) {
        $lname = $_POST["lname"];
    }

    if (isset($_POST["username"])) {
        $username = $_POST["username"];
    }

    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }

    if (isset($_POST["pass"])) {
        $pass = $_POST["pass"];
    }

    if (isset($_POST["pass2"])) {
        $pass1 = $_POST["pass2"];
    }

    $isValid = true;

    if ($pass != $pass1) {
        echo "Passwords don't match";
        $isValid = false;
    }

    if (!isset($email) || !isset($username) || !isset($fname) || !isset($pass) || !isset($pass1)) {
        $isValid = false;
    }

    if ($isValid) {
        $pass_hash = password_hash($pass, PASSWORD_BCRYPT);

        $db = getDB();
        $query = "INSERT INTO Users(fname, lname, email, username, is_active, `password`) ";
        $query .= "VALUES(:fname, :lname, :email, :username, :is_active, :password)";
        $stmt = $db->prepare($query);
        $params = array(
            ":fname" => $fname,
            ":lname" => $lname,
            ":email" => $email,
            ":username" => $username,
            ":password" => $pass_hash,
            ":is_active" => 1
        );
        $r = $stmt->execute($params);
        // echo var_export($r, true);
        $e = $stmt->errorInfo();
        if ($e[0] == "00000") {
            echo "Registration Successful\n";
            echo "<h4>You can <a href=\"login.php\">login</a> now</h4>";
        } else {
            if ($e[0] == "23000") {
                echo "Email or username already exists";
            } else {
                echo "Something went wrong! Please try again <br>if the problem persists, contact the website owner";
            }
        }
    } else {
        echo "There was a validation issue. Try again.";
    }
}

?>