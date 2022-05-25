$(document).ready(function() {
    $curr_user_display = $("#curr-users");
    $curr_total_amount = $("#total-amount");
    $expense_list = $("#expense-list");

    function realTimeUpdate() {
        $.ajax({
            url: "api/getpartyinfo.php",
            type: "GET",
            datatype: "json",
            success: function(data) {

                //console.log(data.expenses);
                $curr_user_display.text("Total Members: " + data.usercount["usercount"]);
                $curr_total_amount.text("Current Total: " + data.total["total_amount"]);


            }
        });
    }
    setInterval(realTimeUpdate, 2000);

    $.ajax({
        url: "api/getpartyinfo.php",
        type: "GET",
        datatype: "json",
        success: function(data) {

            console.log(data.expenses.length);
            for (let i = 0; i < data.expenses.length; ++i) {
                $expense_list.append('<dt>' + data.expenses[i]["amount"] + '</dt>');
                $expense_list.append('<dd>' + '--' + data.expenses[i]["for"] + '</dd>');
                $expense_list.append('<dd>' + 'added by: ---' + data.expenses[i]["fname"] + '</dd>');
            }
        }
    });
});