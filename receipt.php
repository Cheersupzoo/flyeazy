<!DOCTYPE html>
<html lang="en">

<head>

    <title>FlyEazy</title>
    <?php
    include 'head.php'
    ?>
    <?php
    if (!isset($_SESSION["valid"])) {
        header('location: ./');
    }
    ?>

    <?php
    $pdo = require_once 'connect.php';
    $sql = 'SELECT * , "FlightCode".fiid FlightCode FROM "Booking","FlightCode","Flight","Airline"
    WHERE bid=' . $_GET["bid"] . ' AND "Flight".fid="Booking".fid AND "Flight".fiid="FlightCode".fiid AND "Airline".aid="FlightCode".aid';

    $statement = $pdo->query($sql);
    $bookings = $statement->fetchAll(PDO::FETCH_ASSOC);
    $booking = $bookings[0];
    ?>

    <link href="./index.css" rel="stylesheet" />



    <style>
        body {
            background-color: #D3E1E1;
        }



        .bg {
            height: 100%;
            background-color: #D3E1E1;
            z-index: -1;
        }

        .bg-text {
            position: absolute;
            inset: 0;
        }

        .receipt {
            width: 400px;
            height: 650px;
            background-color: white;
            border-radius: 30px;
            position: relative;

            left: 50%;
            transform: translateX(-50%);
            /* margin-top: -360px; */
            /* -half height and width to center */
            /* margin-left: -180px; */
            box-shadow: 14px 14px 22px -18px;
            padding: 20px
        }

        /* Heading */
        .name {
            text-transform: uppercase;
            text-align: center;
            color: #6c8b8e;
            letter-spacing: 10px;
            font-size: 1.8em;
            margin-top: 10px
        }

        /* Big thank */
        .greeting {
            font-size: 21px;
            text-transform: capitalize;
            text-align: center;
            color: #6f8d90;
            margin: 15px 0;
            letter-spacing: 1.2px
        }

        /* Order info */
        .order p {
            font-size: 13px;
            color: #aaa;
            padding-left: 10px;
            letter-spacing: .7px
        }

        /* Our line */
        hr {
            border: .7px solid #ddd;
            margin: 15px 0;
        }

        /* Order details */
        .details {
            padding-left: 10px;
            margin-bottom: 35px;
            overflow: hidden
        }

        .details h3 {
            font-weight: 400;
            color: #6c8b8e;
            font-size: 1.5em;
            margin-bottom: 15px
        }

        /* Image and the info of the order */
        .product {
            float: left;
            width: 83%
        }

        .product img {
            width: 65px;
            float: left
        }

        .product .info {
            float: left;
            margin-left: 15px
        }

        .product .info h4 {
            color: #6f8d90;
            font-weight: 400;
            text-transform: uppercase;
            margin-top: 10px
        }

        .product .info p {
            font-size: 12px;
            color: #aaa;
        }

        /* Net price */
        .details>p {
            color: #6f8d90;
            margin-top: 25px;
            font-size: 15px
        }

        /* Total price */
        .totalprice p {
            padding-left: 10px
        }

        .totalprice .sub,
        .totalprice .del {
            font-size: 13px;
            color: #aaa
        }

        .totalprice span {
            float: right;
            margin-right: 17px
        }

        .totalprice .tot {
            color: #6f8d90;
            font-size: 15px
        }

        /* Footer */
        footer {
            font-size: 10px;
            text-align: center;
            margin-top: 135px;
            /* You can make it with position try it */
            color: #aaa
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
                <div class="mx-auto " style=" padding-top: 40px; ">

                    <div class="receipt">

                        <div class="d-flex"><img class="mx-auto" style="height: 80px;" src="./flyeazy-logo-b.png" alt="logo" /></div>

                        <p class="greeting"> Thank you for booking with us! </p>

                        <!-- Order info -->
                        <div class="order">
                            <p> Transaction : <?php echo $booking["bid"] ?> </p>
                        </div>
                        <hr>
                        <!-- Details -->
                        <div class="details">
                            <h3> Details </h3>
                            <div class="product">
                                <div class="info">
                                    <h4>  <?php echo $booking["flightcode"] ?> </h4>
                                    <p>  <?php echo $booking["FromPlace"] ?>-<?php echo $booking["ToPlace"] ?> </p>
                                    <p> One Way </p>
                                </div>
                            </div>

                            <p> <?php echo $booking["TotalPrice"] ?> THB </p>
                        </div>

                        <!-- Sub and total price -->
                        <div class="totalprice">
                            <p class="sub"> Subtotal <span> <?php echo $booking["TotalPrice"] ?> THB </span></p>
                            <hr>
                            <p class="tot"> Grand Total <span> <?php echo $booking["TotalPrice"] ?> THB </span> </p>
                        </div>

                        <div class="container pt-5">
                            <div class="row">
                                <a href="./booking_list.php" class="btn btn-success col mx-2">Back</a>
                                <button id="printbtn" class="btn btn-dark col mx-2">
                                    Print
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                        <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                    </svg></button>
                            </div>
                        </div>

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
<script>
    var printbtn = document.querySelector("#printbtn");
    printbtn.addEventListener("click", (e) => {
        e.preventDefault();
        window.print();
    })
</script>

</html>