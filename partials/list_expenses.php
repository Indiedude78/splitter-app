<?php
if (!is_logged_in()) {
    die();
}
?>

<dl>
    <?php if ($result && isset($result)) : ?>
        <?php foreach ($result as $r) : ?>
            <dt><?php //echo $r["amount"]; 
                ?></dt>
            <dd><?php //echo "--" . $r["for"]; 
                ?></dd>
            <dd><?php //echo "added by: --- " . $r["fname"] . " " . mb_substr($r["lname"], 0, 1); 
                ?></dd>
        <?php endforeach; ?>
    <?php endif; ?>
</dl>

<dl id="expense-list">

</dl>
<p id="total-amount"></p>