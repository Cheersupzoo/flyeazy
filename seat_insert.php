<?php
$seats = $_POST["seat"];
//print_r($seats);
$pdo = require_once 'connect.php';
foreach ($seats as $seat) {
    $seat = explode(" ", $seat);
//    echo $seat[0];
//    echo $seat[1];

    

    $sql = 'INSERT INTO public."Ticket" ("TicketID", "RowSeat", "ColumnSeat", "CheckInStatus", bid)
    VALUES (DEFAULT, :row, :col, false, :bid)';

    $statement = $pdo->prepare($sql);



    $statement->bindParam(':row', $seat[0]);
    $statement->bindParam(':col', $seat[1]);
    $statement->bindParam(':bid', $_POST['bid']);
    $statement->execute();
}


$sql = 'UPDATE public."Booking"
SET "Status" = \'COMPLETE\'
WHERE bid =' . $_POST["bid"];

$statement = $pdo->prepare($sql);
$statement->execute();

header('location: ./booking_list.php');