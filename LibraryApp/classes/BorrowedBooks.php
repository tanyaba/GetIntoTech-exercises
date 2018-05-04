<?php
include_once "/Applications/XAMPP/xamppfiles/htdocs/NetBeansProjects/LibraryApp/classes/Connector.php";

class BorrowedBooks {
    use Connector;
    private $userId;
    
    public function __construct($id) {
        $this->userId=$id;
    }
    
    public function showBorrowedBooks(){
        $pdo= $this->connect();
        $sql="SELECT book.title, author.first_name, author.last_name, borrowing.due_date, borrowing.fine FROM ((book "
                . "INNER JOIN author ON book.author_id=author.ID)"
                . "INNER JOIN borrowing ON borrowing.book_id=book.ID )"
                . "WHERE borrowing.user_id= :id";
        try{
            $stmt=$pdo->prepare($sql);
            $stmt->execute(['id'=> $this->userId]);
            while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                echo '<tr><th>'.$row["title"]."</th><td>".$row["first_name"]." ".$row["last_name"]."</td><td>".$row["due_date"]."</td><td>".$row["fine"]."</td></tr>";
            }
        } catch (PDOException $e){
            echo 'Could not retrieve data.....'.$e->getMessage();
        }
    }
    
}

