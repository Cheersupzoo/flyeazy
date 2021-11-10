<!DOCTYPE html>
<html lang="en">

<head>

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
            width: 100%;
            height: 100%;

        }

        .decorator {
            font-size: 0.8rem;
        }

        .login-button {
            background-color: #15E198;
            border-color: #15E198;
        }

        .login-button:hover {
            background-color: #08DE91;
            border-color: #08DE91;
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
                <div class="mx-auto " style="max-width: 300px; padding-top: 120px; ">

                    <div class="bgColor text-white" style="border-radius: 16px 16px 0px 0px; padding-top: 10px; padding-bottom: 10px;text-align:center">
                        Sign Up
                    </div>
                    <div class="px-4 py-5 bg-white" style="border-radius: 0px 0px 16px 16px;">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="Email" id="formGroupExampleInput" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="Password" id="formGroupExampleInput2" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="FirstName" id="formGroupExampleInput3" placeholder="First Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="LastName" id="formGroupExampleInput4" placeholder="Last Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="MobilePhone" id="formGroupExampleInput5" placeholder="Mobile Phone">
                        </div>

                        
                        <div class="d-grid mt-4"><button type="button" class="btn btn-success login-button shadow rounded-pill"><strong>REGISTER</strong></button></div>
                        
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