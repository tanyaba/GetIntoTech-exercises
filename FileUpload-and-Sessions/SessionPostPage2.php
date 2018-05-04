<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        if (!empty($_SESSION)){
            //print_r($_SESSION);
            echo 'Your favourite colour is '.$_SESSION['colour'].'<br>';
            echo 'Your favourite animal is '. $_SESSION['animal'].'<br>';
            echo '<a href="SessionPostPage3.php">Logout</a>'.'<br>';
        }
        ?>
    </body>
</html>
