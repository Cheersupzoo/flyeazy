<?php
ob_start();
session_start();

$pdo = require_once 'connect.php';

$sql = 'UPDATE public."Booking"
SET "Status" = \'NEED RESERVE SEAT\'
WHERE bid =' . $_GET["bid"];

$statement = $pdo->prepare($sql);
$statement->execute();
$prices = $statement->fetchAll(PDO::FETCH_ASSOC);

header('location: ./booking_list.php');
die;
