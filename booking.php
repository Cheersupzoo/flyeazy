<?php
include 'init.php'
?>
<?php
include './components/isAuth.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $tripType = $_POST["tripType"];
    $from = $_POST["from"];
    $to = $_POST["to"];
    $cabinClass = $_POST["cabinClass"];
    $departure = $_POST["departure"];
    // $return = $_POST["return"];
    $adult = $_POST["adult"];
    // $children = $_POST["children"];

    $tripTypeReadable = "";

    switch ($tripType) {
        case "round":
            $tripTypeReadable =  "Round Trip";
            break;
        case "one":
            $tripTypeReadable =  "One Way";
            break;
        case "multi":
            $tripTypeReadable =  "Multi-City";
            break;
        default:
            echo "";
    }

    $pdo = require 'connect.php';
    $sql = 'SELECT * , to_char("DateFrom" ,\'HH:MI am\') TimeFrom, to_char("DateTo" ,\'DD Mon YYYY HH:MI am\') TimeTo  FROM "Flight", "FlightCode", "Airline" WHERE Date("DateFrom") = \'' . $departure . '\' AND "Flight".fiid = "FlightCode".fiid AND "FromPlace" = \''.$from.'\' AND "ToPlace" = \''.$to.'\'
    AND "Airline".aid = "FlightCode".aid';

    $statement = $pdo->query($sql);
    $flights = $statement->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <title>FlyEazy</title>
    <?php
    include 'head.php'
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
                <div class="mx-auto bgColor" style="max-width: 800px; margin-top: 120px;">

                    <form action="booking_insert.php" method="post" class="d-flex">
                        <div class="mx-4 my-5 p-2 bg-white d-flex flex-column" style="width: 30%">
                            <div><?php echo $tripTypeReadable; ?></div>
                            <div>Cabin Class: <?php echo $cabinClass; ?></div>
                            <div>Seat: <?php echo $adult; ?></div>
                            <input class="visually-hidden" type="text" name="adult" value=<?php echo $adult; ?> />
                            <input class="visually-hidden" type="text" name="cabinClass" value=<?php echo $cabinClass; ?> />
                            <button type="submit" class="btn btn-primary mt-auto">Confirm</button>
                            <a href="./" class="btn text-black text-decoration-none">Cancel</a>
                        </div>
                        <div class="mx-4 my-5 p-2 bg-white d-flex flex-column" style="width: 70%">
                            <div>
                                <div><?php echo $from; ?> to <?php echo $to; ?></div>
                                <div>Flying On <?php echo $departure; ?></div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Departure</th>
                                            <th scope="col">Arrival</th>
                                            <th scope="col">Airline</th>
                                            <th scope="col">Code</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($flights as $flight) {
                                            echo '<tr>';
                                            echo '<td scope="row">' . $flight['timefrom'] . '</td>';
                                            echo '<td>' . $flight['timeto'] . '</td>';
                                            echo '<td>'. $flight['AirlineFlight'] . '</td>';
                                            echo '<td>' . $flight['fiid'] . '</td>';
                                            echo '<td><input type="radio" id="flight" name="flight" value="' . $flight['fid'] . '" required /></td>';
                                            echo '</td>';
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </form>
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