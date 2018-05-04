<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="POST">
            <input type="text" name="choice"/>
            <input type="submit" value="PLAY"/>
        </form>
        <?php
        if (!empty($_REQUEST)){
            $choice = strtolower($_REQUEST['choice']);
            include "GameFunctions.php";
            playGame($choice);
        }
        ?>
    </body>
</html>
