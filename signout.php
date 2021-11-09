<?php
ob_start();
session_start();
?>
<?php
unset($_SESSION['valid']);

header('location: ./');
die;
?>