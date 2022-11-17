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
</head>

<body>

    <div class="mb-3">
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Email">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Password">
    </div>


    <form class="row gy-1 gx-2 align-items-center">
        <div class="col-auto">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                <label class="form-check-label" for="autoSizingCheck">
                    Remember me
                </label>
            </div>
        </div>
        <div class="col-auto">
            <label class="form-check-label" for="autoSizingCheck">
                Forgot Password?
            </label>
        </div>
    </form>

    <div class="d-grid gap-2 col-3 mx-auto">
        <button class="btn btn-primary" type="button">LOGIN</button>
        <label class="lab lab-primary" type="label">New user? Create new account</label>
    </div>


    <div class="d-grid gap-2 col-3 mx-auto">
        <button class="btn btn-primary" type="button">LOGIN</button>
    </div>
    <div class="position-relative">
    <div class="position-absolute top-50 start-50 translate-middle">
        <label class="lab lab-primary" type="label">New user? Create new account</label>
    </div>


</body>

</html>