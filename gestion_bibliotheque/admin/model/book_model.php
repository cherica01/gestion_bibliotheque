<?php

class BookModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    
    public function getCategories() {
        $query = "SELECT * FROM tbl_category WHERE status = 1";
        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            die("Erreur dans la requête SQL : " . mysqli_error($this->conn));
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function addBook($bookData) {
        $book_name = mysqli_real_escape_string($this->conn, $bookData['book_name']);
        $category_name = mysqli_real_escape_string($this->conn, $bookData['category_name']);
        $author_name = mysqli_real_escape_string($this->conn, $bookData['author_name']);
        $quantity = (int)$bookData['quantity'];
        $availability = (int)$bookData['availability'];

        $query = "INSERT INTO tbl_book (book_name, category, author, quantity, availability) 
                  VALUES ('$book_name', '$category_name', '$author_name', '$quantity', '$availability')";

        return mysqli_query($this->conn, $query);
    }
}
