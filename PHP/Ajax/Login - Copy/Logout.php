<!-- logout.php -->
<?php
session_start();
session_destroy();
header("Location: LoginForm.php");
exit();
?>
