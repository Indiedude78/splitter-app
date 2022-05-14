$(document).ready(function () {
    //Dom Cache
    $splitter_form = $("#first-form");
    $num_payers = $("#payers");
    $total_people = $("#total_people");
    $submit = $("#submit");
    $name_input = $("#name-input");

    $submit.on("click", function (e) {
        e.preventDefault();

        if ($num_payers.val() > 0 && $total_people.val() > $num_payers.val()) {
            console.log("Submit clicked");
            $name_input.append("<h3>Enter names and amounts:</h3>")
            for (let i = 0; i < $total_people.val(); i++) {
                $name_input.append("<br><label for=\"person" + (i + 1) + "\"" + ">" + (i + 1) + "</label>");
                $name_input.append("<input type=\"text\" id=\"person" + (i + 1) + "\"" + ">");
                $name_input.append("<input type=\"number\" id=\"amount" + (i + 1) + "\"" + ">");
            }
            $name_input.append("<br><input type=\"button\" id=\"submit-finances\" name=\"submit-finances\" value=\"Submit\">");
        }
    });
});