<?php
namespace classes;

interface Addable{
    public function addNewMember($firstName, $lastName, $dob, $firstLine, $city, $county, $postCode, $phone, $dateJoined, $username, $password);
    public function addNewBook($authorFirstName, $authorLastName, $title, $publishDate, $category, $copies);
    
}

