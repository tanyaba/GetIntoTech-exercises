<?php
include "/Applications/XAMPP/xamppfiles/htdocs/NetBeansProjects/LibraryApp/classes/BorrowedBooks.php";
include "/Applications/XAMPP/xamppfiles/htdocs/NetBeansProjects/LibraryApp/classes/SearchBook.php";
session_start();
$firstName = $_SESSION["firstName"];
$lastName = $_SESSION["lastName"];
$id = $_SESSION['id'];
$borrowed = new BorrowedBooks($id);
$searched = new SearchBook();
?>
<!DOCTYPE html>

<html>
    <head>
        <title><? echo $firstName." ".$lastName ?></title>
        <meta charset="UTF-8">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Bootstrap responsiveness-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
        <div class="container py-3">
            <a class="btn btn-link " href="firstPage.php" role="button">Logout</a>
            <h4 class="my-3 text-center"> Welcome <? echo $firstName ?> </h4>

            <h5 class="my-3 text-center">Books on loan </h5>
            <table id="borrowedBooks" class="table my-3">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Due date</th>
                        <th scope="col">Fine (£)</th>
                    </tr>
                </thead>
                <tbody>
                    <? $borrowed->showBorrowedBooks()?>

                </tbody>
            </table>
            <hr class="my-4">
            <h5 class="my-3 text-center">Search Books </h5>
            <form action="#" method="post">
                <div class="form-row">
                    <div class="col-sm-6 mb-3">
                        <label for="validationServer01">Search Book</label>
                        <input type="text" class="form-control is-valid" id="validationServer01" name="search">
                    </div>
                    
                </div>
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
            <table id="searchedBooks" class="table my-3">

                <tbody>
                    <? 
                    if(!empty($_POST["search"])){
                    $search = filter_var($_POST["search"], FILTER_SANITIZE_STRING);
                    $searched->searchByAll($search);
                    } 
                    ?>

                </tbody>
            </table>


        </div>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>


