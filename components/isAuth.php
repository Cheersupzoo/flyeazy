<?php
    $valid = isset($_SESSION["valid"]);
    if(!$valid) {
        header("Location: ./");
    }
