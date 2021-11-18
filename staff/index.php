<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment | FlyEazy</title>
    <?php
    include '../head.php'
    ?>

    <?php
    $valid = isset($_SESSION["valids"]);
    if(!$valid) {
        header("Location: ./signin.php");
    }

    $pdo = require_once '../connect.php';
    $sql = 'SELECT * FROM "Airline" WHERE aid = (SELECT aid FROM "Staff" WHERE sid=' . $_SESSION["sid"] . ')';

    $statement = $pdo->query($sql);
    $airlines = $statement->fetchAll(PDO::FETCH_ASSOC);
    $airline = $airlines[0];

    $sql = 'SELECT "Flight".fid,fiid, to_char("DateFrom" ,\'HH:MI am DD-MM-YYYY\') "DateFromf", CASE WHEN count IS NULL THEN 0 ELSE count END countf FROM "Flight"
    LEFT JOIN (SELECT "Flight".fid, COUNT(*) count FROM "Flight","Booking","Ticket" WHERE fiid in (SELECT fiid from "FlightCode" WHERE aid='.$airline["aid"].')
                                                and "Flight".fid="Booking".fid
                                                AND "Ticket".bid="Booking".bid
    GROUP BY "Flight".fid) fl on fl.fid="Flight".fid
    WHERE fiid in (SELECT fiid from "FlightCode" WHERE aid='.$airline["aid"].')
    ORDER BY "DateFrom" DESC';

    $statement = $pdo->query($sql);
    $flights = $statement->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <link href="../index.css" rel="stylesheet" />
    <style>
        .bg-line {
            background-image: url("data:image/svg+xml,<svg id='patternId' width='100%' height='100%' xmlns='http://www.w3.org/2000/svg'><defs><pattern id='a' patternUnits='userSpaceOnUse' width='100' height='100' patternTransform='scale(2) rotate(0)'><rect x='0' y='0' width='100%' height='100%' fill='hsla(0,0%,100%,1)'/><path d='M19.95-15.33L18.32-.68 16.7 13.97l13.5-5.92 13.5-5.91L31.82-6.6zM62 68.18l21.15-23.32 9.62 29.98zm2.64-.85l26.08 5.64-8.15-25.4zm-44.7 17.42l-1.63 14.64-1.63 14.66 13.5-5.92 13.5-5.92-11.87-8.73z'  stroke-width='1' stroke='none' fill='hsla(141, 68%, 72%, 1)'/><path d='M96.78 82.3a3.74 3.74 0 104.93-5.65 3.74 3.74 0 00-5.3.37 3.76 3.76 0 00.37 5.28zm-47.2-69.69l3.44-.23-.23-3.45-3.44.24zm-3.37 45.7a1.5 1.5 0 002.1-.15 1.5 1.5 0 00-.14-2.1 1.5 1.5 0 00-2.1.15 1.5 1.5 0 00.14 2.1zm24.66-45.06A8.5 8.5 0 1082.07.43a8.5 8.5 0 10-11.2 12.82zM-3.3 82.3a3.74 3.74 0 104.93-5.65 3.74 3.74 0 00-5.29.37 3.76 3.76 0 00.36 5.28zm74.17 31.03a8.5 8.5 0 1011.2-12.82 8.5 8.5 0 10-11.2 12.82zm6.34-78.02c-2.44.5-5.05-.5-7.13-2.7-.28-.3-.43-.68-.41-1.1a1.5 1.5 0 011.56-1.46c.4 0 .78.17 1.06.47 1.37 1.45 2.9 2.1 4.33 1.8 1.41-.28 2.58-1.47 3.28-3.35 1.06-2.84 3.08-4.77 5.52-5.26 2.44-.5 5.05.5 7.13 2.7.54.57.56 1.43.06 2.02l-.12.13c-.6.57-1.57.54-2.14-.07-1.37-1.45-2.9-2.1-4.32-1.8-1.42.28-2.6 1.47-3.29 3.35-.92 2.46-2.54 4.22-4.55 4.97-.32.14-.64.24-.98.3zm8.64-9.5c1.73-.34 3.56.4 5.15 2.08a.63.63 0 00.94-.03c.2-.24.2-.6-.03-.83-1.87-1.98-4.17-2.87-6.3-2.43-2.14.43-3.91 2.15-4.86 4.7-.82 2.17-2.22 3.55-3.95 3.91-1.73.35-3.56-.38-5.15-2.07a.62.62 0 00-1.08.41c-.01.17.05.32.17.45 1.87 1.98 4.17 2.87 6.3 2.43 2.14-.43 3.91-2.15 4.87-4.7.7-1.89 1.85-3.18 3.28-3.72.2-.08.43-.15.66-.2zM39.33 79.5c.54 0 1-.4 1.07-.96.32-2.86-.55-5.34-2.39-6.8-1.83-1.45-4.44-1.72-7.15-.74-2.03.73-3.84.58-5.11-.41-1.26-1-1.82-2.73-1.58-4.87a1.08 1.08 0 00-.94-1.2 1.08 1.08 0 00-1.19.95c-.32 2.87.54 5.35 2.38 6.8 1.84 1.45 4.44 1.72 7.15.75 2.04-.73 3.85-.58 5.12.41 1.25 1 1.82 2.73 1.57 4.87a1.08 1.08 0 001.07 1.2z'  stroke-width='1' stroke='none' fill='hsla(208, 100%, 76%, 1)'/><path d='M6.7 27.57l18.65-5.83 5.84 18.64-18.65 5.84zm17.68-3.97l-15.8 4.96 4.94 15.8 15.81-4.95zm78.1-33.38l-9.04 3.62 3.62 9.05 9.04-3.62zm3.68 67.2l-9.67 2.99.57 1.86 9.67-3zM55.35 89.61l.7 1.74 12.14-4.87-.7-1.74zm5.28-48.27l1.32-.91-12.24-17.66-1.32.92zM2.4-9.78l-9.04 3.62 3.62 9.04L6.02-.74zm3.68 67.2l-9.67 3 .57 1.85 9.67-2.99zm96.4 32.88l-9.05 3.62 3.62 9.04 9.04-3.62zM2.4 90.3l-9.05 3.62 3.63 9.04 9.04-3.62z'   stroke-width='1' stroke='none' fill='hsla(199, 83%, 62%, 1)'/></pattern></defs><rect width='800%' height='800%' transform='translate(0,0)' fill='url(%23a)'/></svg>")
        }
    </style>

