<?php
$pdo = require_once 'connect.php';

$Email = $_POST['Email'];
$Password = $_POST['Password'];
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$MobilePhone = $_POST['MobilePhone'];

// insert a single publisher
$sql = " INSERT INTO User (Email,Password,FirstName,LastName,MobilePhone) 
VALUES ('".$Email."','".$Password."','".$FirstName."','".$LastName."','".$MobilePhone."')";

$statement = $pdo->prepare($sql);

$statement->bindParam(':Email', $Email);
$statement->bindParam(':Password', $Password);
$statement->bindParam(':FisrtName', $FirstName);
$statement->bindParam(':LastName', $LastName);
$statement->bindParam(':MobilePhone', $MobilePhone);
$statement->execute();

$tester_id = $pdo->lastInsertId();

echo 'The tester id ' . $tester_id . ' was inserted';