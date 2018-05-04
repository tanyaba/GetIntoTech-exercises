<?php

$xmlFile = simplexml_load_file("Books.xml");

foreach ($xmlFile->children() as $book){
    echo $book->title."\n";
    echo $book->author."\n"; 
    echo $book->year."\n"; 
    echo $book->price."\n";
}




echo $xmlFile->book[0]['category']."\n" ; //to  get category of first book
echo $xmlFile->book[0]->title['lang'];  //to get  language (attribute) of title of first book


//to get book category: 

foreach ($xmlFile->children() as $book){
    echo $book['category']."\n";
}
// same as:

foreach($xmlFile as $book){
    echo $book['category']."\n";
}

