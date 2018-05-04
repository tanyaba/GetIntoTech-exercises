<?php

//namespace classes;
//include "/Applications/XAMPP/xamppfiles/htdocs/NetBeansProjects/LibraryApp/classes/autoloader.php";
include_once "/Applications/XAMPP/xamppfiles/htdocs/NetBeansProjects/LibraryApp/classes/Connector.php";

class SearchBook {

    use Connector;

    public function searchByAll($search) {
        try {
            $pdo = $this->connect();
            $sql = "SELECT book.title, book.publish_date, book.copies, author.first_name, author.middle_name, author.last_name  FROM book "
                    . "INNER JOIN author ON book.author_id=author.ID "
                    . "WHERE author.first_name LIKE :search UNION SELECT book.title, book.publish_date, book.copies, author.first_name, author.middle_name, author.last_name  FROM book "
                    . "INNER JOIN author ON book.author_id=author.ID "
                    . "WHERE book.title LIKE :search UNION SELECT book.title, book.publish_date, book.copies, author.first_name, author.middle_name, author.last_name  FROM book "
                    . "INNER JOIN author ON book.author_id=author.ID "
                    . "WHERE author.last_name LIKE :search";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['search'=>"%".$search."%"]);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr><th>' . $row["title"] . "</th><td>" . $row["first_name"] . " ".$row["middle_name"]." ". $row["last_name"] . "</td><td> Published on " . $row["publish_date"] . "</td><td> Number of copies: " . $row["copies"] . "</td></tr>";
            }
        } catch (PDOException $e) {
            echo 'Oops. Could not get the results ...' . $e->getMessage();
        }
    }

}

