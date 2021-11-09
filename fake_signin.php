<?php
ob_start();
session_start();
?>
<?php
$_SESSION['valid'] = true;

header('location: ./');
                die;
?>