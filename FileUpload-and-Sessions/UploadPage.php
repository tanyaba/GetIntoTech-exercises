<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000"/>
            <input type="file" name="myfile"/> 
            <input type="submit" name="submit" value="send" /> 
        </form>

        <?php
        if (isset($_POST['submit'])) {
            processForm();
        }
        function processForm() {
            $filetypes = ['application/xml', 'text/xml', 'application/xhtml+xml'];
            if (isset($_FILES['myfile']) && $_FILES['myfile']['error'] == 0) {
                if (!in_array($_FILES['myfile']['type'], $filetypes)) { //if wrong file type
                    die("<br>Incorrect file type.");
                }
                $tempLocation = $_FILES['myfile']['tmp_name'];
                $destination = 'uploads/' . $_FILES['myfile']['name'];
                echo $_FILES['myfile']['tmp_name'];
                if (!move_uploaded_file($tempLocation, $destination)) { //if can't move file check privelegies (for MACs) in finder got to the file/foleder => click=> get info 
                    die("<br>Cannot upload the file. Please try again.");
                } 
                if (file_exists($tempLocation)) {
                    unlink($tempLocation);
                }
                header("Location:thanks.html");
                exit();
            } else {
                errorCheck();
            }
        }

        function errorCheck() {
            switch ($_FILES['myfile']['error']) {
                case 1:
                case 2:
                    echo"<br>The file is too big.";
                    break;
                case 4:
                    echo '<br>No file uploaded.';
                    break;
                default :
                    echo '<br>Please try again.';
            }
        }
        ?>



    </body>
</html>


