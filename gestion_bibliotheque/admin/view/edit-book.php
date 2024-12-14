<?php
session_start();
include('../../user/controller/connection.php');
$id = $_SESSION['id'];
$name = $_SESSION['name'];
if (empty($id)) {
    header("Location: index.php");
}
$id = $_GET['id'];
$fetch_query = mysqli_query($conn, "SELECT * FROM tbl_book WHERE id='$id'");
$row = mysqli_fetch_array($fetch_query);
if (isset($_REQUEST['save-book-btn'])) {

    $book_name = $_POST['book_name'];
    $category_name = $_POST['category_name'];
    $author_name = $_POST['author_name'];
    $quantity = $_POST['quantity'];
    $availability = $_POST['availability'];

    $update_book = mysqli_query($conn, "UPDATE tbl_book SET book_name='$book_name', category='$category_name', author='$author_name', quantity='$quantity', availability='$availability' WHERE id='$id'");

    if ($update_book > 0) {
?>
<script type="text/javascript">
    alert("Livre mis à jour avec succès.");
    window.location.href='view-book.php';
</script>
<?php
    }
}
?>
<?php include('include/header.php'); ?>
<div id="wrapper">
<?php include('include/side-bar.php'); ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Fil d'Ariane -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Modifier le livre</a>
                </li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-info-circle"></i>
                    Modifier les détails
                </div>

                <form method="post" class="form-valide">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="item">Nom du livre <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" name="book_name" id="book_name" class="form-control" placeholder="Entrez le nom du livre" required value="<?php echo $row['book_name']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="leave-type">Catégorie <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <select class="form-control" id="category_name" name="category_name" required>
                                    <option value="">Sélectionner la catégorie</option>
                                    <?php 
                                    $fetch_category = mysqli_query($conn, "SELECT * FROM tbl_category WHERE status=1");
                                    while ($rows = mysqli_fetch_array($fetch_category)) {
                                    ?>
                                    <option <?php if ($rows['category_name'] == $row['category']) { ?> selected="selected"; <?php } ?>><?php echo $rows['category_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="price">Auteur <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" name="author_name" id="author_name" class="form-control" placeholder="Entrez le nom de l'auteur" required value="<?php echo $row['author']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="price">Quantité <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Entrez le nombre d'exemplaires" required value="<?php echo $row['quantity']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="status">Disponibilité <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <select class="form-control" id="availability" name="availability" required>
                                    <option value="">Sélectionner le statut</option>
                                    <option value="1" <?php if ($row['availability'] == 1) { ?> selected="selected"; <?php } ?>>Disponible</option>
                                    <option value="0" <?php if ($row['availability'] == 0) { ?> selected="selected"; <?php } ?>>Non disponible</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" name="save-book-btn" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php include('include/footer.php'); ?>
