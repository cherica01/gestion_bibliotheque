<?php
// controllers/BookRequestController.php
session_start();
include('../../user/controller/connection.php');
include('../models/BookRequestModel.php');

class BookRequestController {
    private $model;

    public function __construct($conn) {
        $this->model = new BookRequestModel($conn);
    }


    public function displayRequests() {
        $requests = $this->model->getBookRequests();
        include('../views/viewRequests.php');
    }
}


if (empty($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}


$controller = new BookRequestController($conn);
$controller->displayRequests();
