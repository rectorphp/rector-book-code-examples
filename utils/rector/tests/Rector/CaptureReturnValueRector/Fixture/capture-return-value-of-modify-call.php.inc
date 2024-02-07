<?php

$dt = new DateTime();
$dt->modify('next monday');
?>
-----
<?php

$dt = new DateTime();
$dt = $dt->modify('next monday');
?>
