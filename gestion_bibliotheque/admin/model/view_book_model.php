<?php

include('../../user/controller/connection.php');


function getAllBooks() {
    global $conn;
    $query = "SELECT * FROM tbl_book";
    $result = mysqli_query($conn, $query);
    $books = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $books[] = $row;
    }
    return $books;
}


function deleteBook($id) {
    global $conn;
    $query = "DELETE FROM tbl_book WHERE id = '$id'";
    return mysqli_query($conn, $query);
}
?>
