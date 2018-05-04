
<?php
        session_start();
        
        
        if(!empty($_POST)){
            $_SESSION["username"] = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
            $_SESSION["colour"] = filter_var($_POST["colour"], FILTER_SANITIZE_STRING);
            $_SESSION["animal"] = filter_var($_POST["animal"], FILTER_SANITIZE_STRING);
        }
        
        if(!empty($_SESSION)){
            echo "Welcome ". $_SESSION['username']."<br>";
            echo 'Your favourite colour is '. $_SESSION['colour']."<br>";
            echo 'Your favourite animal is '. $_SESSION['animal'].'<br>';
            echo '<a href="SessionPostPage2.php">Go to page 2</a><br>';
        }
   
        ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="#" method="post">
            Username: <input type="text" name="username" autocomplete="on"/>
            Password: <input type="password" name="password" />
            Colour: <input type="text" name="colour" autocomplete="on"/> 
            Animal: <input type="text" name="animal" autocomplete="on"/> 
            <input type="submit" value="Login" />
        </form>       

    </body>

</html>




