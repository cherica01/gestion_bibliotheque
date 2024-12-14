<?php
session_start();
include '../../user/controller/connection.php';
include '../model/StatisticsModel.php';

class DashboardController {
    private $model;
    private $userId;
    private $userName;

    public function __construct($dbConnection) {
        $this->model = new StatisticsModel($dbConnection);
        $this->userId = $_SESSION['id'];
        $this->userName = $_SESSION['name'];
    }

    public function checkSession() {
        if (empty($this->userId)) {
            header("Location: index.php");
            exit();
        }
    }

    public function getDashboardData() {
        return [
            'totalUser' => $this->model->getTotalUsers(),
            'totalBook' => $this->model->getTotalBooks(),
            'availableBook' => $this->model->getAvailableBooks(),
            'issuedBook' => $this->model->getIssuedBooks(),
            'returnedBook' => $this->model->getReturnedBooks()
        ];
    }
}


$controller = new DashboardController($conn);
$controller->checkSession();
$data = $controller->getDashboardData();
include '../view/dashboard.php';
?>
