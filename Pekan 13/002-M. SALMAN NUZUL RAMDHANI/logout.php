<?php
session_start();
session_destroy();
setcookie('remember_user', '', time() - 3600); // hapus cookie
header("Location: login.php");
exit();
?>
