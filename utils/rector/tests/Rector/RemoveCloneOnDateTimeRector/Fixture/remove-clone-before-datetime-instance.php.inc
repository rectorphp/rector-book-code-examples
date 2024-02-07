<?php

$now = new DateTime();
$copy = clone $now;
?>
-----
<?php

$now = new DateTime();
$copy = $now;
?>
