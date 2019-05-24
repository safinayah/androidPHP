<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $servername = "localhost";
        $username = "ws_user";
        $password = "A-h-4...59";
        $dbname = "ws";

        try {
            $mysqli = new mysqli($servername, $username, $password, $dbname);
            $mysqli->set_charset("utf8mb4");
            $name = $_POST['name'];
            $size =  $_POST['size'];
            $descreption = $_POST['descreption'];
            $stmt = $mysqli->prepare("INSERT INTO pizza (name, size,descreption) VALUES (?,?,?)");
            $stmt->bind_param("sss", $name,$size,$descreption );
            error_log($name);
            error_log($size);
            error_log($descreption);


            $stmt->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Error connecting to database'); //Should be a message a typical 20ser could understand
        }


        $stmt->close();
        ?>

    </body>
</html>
