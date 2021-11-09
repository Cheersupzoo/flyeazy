<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document1</title>
</head>

<body>
    <?php
    $pdo = require 'connect.php';
    $username = 'peem6class@hotmail.com';
    $password = 'xeezoeelover1';

    $sql = 'SELECT * FROM "User" as u WHERE u."Email" = \''.$username.'\' and u."Password" = \'' . $password .'\'';

    $statement = $pdo->query($sql);

    $testers = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($testers) {

        echo "<table>";
        foreach ($testers as $tester) {
            echo "<tr>";
            echo "<td>" . $tester['FName'] . "</td>";
            echo "<td>" . $tester['LName'] . "</td>";
            echo "<td>" . $tester['uid'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else  {
        echo "not exist";
    }
    ?>
</body>

</html>