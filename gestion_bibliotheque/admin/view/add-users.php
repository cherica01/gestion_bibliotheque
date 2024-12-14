<?php
session_start();
include ('../../user/controller/connection.php');
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}
if(isset($_REQUEST['sbt-usr']))
{
    $user_name = $_POST['user_name'];
    $emailid = $_POST['emailid'];
    $pwd = md5($_POST['pwd']);
    $role = $_POST['role'];
    $status = $_POST['status'];

    $insert_user = mysqli_query($conn,"insert into tbl_users set user_name='$user_name', emailid='$emailid', password='$pwd', role='$role', status='$status'");

    if($insert_user > 0)
    {
        ?>
<script type="text/javascript">
    alert("Utilisateur ajouté avec succès.")
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

        <!-- Fil d'Ariane (Breadcrumbs) -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Ajouter un utilisateur</a>
          </li>
        </ol>

        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            Soumettre les détails</div>
             
            <form method="post" class="form-valide">
              <div class="card-body">
                                      
                <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="remarks">Nom d'utilisateur <span class="text-danger">*</span></label>
                  <div class="col-lg-6">
                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Entrez le nom d'utilisateur" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="remarks">Email <span class="text-danger">*</span></label>
                  <div class="col-lg-6">
                    <input type="email" name="emailid" id="emailid" class="form-control" placeholder="Entrez l'email" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="remarks">Mot de passe <span class="text-danger">*</span></label>
                  <div class="col-lg-6">
                    <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Entrez le mot de passe" required>
                  </div>
                </div>
                                  
                <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="status">Rôle <span class="text-danger">*</span></label>
                  <div class="col-lg-6">
                    <select class="form-control" id="role" name="role" required>
                      <option value="">Sélectionnez un rôle</option>
                      <option value="1">Admin</option>
                      <option value="2">Utilisateur</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="status">Statut <span class="text-danger">*</span></label>
                  <div class="col-lg-6">
                    <select class="form-control" id="status" name="status" required>
                      <option value="">Sélectionnez un statut</option>
                      <option value="1">Actif</option>
                      <option value="0">Inactif</option>
                    </select>
                  </div>
                </div>
                           
                <div class="form-group row">
                  <div class="col-lg-8 ml-auto">
                    <button type="submit" name="sbt-usr" class="btn btn-primary">Soumettre</button>
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
