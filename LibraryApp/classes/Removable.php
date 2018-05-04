<?php
namespace classes;
interface Removable{
public function removeBook($authorFirstName, $authorLastName, $title, $publishDate, $category, $copies);
public function removeMember($firstName, $lastName, $dob, $firstLine, $city, $county, $postCode, $phone, $dateJoined, $username, $password);
}

