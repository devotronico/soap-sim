<?php
ini_set("soap.wsdl_cache_enabled","0");


class Book
{
    public $name;
    public $year;
}

$server = new SoapServer("books.wsdl",[
    'classmap'=>[
        'book'=>'Book',
    ]
]);


$server->addFunction('getBook');
$server->handle();


function getBook($bookId)
{
    //simulazione di una ricerca. In un caso reale probabilmente faremo
    //una query sul database per restituire l'oggetto
    $book = new Book();
    $book->name = 'The Lord of the Rings';
    $book->year = 2017;
    return $book;
}