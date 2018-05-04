<?php
namespace classes;
include "/Applications/XAMPP/xamppfiles/htdocs/NetBeansProjects/LibraryApp/classes/autoloader.php";

Class Librarian extends Member implements Addable, Removable {

    public function checkMemberBooks(Member $member) {
        return $member->showName() . $member->showBooks();
    }

    public function checkMemberPhone(Member $member) {
        return $member->showName() . $member->showPhone();
    }

    public function checkMemberAddress(Member $member) {
        return $member->showName() . $member->showAddress();
    }

    public function checkBookStatus() {
        
    }

    public function updateMemberAddress(Member $member, $firstLine, $city, $county, $postCode) {
        return $member->changeAddress($firstLine, $city, $county, $postCode);
    }

    public function updateMemberPhone(Member $member, $phone) {
        return $member->changePhone($phone);
    }

    public function addNewMember($firstName, $lastName, $dob, $firstLine, $city, $county, $postCode, $phone, $dateJoined, $username, $password) {
        return new Member($firstName, $lastName, $dob, $firstLine, $city, $county, $postCode, $phone, $dateJoined, $username, $password);
    }

    public function addNewBook($authorFirstName, $authorLastName, $title, $publishDate, $category, $copies) {
        return new Book($authorFirstName, $authorLastName, $title, $publishDate, $category, $copies);
    }

    public function removeBook($authorFirstName, $authorLastName, $title, $publishDate, $category, $copies) {
        
    }

    public function removeMember($firstName, $lastName, $dob, $firstLine, $city, $county, $postCode, $phone, $dateJoined, $username, $password) {
        
    }

}

$HelenRed = new Member('Helen', 'Red', '12.12.1978', "10 blue street", "London", "London", "WE12 2EE", '02828387', '12.12.2000', 'HelenRed', 'psw1');
echo $HelenRed->showName();

echo "\n-----borrowing books----\n";
$HelenRed->borrowBook('Garden', 'Peppa Pig', 'The Crime');
$HelenRed->showBooks();

echo "\n-----returning books-----\n";
$HelenRed->returnBook('Garden');
$HelenRed->showBooks();

echo "\n~~~~~~~ LIBRARIAN~~~~~~~~~\n";
$lib = new Librarian('Emma', 'Hall', '16.04.1976', "23 Watford Rd", "Watford", "Watford", "WD3 2FF", '07958587', '14.10.2008', 'emmaHall', 'psw2');
echo $lib->showName();
$lib->searchByName("lalal");
echo "\n---- create new member----\n";
$TomRed = $lib->addNewMember('Tom', 'Red', '12.12.1978', "10 blue street", "London", "London borough", "WE12 2EE", '02828387', '12.12.2000', 'TRed', 'psw1');
echo $TomRed->showName() . "at address: " . $TomRed->showAddress();
echo "\n---- checking memeber's books ----\n";
echo $lib->checkMemberBooks($HelenRed);

echo "------------\n";
echo $lib->checkMemberPhone($HelenRed);

$lib->updateMemberPhone($HelenRed, "07859483");
echo "-----------\n";
echo $lib->checkMemberPhone($HelenRed);
echo "----------new book----------\n";
$bfg = $lib->addNewBook("Roald", "Dahl", "The BFG", "12/12/1977", "children", 4);
echo $bfg->Showtitle();
echo $bfg->showAuthor();
?>
    
