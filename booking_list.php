<?php
include 'init.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Booking List | FlyEazy</title>
    <?php
    include 'head.php'
    ?>

    <?php
    include './components/isAuth.php'
    ?>

    <?php

    $pdo = require 'connect.php';
    $sql = 'SELECT *, "FlightCode".fiid "FlightCode", to_char("DateFrom" ,\'HH:MI am DD Mon YYYY\') "DateFromF" FROM "Booking","FlightCode","Flight","Airline" WHERE uid=' . $_SESSION['uid'] . ' AND "Flight".fid="Booking".fid AND "Flight".fiid="FlightCode".fiid AND "Airline".aid="FlightCode".aid ORDER BY "DateFrom" DESC';

    $statement = $pdo->query($sql);
    $bookings = $statement->fetchAll(PDO::FETCH_ASSOC);

    $seatConv = array(1 => "A", 2 => "B", 3 => "C", 4 => "D", 5 => "E", 6 => "F", 7 => "G", 8 => "H", 9 => "I");


    ?>

    <link href="./index.css" rel="stylesheet" />

    <style>
        body {
            background-color: #e9ecef;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
            text-align: center !important;
        }

        .bg {
            height: 100%;
            background-image: url("./assets/signinbg.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            filter: blur(2px);
            -webkit-filter: blur(2px);
            z-index: -1;
        }

        .bg-text {
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/opacity/see-through */

            position: absolute;
            inset: 0;
        }

        .decorator {
            font-size: 0.8rem;
        }

        .login-button {
            background-color: #17E1CE;
            border-color: #17E1CE;
        }

        .login-button:hover {
            background-color: #07cbb8;
            border-color: #07cbb8;
        }
    </style>

</head>

<body>
    <div class="d-flex flex-column" style="height: 100vh">
        <?php
        include 'components/header.php'
        ?>
        <div class=" d-flex flex-column flex-grow-1 position-relative">
            <div class="bg"></div>
            <div class="bg-text">
                <div class="mx-auto bg-white" style="max-width: 800px; margin-top: 120px;">

                    <div class="d-flex  flex-column p-4">

                        <h2 class="text-center mb-2">Booking List</h2>
                        <table class="table">
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">ID</th>
                                    <th scope="col">From</th>
                                    <th scope="col">To</th>
                                    <th scope="col">Flight</th>
                                    <th scope="col">Departure</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($bookings as $booking) {
                                    switch ($booking["Status"]) {
                                        case 'PAYMENT PENDING':
                                            $status = 0;
                                            break;
                                        case 'NEED RESERVE SEAT':
                                            $status = 1;
                                            break;
                                        case 'COMPLETE':
                                            $status = 2;
                                            break;
                                        case 'FLEW':
                                            $status = 3;
                                            break;

                                        default:
                                            # code...
                                            break;
                                    }


                                    echo '<tr class="table-secondary">';
                                    echo '<td class="fw-bold">' . $booking["bid"] . '</td>';
                                    echo '<td scope="row">' . $booking["FromPlace"] . '</td>';
                                    echo '<td>' . $booking["ToPlace"] . '</td>';
                                    echo '<td>' . $booking["FlightCode"] . '</td>';
                                    echo '<td>' . $booking["DateFromF"] . '</td>';
                                    echo '<td>';
                                    echo    '<span>' . $booking["Status"] . '</span>';
                                    if ($status == 0) {
                                        echo '<a href="./payment.php?bid=' . $booking["bid"] . '" class="btn btn-warning">Payment</a>';
                                    } elseif ($status == 2) {
                                        echo '<a href="./checkin.php?bid=' . $booking["bid"] . '" class="btn btn-info">Check-In</a>';
                                    }
                                    echo '</td>';

                                    echo '</tr>';
                                    echo '<tr style="border-bottom: 4px solid #81ed98;">';
                                    echo '<td></td>';
                                    echo '<td scope="row">';
                                    echo '<div>Class: ' . $booking["cabinClass"] . '</div>';
                                    if ($status == 1) {
                                        echo '<div>Seat: <a href="./seat.php?bid=' . $booking["bid"] . '" class="btn btn-light">Reserve Seat</a></div>';
                                    } else if ($status > 1) {
                                        echo '<div>Seat: ';
                                        $sql = 'SELECT * FROM "Ticket" WHERE bid=' . $booking["bid"];
                                        $statement = $pdo->query($sql);
                                        $seats = $statement->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($seats as $seat ) {
                                            echo $seatConv[$seat["ColumnSeat"]];
                                            echo $seat["RowSeat"];
                                            echo " ";
                                        }
                                        echo '</div>';
                                    }
                                    echo '</td>';
                                    echo '<td>Operated by: ' . $booking["AirlineName"] . '</td>';
                                    echo '<td></td>';
                                    echo '<td></td>';
                                    echo '<td>';
                                    if($status > 0) {
                                        echo '<a href="./receipt.php?bid=' . $booking["bid"] . '" class="btn btn-light"> <img src="./assets/receipt.png" height="32px" /></a>';
                                    }
                                    echo '</td>';
                                }

                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'components/footer.php'
        ?>
    </div>
    </div>
</body>

</html>