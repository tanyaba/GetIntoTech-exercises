<?php

//namespace classes;

//include "/Applications/XAMPP/xamppfiles/htdocs/NetBeansProjects/LibraryApp/classes/autoloader.php";

trait Connector {

    function connect() {
        $dsn = "mysql:host=localhost; dbname=books_library";
        $user = 'admin';
        $password = "adm1n";
        try {
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Oops! Failed to connect.... " . $e->getMessage());
        }
        return $pdo;
    }

}
