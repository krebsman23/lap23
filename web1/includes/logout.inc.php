<?php
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
Header("Location: ..//index.php");
die;
?>
