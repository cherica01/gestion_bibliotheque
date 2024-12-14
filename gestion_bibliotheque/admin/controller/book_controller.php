<?php

session_start();
include('../../user/controller/connection.php');
include('../models/BookModel.php');

class BookController {
    private $model;

    public function __construct($conn) {
        $this->model = new BookModel($conn);
    }

    
    public function displayAddBookForm() {
        $categories = $this->model->getCategories();  
        include('../views/addBookForm.php');  
    }

    
    public function addBook($bookData) {
        if ($this->model->addBook($bookData)) {
            echo "<script>alert('Livre ajouté avec succès.');</script>";
        } else {
            echo "<script>alert('Erreur lors de l'ajout du livre.');</script>";
        }
    }
}


$controller = new BookController($conn);


if (isset($_POST['sbt-book-btn'])) {
    $bookData = [
        'book_name' => $_POST['book_name'],
        'category_name' => $_POST['category_name'],
        'author_name' => $_POST['author_name'],
        'quantity' => $_POST['quantity'],
        'availability' => $_POST['availability']
    ];
    $controller->addBook($bookData);
}

$controller->displayAddBookForm();
