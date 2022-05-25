$(document).ready(function() {
    $curr_user_display = $("#curr-users");
    $curr_total_amount = $("#total-amount");
    $curr_data = null;

    function realTimeUpdate() {
        $.ajax({
            url: "api/getpartyinfo.php",
            type: "GET",
            datatype: "json",
            success: function(data) {

                console.log(data.usercount["usercount"]);
                console.log(data.total["total_amount"]);
                $curr_user_display.text("Total Members: " + data.usercount["usercount"]);
                $curr_total_amount.text("Current Total: " + data.total["total_amount"]);

            }
        });
    }

    setInterval(realTimeUpdate, 1000);
});