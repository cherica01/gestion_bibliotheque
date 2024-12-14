<?php
session_start();
include ('../controller/connection.php');
$name = $_SESSION['user_name'];
$ids = $_SESSION['id'];
if(empty($ids))
{
    header("Location: index.php"); 
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
            <a href="#">Voir le livre</a>
          </li>
          
        </ol>

        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            Voir les détails du livre</div>
            <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Auteur</th>
                        <th>Disponibilité</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
					<?php
                    if(isset($_GET['ids'])){
                      $id = $_GET['ids'];
                      $delete_query = mysqli_query($conn, "delete from tbl_book where id='$id'");
                      }
					$select_query = mysqli_query($conn, "select * from tbl_book where availability=1");
					$sn = 1;
					while($row = mysqli_fetch_array($select_query))
					{ 
					?>
                    <tr>
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $row['book_name']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                        <?php if($row['availability']==1){
                          ?><td><span class="badge badge-success">Disponible</span></td>
                        <?php } else { ?><td><span class="badge badge-danger">Non disponible</span></td>
                           <?php } 
                          $id = $row['id'];
                         
                          $fetch_issue_details = mysqli_query($conn, "select status from tbl_issue where user_id='$ids' and book_id='$id'");
                          $res = mysqli_fetch_row($fetch_issue_details);
                          if(!empty($res)){
                              $res = $res[0];
                          }
                          if($res==1){
                              ?>
                          <td><span class="badge badge-success">Émis</span>
                           </td>
                              <?php
                          } else if($res==2){
                              ?>
                          <td><span class="badge badge-danger">Rejeté</span>
                           </td>
                         <?php } 
                         else if($res==3){
                              ?>
                          <td><span class="badge badge-primary">Demande envoyée</span>
                           </td>
                         <?php }
                         else { ?>
                          <td><a href="../model/book-issue.php?id=<?php echo $row['id']; ?>"><button class="btn btn-success">Émettre</button></a>
                           </td>
                           <?php } ?>
                    </tr>
					<?php $sn++; } ?>
                </tbody>
              </table>
            </div>
          </div>                   
        </div>
      </div>
    </div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<?php include('include/footer.php'); ?>
<script language="JavaScript" type="text/javascript">
function confirmDelete(){
    return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?');
}
</script>
