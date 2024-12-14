<?php
include('../model/categorie_model.php');

class CategoryController {
    private $model;

    public function __construct($dbConnection) {
        $this->model = new CategoryModel($dbConnection);
    }

  
    public function index() {
        $categories = $this->model->getAllCategories();
        include('views/view_categories.php'); 
    }

   
    public function delete($id) {
        $this->model->deleteCategory($id);
        header('Location: index.php'); 
    }
}


$dbConnection = mysqli_connect("host", "user", "password", "database"); // Remplacez par vos informations de connexion

// Initialiser le contrôleur
$categoryController = new CategoryController($dbConnection);



if (isset($_GET['ids'])) {
    $categoryController->delete($_GET['ids']);
}

$categoryController->index();
?>
