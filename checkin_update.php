<?php
ob_start();
session_start();

$pdo = require_once 'connect.php';

$sql = 'UPDATE public."Booking"
SET "Status" = \'FLEW\'
WHERE bid =' . $_GET["bid"];

$statement = $pdo->prepare($sql);
$statement->execute();

$sql = 'UPDATE public."Ticket"
SET "CheckInStatus" = true
WHERE bid = ' . $_GET["bid"];
$statement = $pdo->query($sql);


header('location: ./booking_list.php');
die;
