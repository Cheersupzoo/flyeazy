<DOCTYPE>
    <html>

    <body>
        <?php
        $pdo = require 'connect.php';
        $username = $_POST["email"];
        $password = $_POST["password"];

        $sql = 'SELECT * FROM "User" as u WHERE u."Email" = \''.$username.'\' and u."Password" = \'' . $password .'\'';

        $statement = $pdo->query($sql);
        $testers = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($testers) {
            echo "Login Sucessfully";
        } else {
            echo "Wrong Username or Password";
        }
        ?>

    </body>

    </html>