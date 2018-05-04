
<!DOCTYPE html>
<html>
    
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans|Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" href="database.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1 class="title">Welcome to the 'GIT' Library</h1>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3_jAO4N9h6nu7Mb60J-iNSloylUWI3LzoY7_grTVTyH8V4iTijQ" class="headerimage" class="img-responsive" alt="Entrance to library">
    <h1 class="instructions">Click below to login</h1>
    <a href="LoginPage.php">
       <button type="button" class="btn btn-secondary btn-lg btn-block">ENTER HERE</button>
    </a>
    <br>
    <h2 class="instructions">Alternatively, do a quick check of book location and availability below</h2>

    <br>

    <form action="index.php" method="post">
        <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationServer01">Author First Name</label>
              <input type="text" class="form-control" id="validationServer01" placeholder="First name" name="authorfirstname">
            </div>

            <div class="col-md-4 mb-3">
              <label for="validationServer02">Author Last Name</label>
              <input type="text" class="form-control" id="validationServer02" placeholder="Last name" name="authorlastname">
            </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="validationServer03">Book Title</label>
            <input type="text" class="form-control" id="validationServer03" placeholder="Title" name="booktitle">
          </div>

          <div class="col-md-3 mb-3">
            <label for="validationServer04">Category</label>
            <input type="text" class="form-control" id="validationServer04" placeholder="Category" name="category">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>  
    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">No. copies</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
          </tr>
        </thead>
        <tbody>
            <?php
            const DB_DSN = 'mysql:host=localhost; dbname=books_library';
            const DB_USER = 'root';

            try {
                $pdo = new PDO(DB_DSN, DB_USER);
            }   catch (PDOException $e) {
                    DIE($e->GetMessage());
            }

            if (empty($_POST)){
                print "Submit a search to show available books";
            } else {
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->prepare(
                    "SELECT * FROM book b"
                        . " JOIN author a on a.id = b.author_id"
                        . " JOIN category c on c.id = b.category_id"
                        . " WHERE a.first_name =:authorfirstname"
                        . " OR a.last_name =:authorlastname"
                        . " OR b.title =:booktitle"
                        . " OR c.category =:category"
                );

                try {
                        $stmt->execute($_POST);
                    }   catch (PDOException $e) {
                        echo $e->getMessage();
                        $error = $e->errorInfo();
                        die();
                    }

                $bookSearchResults = $stmt->fetchAll();

                if (count($bookSearchResults) > 0) {  
                  foreach ($bookSearchResults as $book)
                    print "<tr>"
                            . "<td>" . $book['title'] . "</td>"
                            . "<td>" . $book['copies'] . "</td>"
                            . "<td>" . $book['first_name'] . " " . $book['middle_name'] . " " . $book['last_name'] . "</td>"
                            . "<td>" . $book['category'] . "</td>"
                        . "</tr>";
                } else {
                    print "no books with the search above";
                }               
            }
            ?> 
        </tbody>
    </table>
</body>

</html>

