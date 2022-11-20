<?php
include 'init.php'
?>

<?php
$isPost = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isPost = true;

    $pdo = require 'connect.php';
    $username = $_POST["email"];
    $password = $_POST["password"];

    $sql = 'SELECT * FROM "User" as u WHERE u."Email" = ? and u."Password" = ?';

    $statement = $pdo->prepare($sql);
    $statement->execute([$username,$password]);
    $testers = $statement->fetchAll();

    if ($testers) {
        // echo "Login Sucessfully";
        $_SESSION['valid'] = true;
        foreach ($testers as $tester) {
            $_SESSION['FName'] = $tester['FName'];
            $_SESSION['LName'] = $tester['LName'];
            $_SESSION['uid'] = $tester['uid'];
        }


        header('location: ./index.php');
        die;
    } else {
        // echo "Wrong Username or Password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>FlyEazy</title>
    <?php
    include 'head.php'
    ?>
    <?php
    if (isset($_SESSION["valid"])) {
        header('location: ./');
    }
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
                <div class="mx-auto " style="max-width: 300px; padding-top: 120px; ">

                    <div class="bgColor text-white" style="border-radius: 16px 16px 0px 0px; padding-top: 10px; padding-bottom: 10px;text-align:center">
                        Sign In
                    </div>
                    <div class="px-4 py-5 bg-white" style="border-radius: 0px 0px 16px 16px;">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" id="formGroupExampleInput" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" id="formGroupExampleInput2" placeholder="Password" required>
                            </div>

                            <div class="d-flex">
                                <div class="checkbox ">
                                    <label>
                                        <input type="checkbox" value="remember-me"> <span class="decorator my-auto">Remember me</span>
                                    </label>
                                </div>
                                <div class="ms-auto decorator ">Forgot Password?</div>
                            </div>
                            <div class="d-grid mt-4"><button type="submit" class="btn btn-success login-button shadow rounded-pill"><strong>LOGIN</strong></button></div>
                            <div class="text-center decorator mt-4">New User? <a href="./signup.php" class="text-black text-decoration-underline">Create new account</a></div>

                            <?php if ($isPost) : ?>
                                <div class="text-center text-danger mt-2">Wrong Username or Password</div>
                            <?php endif; ?>
                        </form>
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