<?php
ob_start();
session_start();
?>
<?php
unset($_SESSION['valids']);
unset($_SESSION['FNames']);
unset($_SESSION['sid']);

header('location: ./');
die;
?>