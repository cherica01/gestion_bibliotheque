<?php
// models/BookRequestModel.php

class BookRequestModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getBookRequests() {
        $query = "SELECT tbl_issue.status, tbl_issue.book_id, tbl_book.book_name, tbl_issue.id, tbl_issue.user_name, tbl_book.quantity 
                  FROM tbl_issue 
                  INNER JOIN tbl_book ON tbl_book.id = tbl_issue.book_id";
        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            die("Erreur dans la requête SQL : " . mysqli_error($this->conn));
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
