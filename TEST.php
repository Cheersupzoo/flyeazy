<DOCTYPE>
    <html>

    <body>
        <?php
       $pdo = require 'connect.php';
       $username =$_POST["email"];
       $password =$_POST["password"];
    
        $sql = 'SELECT * FROM "User" as u WHERE user."Email" = \''.$username.'\' and u."Password" = \'' . $password .'\'';

        if ($username == u."Email" && $password == u."Password") 
        {echo "Welcome $username!";}
        else 
        {echo "INVALID";}
        ?>
    </body>

    </html>