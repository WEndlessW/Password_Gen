<?php
include "password.php";
$x = new Password;
$x->generate_pass(18, "easy");
echo $x->password, "</br>";
$x->check();


?>