<?php
namespace classes;
include "C:\xampp\htdocs\LibraryApp\classes\autoloader.php";
include "C:\xampp\htdocs\LibraryApp\classes\Connector.php";

class Member extends User {
    use SearchTraits;

    private $borrowedBooks = [];

    public function borrowBook(...$book) {
        $this->borrowedBooks = array_merge($this->borrowedBooks, $book);
    }

    public function returnBook($book) {
        $index = array_search($book, $this->borrowedBooks);
        if ($index == 0 || $index) {
            array_splice($this->borrowedBooks, $index, 1);
        }
    }

    public function showBooks() {
        foreach ($this->borrowedBooks as $value) {
            echo "$value, ";
        }
        echo "\n";
    }
    
    public function insertNewUser($mem) {
        $pdo = $this->connect();
        $sql= "INSERT INTO `login`( `username`, `password`) VALUES";
        try {
            $pdo ->exec($sql);
            $stmt = $pdo-> prepare("
                INSERT INTO login (username, password)
                    VALUES (:username, :password)");
        $stmt->execute ([
            'username' => $_SESSION["username"],
            'password' => $_SESSION["password"],
        ]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            $error = $e->errorInfo();

        }
                
    }
    
    }
/*
$mem= new Member('Tanya', "B", "12.10.2009","12 dell rise", "St Albans", "Herts", "al2l2", '07858484', "12.12.2009", "dhgfhd", "sdjhfdjk", "member");
echo $mem->showName()."-------------\n";
echo $mem->showAddress()."-------------\n";
$mem->borrowBook("Love Gardens", "The crime", "Flowers");
echo $mem->showBooks();
$mem->returnBook("The crime");
echo $mem->showBooks();
$mem->searchByName("Roald Dahl");
$mem->searchByTitle("matilda");
*/
