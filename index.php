<html>

<head>
    <title>Bill Splitter</title>
    <script src="jquery/jquery.js"></script>
    <script src="add_user_name.js"></script>
    <meta name="description" content="Free Bill Splitter>
        <meta name=" viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include_once(__DIR__ . "/partials/heading.php");
    if (is_logged_in()) {
        header("Location:home.php");
    }
    ?>
    <h4><a href="welcome/register.php">Register Now</a> or <a href="welcome/login.php">Log In</a></h4>

</body>

</html>