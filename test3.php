<?php
$pdo = require_once 'connect.php';

// insert a single publisher
$name = 'C';
$lastname = 'CC';
$sql = 'INSERT INTO public."Test" ( "Name", "Surname") VALUES(:Name, :Lastname)';

$statement = $pdo->prepare($sql);

$statement->bindParam(':Name', $name);
$statement->bindParam(':Lastname', $lastname);
$statement->execute();

$tester_id = $pdo->lastInsertId();

echo 'The tester id ' . $tester_id . ' was inserted';