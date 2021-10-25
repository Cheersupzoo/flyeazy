<!DOCTYPE html>
<html lang="en">

<head>

    <title>FlyEazy</title>
    <?php
    include 'head.php'
    ?>

    <style>
        body {
            background-color: #e9ecef;
        }
        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
            text-align: center!important;
        }
    </style>

</head>

<body>
    <div class="form-signin">
        <form>
           
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" data-keeper-lock-id="k-b2l7swf9t7r">
                <label for="floatingInput">Email address</label>
                <keeper-lock class="focus-visible logged-in" tabindex="0" id="k-b2l7swf9t7r" aria-label="Open Keeper Popup" role="button" style="background-image: url(&quot;chrome-extension://bfogiafebfohielmmehodmfbbebbbpei/images/ico-field-fill-lock.svg&quot;) !important; background-size: 16px 16px !important; cursor: pointer !important; width: 16px !important; position: absolute !important; opacity: 1 !important; margin-top: auto !important; min-width: 16px !important; top: 21px; left: 272px; z-index: 1; padding: 0px; animation-name: none; height: 16px !important;"></keeper-lock>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" data-keeper-lock-id="k-ox8nq1zkgq">
                <label for="floatingPassword">Password</label>
                <keeper-lock class="focus-visible logged-in" tabindex="0" id="k-ox8nq1zkgq" aria-label="Open Keeper Popup" role="button" style="background-image: url(&quot;chrome-extension://bfogiafebfohielmmehodmfbbebbbpei/images/ico-field-fill-lock.svg&quot;) !important; background-size: 16px 16px !important; cursor: pointer !important; width: 16px !important; position: absolute !important; opacity: 0 !important; margin-top: auto !important; min-width: 16px !important; top: 21px; left: 272px; z-index: 1; padding: 0px; height: 16px !important;"></keeper-lock>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
        </form>
    </div>
</body>

</html>