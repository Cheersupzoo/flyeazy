<?php
echo <<<HTML
    
    <header class="p-3 " style="background-color: #0A5F72;">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="./index.php" class="nav-link px-2 link-secondary"><img style="height: 55px;" src="/flyeazy/flyeazy-logo.png" alt="logo"/></a></li>

                </ul>

                <ul class="nav col-12 col-lg-auto  mb-2 justify-content-center mb-md-0 fw-bolder">
                    <li><a href="./index.php" class="nav-link px-2 link-light ">HOME</a></li>
                    <li><a href="/contract.php" class="nav-link px-2 link-light">CONTRACT</a></li>
                    <li><a href="./signin.php" class="nav-link px-2 link-light">SIGN IN/SIGN UP</a></li>
                    <li>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle text-white fw-bold" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                User...
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="./booking_list.php">Booking List</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>

                
            </div>
        </div>
    </header>
    
    HTML;
