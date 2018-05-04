<?php
        session_start();
        
        session_unset();
        /*if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),"",time()-3600,"/");
        }*/
        session_destroy();
        

        if (empty($_SESSION)) {
            echo "Welcome Guest! Please login. " . '<br><br>';
        }
        ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <form action="SessionPostPage1.php">
            <button type="submit" > Login</button>
        </form> 

    </body>
</html>
