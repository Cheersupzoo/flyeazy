<?php
$pdo = require_once 'connect.php';

$Email = $_POST['Email'];
$Password = $_POST['Password'];
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$MobilePhone = $_POST['MobilePhone'];
$Passport = $_POST['Passport'];

// insert a single publisher
$sql = ' INSERT INTO public."User" ("Email","Password","FName","LName", "Phone", "Passport") VALUES (:Email,:Password,:FName,:LName, :Phone, :Passport)';

$statement = $pdo->prepare($sql);

$statement->bindParam(':Email', $Email);
$statement->bindParam(':Password', $Password);
$statement->bindParam(':FName', $FirstName);
$statement->bindParam(':LName', $LastName);
$statement->bindParam(':Phone', $MobilePhone);
$statement->bindParam(':Passport', $Passport);
$statement->execute();

$tester_id = $pdo->lastInsertId();

// echo 'The tester id ' . $tester_id . ' was inserted';
if($tester_id) {
    header("Location: ./signin.php");
}