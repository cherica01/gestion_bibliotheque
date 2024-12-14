<?php
include('../../user/controller/connection.php');
class CategoryModel {
    private $connection;

    public function __construct($dbConnection) {
        $this->connection = $dbConnection;
    }

    // Récupérer toutes les catégories
    public function getAllCategories() {
        $query = "SELECT * FROM categories";
        return mysqli_query($this->connection, $query);
    }

    // Autres méthodes pour ajouter, modifier et supprimer des catégories pourraient aller ici
    // Par exemple, pour ajouter une catégorie
    public function addCategory($categoryName, $status) {
        $query = "INSERT INTO categories (category_name, status) VALUES ('$categoryName', '$status')";
        return mysqli_query($this->connection, $query);
    }

    // Méthode pour supprimer une catégorie
    public function deleteCategory($id) {
        $query = "DELETE FROM categories WHERE id = '$id'";
        return mysqli_query($this->connection, $query);
    }

    // Méthode pour obtenir une catégorie par ID
    public function getCategoryById($id) {
        $query = "SELECT * FROM categories WHERE id = '$id'";
        return mysqli_query($this->connection, $query);
    }

    // Méthode pour mettre à jour une catégorie
    public function updateCategory($id, $categoryName, $status) {
        $query = "UPDATE categories SET category_name = '$categoryName', status = '$status' WHERE id = '$id'";
        return mysqli_query($this->connection, $query);
    }
}
?>
