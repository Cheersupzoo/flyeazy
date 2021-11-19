<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment | FlyEazy</title>
    <?php
    include 'head.php'
    ?>
    <?php
    include './components/isAuth.php'
    ?>
    <?php
    $pdo = require_once 'connect.php';
    $sql = 'SELECT * , "FlightCode".fiid FlightCode FROM "Booking","FlightCode","Flight","Airline"
    WHERE bid=' . $_GET["bid"] . ' AND "Flight".fid="Booking".fid AND "Flight".fiid="FlightCode".fiid AND "Airline".aid="FlightCode".aid';

    $statement = $pdo->query($sql);
    $bookings = $statement->fetchAll(PDO::FETCH_ASSOC);
    $booking = $bookings[0];

    $seatConv = array(1 => "A", 2 => "B", 3 => "C", 4 => "D", 5 => "E", 6 => "F", 7 => "G", 8 => "H", 9 => "I");
    ?>
    <link href="./index.css" rel="stylesheet" />

    <style>
        .bg-line {
            background-color: #f2fcf6;
  background-image: radial-gradient(circle, #2491a9 12%, transparent 10%), radial-gradient(circle, #2491a9 12%, transparent 10%);
  background-size: 50px 50px;
  background-position: 0 0, 50px 50px;
        }
    </style>

</head>

<body>
    <div style="display:flex; flex-direction: column; height: 100vh;" class="bg-line">
        <?php
        include 'components/header.php'
        ?>
        <div class="flex-grow-1 mx-auto">
            <div class=" bg-white py-3 px-4 mt-5 rounded shadow-lg">
                <div class="payment-title mt-3">
                    <h2 class="text-center">Self Check-in</h2>
                </div>
                <img style="width: 18rem; height: 18rem; object-fit: contain;" src="./assets/checkin.png" />
                <div class="">
                    <div>
                        <div class="m-2 mt-5 p-4 text-white bg-secondary rounded-3 text-center">
                            <h5>Booking Details</h5>
                            <div>Booking ID: <?php echo $_GET["bid"] ?></div>
                            <div>Flight: <?php echo $booking["flightcode"] ?></div>
                            <div>Airline: <?php echo $booking["AirlineFlight"] ?></div>
                            <div>Seat: <?php $sql = 'SELECT * FROM "Ticket" WHERE bid=' . $booking["bid"];
                                        $statement = $pdo->query($sql);
                                        $seats = $statement->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($seats as $seat) {
                                            echo $seatConv[$seat["ColumnSeat"]];
                                            echo $seat["RowSeat"];
                                            echo " ";
                                        } ?></div>

                        </div>
                    </div>

                </div>
                <div class="d-flex"><a href="./checkin_update.php?bid=<?php echo $booking["bid"] ?>" class="btn btn-success mx-auto px-4">Confirm</a></div>
            </div>
        </div>
        <?php
        include 'components/footer.php'
        ?>
    </div>
</body>

</html>