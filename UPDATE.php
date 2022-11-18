<?php
include 'init.php';
$pdo = require_once 'connect.php';

$uid = $_POST["uid"];
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$MobilePhone = $_POST['MobilePhone'];
$Passport = $_POST['Passport'];

// insert a single publisher
$sql = 'UPDATE public."User" SET "Email"=:Email ,"Password"=:Password ,"FName"=:FName ,"LName"=:LName , "Phone"=:Phone , "Passport"=:Passport WHERE uid=' . $uid;

$statement = $pdo->prepare($sql);

$statement->bindParam(':Email', $Email);
$statement->bindParam(':Password', $Password);
$statement->bindParam(':FName', $FirstName);
$statement->bindParam(':LName', $LastName);
$statement->bindParam(':Phone', $MobilePhone);
$statement->bindParam(':Passport', $Passport);
$statement->execute();

$_SESSION['FName'] = $FirstName;
$_SESSION['LName'] = $LastName;

header("Location: ./index.php");
