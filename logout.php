<?php
session_start();
unset($_SESSION['w3xS[:Y8hM']);
session_destroy();
header("location:index.php?logout=true");
?>
