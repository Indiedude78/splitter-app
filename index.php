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
        include_once(__DIR__ . "\partials\heading.php");
    ?>
    <form id="first-form" method="post">
        <label for="payers">Enter number of people who paid:</label>
        <br>
        <input id="payers" name="num_payers" type="number">
        <br><br>
        <label for="total_people">Enter total number of people:</label>
        <br>
        <input id="total_people" name="num_people" type="number">
        <br>
        <input id="submit" name="submit" value="Enter" type="button">
    </form>
    <div id="name-input">

    </div>

</body>

</html>