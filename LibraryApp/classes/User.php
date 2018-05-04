<?php

namespace classes;

include "/Applications/XAMPP/xamppfiles/htdocs/NetBeansProjects/LibraryApp/classes/autoloader.php";

abstract class User {

    protected $firstName;
    protected $lastName;
    protected $dob;
    protected $firstLine;
    protected $city;
    protected $county;
    protected $postCode;
    protected $phone;
    protected $dateJoined;
    protected $username;
    protected $password;

    public function __construct($firstName, $lastName, $dob, $firstLine, $city, $county, $postCode, $phone, $dateJoined, $username, $password) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dob = $dob;
        $this->firstLine = $firstLine;
        $this->city = $city;
        $this->county = $county;
        $this->postCode = $postCode;
        $this->phone = $phone;
        $this->dateJoined = $dateJoined;
        $this->username = $username;
        $this->password = $password;
    }

    protected function connect() {
        $dsn = "mysql:host=localhost; dbname=books_library";
        $user = 'admin';
        $password = "adm1n";
        try {
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die ("Oops! Failed to connect.... " . $e->getMessage());
        }
        return $pdo;
    }

    public function showName() {
        return $this->firstName . ' ' . $this->lastName . "\n";
    }

    public function showdob() {
        return $this->dob;
    }

    public function showAddress() {
        return $this->firstLine . "\n" . $this->city . "\n" . $this->county . "\n" . $this->postCode . "\n";
    }

    public function showPhone() {
        return $this->phone . "\n";
    }

    public function showDateJoined() {
        return $this->dateJoined . "\n";
    }

    public function changeAddress($firstLine, $city, $county, $postCode) {
        $this->firstLine = $firstLine;
        $this->city = $city;
        $this->county = $county;
        $this->postCode = $postCode;
    }

    public function changePhone(int $new) {
        $this->phone = $new;
    }

    public function changeUsername($new) {
        $this->username = $new;
    }

    public function changePassword($new) {
        $this->password = $new;
    }

}
