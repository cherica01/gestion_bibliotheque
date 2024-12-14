<?php
session_start();
include ('../../user/controller/connection.php');
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if(empty($id))
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
            <a href="#">Voir les demandes de prêt de livres</a>
          </li>
        </ol>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            Demandes de prêt</div>
            <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nom du livre</th>
                        <th>Nom de l'utilisateur</th>
                        <th>Quantité</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
										<?php 
										$select_query = mysqli_query($conn, "select tbl_issue.status, tbl_issue.book_id, tbl_book.book_name, tbl_issue.id, tbl_issue.user_name, tbl_book.quantity from tbl_issue inner join tbl_book on tbl_book.id=tbl_issue.book_id");
										$sn = 1;
										while($row = mysqli_fetch_array($select_query))
										{ ?>
                <tr>
                    <td><?php echo $sn; ?></td>
                    <td><?php echo $row['book_name']; ?></td>
                    
                    <td><?php echo $row['user_name']; ?></td>
                    
                    <td><?php echo $row['quantity']; ?></td>
                    <?php
                    if(!empty($row['status']) && $row['status']==1)
                    {?>
                      <td><span class="badge badge-primary">Livre Émis</span>
                     </td>
                    <?php 
                    } else if($row['status']==2)
                    {?>
                    <td><span class="badge badge-danger">Rejeté</span>
                       <a href="../model/book-accept.php?id=<?php echo $row['id'];?>"><button class="btn btn-success">Accepter</button></a>
                    </td>
                   <?php } else {?>
                  <td><a href="../model/book-accept.php?id=<?php echo $row['id']; ?>"><button class="btn btn-success">Accepter</button></a>
                   <a href="../model/book-accept.php?ids=<?php echo $row['id']; ?>"><button class="btn btn-danger">Rejeter</button></a>
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

<?php include('include/footer.php'); ?>
