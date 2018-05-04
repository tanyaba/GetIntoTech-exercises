<?php
//namespace classes;
//include "/Applications/XAMPP/xamppfiles/htdocs/NetBeansProjects/LibraryApp/classes/autoloader.php";
include "/Applications/XAMPP/xamppfiles/htdocs/NetBeansProjects/LibraryApp/classes/Connector.php";

class Borrowing {
    use Connector;
    private $member;
    private $book;
    private $borrowedDate;
    private $dueDate;
    private $returnDate;

    public function __construct(Member $member, Book $book) {
        $this->member = $member;
        $this->book = $book;
        $this->borrowedDate = date("m . d . Y");
    }
    

    public function setDueDate() {
        //return due date from Procedures in database
    }

    public function setReturnDate() {
        $this->returnDate = date("m . d . Y");
    }
    
    public function showMember(){
        return $this->member->showName();
    }
    public function showBook(){
        return $this->book->showTitle()." ".$this->book->showAuthor();
    }
    public function showBorrowedDate(){
        return $this->borrowedDate;
    }
    public function showDueDate(){
        return $this->dueDate;
    }
    public function showReturnDate(){
        return $this->returnDate;
    }

}

$mem= new Member('Tanya', "B", "12.10.2009","12 dell rise", "St Albans", "Herts", "al2l2", '07858484', "12.12.2009", "dhgfhd", "sdjhfdjk", "member");
$bfg= new Book("Roald", "Dahl", "The BFG", "12/12/1977", "children", 4);
$bor= new Borrowing($mem, $bfg);
$bor->setDueDate();
$bor->setReturnDate();
echo $bor->showMember()." ".$bor->showBook()." ".$bor->showBorrowedDate()." return date: ".$bor->showReturnDate();

