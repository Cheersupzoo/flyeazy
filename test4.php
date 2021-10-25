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

    $sql = 'SELECT * 
		FROM public."Test"';

    $statement = $pdo->query($sql);


    $testers = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($testers) {

        echo "<table>";
        foreach ($testers as $tester) {
            echo "<tr>";
            echo "<td>" . $tester['id'] . "</td>";
            echo "<td>" . $tester['Name'] . "</td>";
            echo "<td>" . $tester['Surname'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>

</html>