<!DOCTYPE html>
<html lang="en">

<head>

    <title>FlyEazy</title>
    <?php
    include '../head.php'
    ?>

    <link href="../index.css" rel="stylesheet" />

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
        include '../components/header.php'
        ?>
        <div class=" d-flex flex-column flex-grow-1">
            <div class="bg"></div>
            <div class="bg-text">
                <div class="mx-auto " style="max-width: 300px; padding-top: 120px; ">

                    <div class="bgColorSec text-white" style="border-radius: 16px 16px 0px 0px; padding-top: 10px; padding-bottom: 10px;text-align:center">
                        Staff Sign In
                    </div>
                    <div class="px-4 py-5 bg-white" style="border-radius: 0px 0px 16px 16px;">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Password">
                        </div>

                        <div class="d-flex">
                            <div class="checkbox ">
                                <label>
                                    <input type="checkbox" value="remember-me"> <span class="decorator my-auto">Remember me</span>
                                </label>
                            </div>
                            <div class="ms-auto decorator ">Forgot Password?</div>
                        </div>
                        <div class="d-grid mt-4"><button type="button" class="btn btn-success login-button shadow rounded-pill"><strong>LOGIN</strong></button></div>
                        
                    </div>
                </div>
            </div>
        </div>
        <?php
        include '../components/footer.php'
        ?>
    </div>
    </div>
</body>

</html>