<?php
session_start();
include ('../user/controller/connection.php');
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}
$id = $_GET['id'];
$fetch_query = mysqli_query($conn, "select * from tbl_users where id='$id'");
$row = mysqli_fetch_array($fetch_query);
if(isset($_REQUEST['sv-user']))
{
    $user_name = $_POST['user_name'];
    $emailid = $_POST['emailid'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    $update_user = mysqli_query($conn,"update tbl_users set user_name='$user_name', emailid='$emailid', role='$role', status='$status' where id='$id'");

    if($update_user > 0)
    {
        ?>
<script type="text/javascript">
    alert("Utilisateur mis à jour avec succès.");
    window.location.href='view-users.php';
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
            <a href="#">Modifier l'utilisateur</a>
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
                <label class="col-lg-4 col-form-label" for="remarks">Nom d'utilisateur <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                  <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Entrez le nom d'utilisateur" required value="<?php echo $row['user_name']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="remarks">Email <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                  <input type="email" name="emailid" id="emailid" class="form-control" placeholder="Entrez l'email" required value="<?php echo $row['emailid']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="status">Rôle <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                  <select class="form-control" id="role" name="role" required>
                    <option value="">Sélectionnez le rôle</option>
                    <option value="1" <?php if($row['role'] == 1) { ?> selected="selected"; <?php } ?>>Admin</option>
                    <option value="2" <?php if($row['role'] == 2) { ?> selected="selected"; <?php } ?>>Utilisateur</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="status">Statut <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                  <select class="form-control" id="status" name="status" required>
                    <option value="">Sélectionnez le statut</option>
                    <option value="1" <?php if($row['status'] == 1) { ?> selected="selected"; <?php } ?>>Actif</option>
                    <option value="0" <?php if($row['status'] == 0) { ?> selected="selected"; <?php } ?>>Inactif</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-8 ml-auto">
                  <button type="submit" name="sv-user" class="btn btn-primary">Enregistrer</button>
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
