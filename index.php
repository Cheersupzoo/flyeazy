<?php
include 'init.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>FlyEazy</title>
    <?php
    include 'head.php'
    ?>
    <link href="./index.css" rel="stylesheet"/>

    <style>
        html {
            height: 100%;
        }

        .cloud {
            height: 100%;
            background-image: url("./assets/cloud.png");
            background-size: cover;
        }

        body {
            background-color: gray;
        }
    </style>
</head>

<?php
$pdo = require 'connect.php';

$sql = 'SELECT * FROM "Airport"';

$statement = $pdo->query($sql);
$airports = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<body>


<div class="d-flex flex-column" style="height: 100vh">
    <?php
    include 'components/header.php'
    ?>
    <div class=" d-flex flex-column flex-grow-1">
        <div class=" px-4 cloud flex-shrink d-table " style="padding-top: 120px; padding-bottom: 240px;">
            <div class="mx-auto d-table " style="max-width: 1000px; ">

                <div class="bgColor text-white  d-inline-block py-2 px-3 ">
                    <div class="d-flex">
                        <img src="./assets/planeIcon.png" alt="planeIcon" style="width: 25px; object-fit: contain;"/>
                        <div class="ps-2" style="font-size: 18px;">FLIGHT</div>
                    </div>
                </div>
                <div class="bgColor px-5 "
                     style="border-radius: 0px 30px 30px 30px; padding-top: 40px; padding-bottom: 50px;">
                    <form action="booking.php" method="post">
                        <div class="d-flex flex-wrap">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tripType" id="flexRadioDefault1"
                                       value="round" disabled>
                                <label class="form-check-label text-white" for="flexRadioDefault1">
                                    Round Trip
                                </label>
                            </div>
                            <div class="form-check ms-3">
                                <input class="form-check-input" type="radio" name="tripType" id="flexRadioDefault2"
                                       checked value="one">
                                <label class="form-check-label text-white" for="flexRadioDefault2">
                                    One Way
                                </label>
                            </div>
                            <div class="form-check ms-3">
                                <input class="form-check-input" type="radio" name="tripType" id="flexRadioDefault2"
                                       value="multi" disabled>
                                <label class="form-check-label text-white" for="flexRadioDefault2">
                                    Multi-City
                                </label>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap">

                            <div class="d-flex flex-column mt-2">
                                <div class="text-white">From</div>

                                <select class="form-control" name="from" required>
                                    <?php
                                    foreach ($airports as $airport) {
                                        echo "<option value='" . $airport["apid"] . "'>" . $airport["Title"] . " (" . $airport["Code"] . ")</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="d-flex flex-column ms-md-3 mt-2">
                                <div class="text-white">To</div>
                                <select class="form-control" name="to" required>
                                    <?php
                                    foreach ($airports as $airport) {
                                        echo "<option value='" . $airport["apid"] . "'>" . $airport["Title"] . " (" . $airport["Code"] . ")</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="d-flex flex-column ms-md-3 mt-2">
                                <div class="text-white">Cabin Class</div>
                                <select class="form-select" name="cabinClass">
                                    <option value="First">First</option>
                                    <option value="Business">Business</option>
                                    <option selected value="Economy">Economy</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap">

                            <div class="d-flex flex-column mt-2">
                                <div class="text-white">Departure</div>
                                <input type="date" class="form-control" name="departure" required>
                            </div>
                            <div class="d-flex flex-column ms-md-3 mt-2">
                                <div class="text-white">Return</div>
                                <input type="date" class="form-control" name="return" disabled>
                            </div>
                            <div class="d-flex flex-column ms-md-3 mt-2">
                                <div class="text-white">Seat</div>
                                <input type="number" class="form-control" name="adult" min="0" max="8" value="2">
                            </div>
                            <div class="d-flex flex-column ms-md-3 mt-2">

                                <button type="submit" class="mt-auto btn btn-danger bgSec"
                                        style="border-color: #FFA9A9;">SEARCH FLIGHT
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>


        </div>
        <div id="brandLogo" class="carousel slide" data-bs-ride="carousel"
             style="background-color: #F3F3F3; width:100vw">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex flex-warp justify-content-center" style="gap: 32px">
                        <img src="./assets/airlines/emirates.png" class="d-inline my-auto" alt="..."
                             style="height: 70px;">
                        <img src="./assets/airlines/ana.png" class="d-block my-auto" alt="..." style="height: 30px;">
                        <img src="./assets/airlines/airasia.svg" class="d-block my-auto" alt="..."
                             style="height: 25px;">
                        <img src="./assets/airlines/thai-airways.png" class="d-block my-auto" alt="..."
                             style="height: 32px;">
                        <img src="./assets/airlines/asiana.svg" class="d-block my-auto" alt="..."
                             style="height: 120px;">
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#brandLogo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#brandLogo" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <?php
    include 'components/footer.php'
    ?>
</div>

</body>

</html>