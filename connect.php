<?php

require_once 'config.php';

function connect(string $host, string $db, string $user, string $password): PDO
{
    try {
        $dsn = "pgsql:host=$host;port=5432;dbname=$db;";

        // make a database connection
        $pdo = new PDO(
            $dsn,
            $user,
            $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        // if ($pdo) {
        //     echo "Connected to the $db database successfully!";
        // }
        return $pdo;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

return connect($host, $db, $user, $password);
