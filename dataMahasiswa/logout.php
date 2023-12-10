<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('user', '', time() - 3600);
setcookie('key', '', time() - 3600);

header("Location: loginForm.php");
exit;
?>