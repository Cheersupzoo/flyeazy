<?php
ob_start();
session_start();

$pdo = require_once 'connect.php';

$now = date("Y-m-d H:i:s");

$sqlP = 'SELECT "FirstSeatPrice", "BusinessSeatPrice", "EconomySeatPrice" FROM "FlightCode" WHERE fiid = (SELECT fiid from "Flight" WHERE fid=\''.$_POST['flight'].'\')';

$statement = $pdo->query($sqlP);
$prices = $statement->fetchAll(PDO::FETCH_ASSOC);

echo $prices[0]["FirstSeatPrice"];
echo $prices[0]["BusinessSeatPrice"];
echo $prices[0]["EconomySeatPrice"];

switch ($_POST['cabinClass']) {
    case 'Economy':
        $price = $prices[0]["EconomySeatPrice"] * $_POST['adult'];
        break;
    case 'Business':
        $price = $prices[0]["BusinessSeatPrice"] * $_POST['adult'];
        break;
    case 'First':
        $price = $prices[0]["FirstSeatPrice"] * $_POST['adult'];
        break;
    
    default:
        # code...
        break;
}

echo $price;



$sql = 'INSERT INTO public."Booking" (bid, "Amount Ticket", "TotalPrice", "Status", uid, "CreatedDate", "cabinClass", fid) VALUES (DEFAULT, :ticket, :price, \'PAYMENT PENDING\', :uid, \'' . $now . '\', \'' . $_POST['cabinClass'] . '\', :fid)';

$statement = $pdo->prepare($sql);



$statement->bindParam(':ticket', $_POST['adult']);
$statement->bindParam(':price', $price);
$statement->bindParam(':uid', $_SESSION['uid']);
$statement->bindParam(':fid', $_POST['flight']);
$statement->execute();

$tester_id = $pdo->lastInsertId();

if ($tester_id) {
    header("Location: ./booking_list.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>uid <?php echo $_SESSION['uid']; ?></div>
    <div>flight <?php echo $_POST['flight']; ?></div>
    <div>adult <?php echo $_POST['adult']; ?></div>
    <div>cabinClass <?php echo $_POST['cabinClass']; ?></div>
    <div>now <?php echo "Today is " . date("Y-m-d H:i:s") . "<br>"; ?></div>

</body>

</html>