</head>

<body>
    <div style="display:flex; flex-direction: column; " class="bg-line">
        <?php
        include '../components/header_staff.php'
        ?>
        <div class="flex-grow-1 mx-auto">
            <div class=" bg-white py-2 px-4 mt-3 mb-5 rounded shadow-lg">
                <div class="payment-title mt-3">
                    <h2 class="text-center">Status</h2>
                </div>
                <div class="d-flex flex-wrap ">
                    <div>
                        <div class="m-2 mt-5 p-4 text-white bg-secondary rounded-3">
                            <h5>Airline Details</h5>
                            <div>Name: <?php echo $airline["AirlineName"] ?></div>
                            <div>Flight Code: <?php echo $airline["AirlineFlight"] ?></div>
                            <div>Website: <?php echo $airline["Website"] ?></div>

                        </div>
                    </div>
                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-warning">
                                    <th scope="col">#</th>
                                    <th scope="col" style="text-transform: uppercase;">Flight</th>
                                    <th scope="col" style="text-transform: uppercase;">Depart</th>
                                    <th scope="col" style="text-transform: uppercase;">Seats</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($flights as $flight ) {
                                    echo "<tr>";
                                    echo '<td scope="row">' . $flight["fid"] . '</td>';
                                    echo '<td scope="row">' . $flight["fiid"] . '</td>';
                                    echo '<td scope="row">' . $flight["DateFromf"] . '</td>';
                                    echo '<td scope="row">' . $flight["countf"] . '</td>';
                                    
                                    echo "</tr>";
                                }
                                    
                                
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include '../components/footer.php'
        ?>
    </div>
</body>

</html>