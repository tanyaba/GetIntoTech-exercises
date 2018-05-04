<?php
namespace classes;

class Book {

    protected $authorFirstName;
    protected $authorLastName;
    protected $title;
    protected $publishDate;
    protected $category;
    protected $copies;

    public function __construct($authorFirstName, $authorLastName, $title, $publishDate, $category, $copies) {
        $this->authorFirstName = $authorFirstName;
        $this->authorLastName = $authorLastName;
        $this->title = $title;
        $this->publishDate = $publishDate;
        $this->category = $category;
        $this->copies = $copies;
    }
    
    public function showTitle() {
        return $this->title . "\n";
    }
    public function showAuthor() {
        return $this->authorFirstName . " " . $this->authorLastName . "\n";
    }
    public function showPublishDate(){
        return $this->publishDate;
    }
    public function showCategory() {
        return $this->category;
    }
    public function showCopies(){
        return $this->copies;
    }
    public function changeCopies($num){
        $this->copies=$num;
    }
    

}
/*
$bfg= new Book("Roald", "Dahl", "The BFG", "12/12/1977", "children", 4);
echo $bfg->showTitle();
$matilda = new Book("Roald", "Dahl", "Matilda", "12/12/1977", "children", 4);
echo $matilda->showTitle();
 */
