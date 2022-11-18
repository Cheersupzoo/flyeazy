<?php
include 'init.php';
include './components/isAuth.php';
?>

<?php
$uid = $_SESSION['uid'];

$pdo = require 'connect.php';
$sql = 'SELECT * FROM "User" WHERE uid=' . $uid;
$statement = $pdo->query($sql);
$user = $statement->fetch();
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
            <form action="UPDATE.php" method="post" class="mx-auto " style="max-width: 300px; padding-top: 120px; ">

                <div class="bgColor text-white"
                     style="border-radius: 16px 16px 0px 0px; padding-top: 10px; padding-bottom: 10px;text-align:center">
                    User Account
                </div>
                <div class="px-4 py-5 bg-white" style="border-radius: 0px 0px 16px 16px;">
                    <input type="hidden" class="form-control" name="uid" id="formGroupExampleInputUid"
                           value="<?php echo $user["uid"] ?>">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="Email" id="formGroupExampleInput"
                               placeholder="Email" value="<?php echo $user["Email"] ?>">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="Password" id="formGroupExampleInput2"
                               placeholder="Password" value="<?php echo $user["Password"] ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="FirstName" id="formGroupExampleInput3"
                               placeholder="First Name" value="<?php echo $user["FName"] ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="LastName" id="formGroupExampleInput4"
                               placeholder="Last Name" value="<?php echo $user["LName"] ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="MobilePhone" maxlength="10"
                               id="formGroupExampleInput5" placeholder="Mobile Phone"
                               value="<?php echo $user["Phone"] ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="Passport" id="formGroupExampleInput6"
                               placeholder="Passport" value="<?php echo $user["Passport"] ?>">
                    </div>


                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-success login-button shadow rounded-pill">
                            <strong>UPDATE</strong></button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <?php
    include 'components/footer.php'
    ?>
</div>
</div>
</body>

</html>