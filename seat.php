<!DOCTYPE html>
<html lang="en">

<head>
    <?php


    ?>

    <title>FlyEazy</title>
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
        <form action="booking_list.php" class=" d-flex flex-column flex-grow-1">
            <div class="bg"></div>
            <div class="bg-text">
                <div class="mx-auto bgColor" style="max-width: 800px; margin-top: 120px;">

                    <div class="d-flex">
                        <div class="mx-4 my-5 p-2 bg-white d-flex flex-column" style="width: 30%">
                            <h3>Select Seat</h3>
                            <div>One Way</div>
                            <div>Cabin Class: Economic</div>
                            <div>Adult: 2</div>
                            <div>Children: 0</div>
                            <button type="submit" class="btn btn-primary mt-auto">Confirm</button>
                            <a href="./booking_list.php" class="btn text-black text-decoration-none">Cancel</a>
                        </div>
                        <div class="mx-4 my-5 p-2 bg-white d-flex flex-column" style="width: 70%">
                            <div style=" height:380px; overflow:auto;">
                                <table class="table table-bordered" cellspacing="0" cellpadding="1">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <?php
                                            for ($x = 10; $x <= 20; $x++) {
                                                echo '<th scope="col" style="text-transform: uppercase;">' . base_convert($x, 10, 36) . '</th>';
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        for ($i = 1; $i <= 20; $i++) {
                                            echo "<tr>";
                                            echo '<td scope="row">' . $i . '</td>';
                                            for ($x = 0; $x <= 10; $x++) {
                                                echo <<<HTML
                                                    <td scope="row"><input type="checkbox" /></td>
                                                HTML;
                                            }
                                            echo "</tr>";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
        include 'components/footer.php'
        ?>
    </div>
    </div>
</body>

</html>