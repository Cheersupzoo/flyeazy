<?php
$valid = isset($_SESSION["valid"]);

echo <<<HTML
    
    <header class="p-2 " style="background-color: #0A5F72;">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="./index.php" class="nav-link px-2 link-secondary"><img style="height: 55px;" src="/flyeazy/flyeazy-logo.png" alt="logo"/></a></li>

                </ul>

                <ul class="nav col-12 col-lg-auto  mb-2 justify-content-center mb-md-0 fw-bolder">
                    <li><a href="./index.php" class="nav-link px-2 link-light ">HOME</a></li>
                    <!-- <li><a href="/contract.php" class="nav-link px-2 link-light">CONTRACT</a></li> -->

HTML;
if (!$valid) {
    echo <<<HTML
                    <li><a href="./signin.php" class="nav-link px-2 link-light">SIGN IN/SIGN UP</a></li>
HTML;
}

if ($valid) {
    echo <<<HTML

                    <li>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle text-white fw-bold" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
         HTML;
    echo  $_SESSION['FName'];
    echo <<<HTML
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="./booking_list.php">Booking List</a></li>
                                <li><a class="dropdown-item" href="./signout.php">Sign Out</a></li>
                            </ul>
                        </div>
                    </li>
HTML;
}


echo <<<HTML

                </ul>

                
            </div>
        </div>
    </header>
    
    HTML;
