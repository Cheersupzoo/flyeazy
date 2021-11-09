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
            width: 100%;
            height: 100%;

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
        <div class=" d-flex flex-column flex-grow-1">
            <div class="bg"></div>
            <div class="bg-text">
                <div class="mx-auto bg-white" style="max-width: 800px; margin-top: 120px;">

                    <div class="d-flex  flex-column p-4">

                        <div class="">Booking List</div>
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
                                <tr class="table-secondary">
                                    <td></td>
                                    <td scope="row">BKK</td>
                                    <td>NRT</td>
                                    <td>JAL121</td>
                                    <td>13:10 01May2021</td>
                                    <td>
                                        <span>Complete</span>
                                    </td>
                                </tr>
                                <tr style="border-bottom: 4px solid #81ed98;">
                                    <td></td>
                                    <td scope="row">
                                        <div>Class: Economy</div>
                                        <div>Seat: <a href="./seat.php" class="btn btn-light">Reserve Seat</a></div>
                                    </td>
                                    <td>Operated by: Japan Airline</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="table-secondary">
                                    <td></td>
                                    <td scope="row">BKK</td>
                                    <td>NRT</td>
                                    <td>JAL121</td>
                                    <td>15:10 05May2021</td>
                                    <td>
                                        <span>Payment Pending</span>
                                        <a href="./payment.php?bid=123" class="btn btn-warning">Payment</a>
                                    </td>
                                </tr>
                                <tr style="border-bottom: 4px solid #81ed98;">
                                    <td></td>
                                    <td scope="row">
                                        <div>Class: Economy</div>
                                        <div>Seat: A1 A2</div>
                                    </td>
                                    <td>Operated by: Japan Airline</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
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