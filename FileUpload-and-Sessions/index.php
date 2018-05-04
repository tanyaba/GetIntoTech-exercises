<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="index.php" method="post" enctype="multipart/form-data" >
        <input type="hidden"  name="MAX_FILE_SIZE" value="10000000" />
        <input type="file" name="myfile" />
        <input type="submit" value="send" />
        <?php
        const InputKey = 'myfile';
//       const AllowedTypes = ['image/png'];
        const AllowedTypes = ['text/xml', 'application/xml', 'text/plain'];

        if (empty($_FILES[InputKey])) {
            die("File Missing!");
        }
        if ($_FILES[InputKey]['error'] > 0) {
            die("Handle the error!");
        }
        if (!in_array($_FILES[InputKey] ['type'], AllowedTypes)) {
            die("Handle File Type Not Allowed");
        }

        $tmpFile = $_FILES[InputKey] ['tmp_name'];
        $dstFile = 'uploads/' . $_FILES[InputKey] ['name'];

        if (move_uploaded_file($tmpFile, $dstFile)) {
            echo "File uploaded";
        } else {
            die("Handle Error!");
        }

        if (file_exists($tmpFile)) {
            unlink($tmpFile);
        }
        ?>
    </form>
</body>
</html>
<?php
/* const AllowedTypes = ['text/xml', 'application/xml', 'text/plain'];

  if (empty($_FILES[InputKey])) {
  die("File Missing!");
  }
  if ($_FILES[InputKey]['error'] > 0) {
  die("Handle the error!");
  }
  if (!in_array($_FILES[InputKey] ['type'], AllowedTypes)) {
  die("Handle File Type Not Allowed");
  } */
?>