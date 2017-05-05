<?php require_once 'models/connectDB.php'; 
 $db = connectDb();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <title></title>
    </head>
    <body>
        <?php
        printf($db);
        ?>
    </body>
</html>
