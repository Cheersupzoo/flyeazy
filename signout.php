<?php
ob_start();
session_start();
?>
<?php
unset($_SESSION['valid']);
unset($_SESSION['FName']);
unset($_SESSION['LName']);
unset($_SESSION['uid']);

header('location: ./signin.php');
die;
?>