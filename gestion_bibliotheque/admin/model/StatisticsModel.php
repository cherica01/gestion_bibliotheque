<?php
class StatisticsModel {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function getTotalUsers() {
        $result = mysqli_query($this->conn, "SELECT COUNT(*) FROM tbl_users WHERE role = 2");
        return mysqli_fetch_row($result)[0];
    }

    public function getTotalBooks() {
        $result = mysqli_query($this->conn, "SELECT COUNT(*) FROM tbl_book");
        return mysqli_fetch_row($result)[0];
    }

    public function getAvailableBooks() {
        $result = mysqli_query($this->conn, "SELECT COUNT(*) FROM tbl_book WHERE availability = 1");
        return mysqli_fetch_row($result)[0];
    }

    public function getIssuedBooks() {
        $result = mysqli_query($this->conn, "SELECT COUNT(*) FROM tbl_issue WHERE status = 1");
        return mysqli_fetch_row($result)[0];
    }

    public function getReturnedBooks() {
        $result = mysqli_query($this->conn, "SELECT COUNT(DISTINCT book_id) FROM tbl_return");
        return mysqli_num_rows($result);
    }
}
?>
