<?php
session_start();
include '../../user/controller/connection.php';
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}

$select_user = mysqli_query($conn,"select count(*) from tbl_users where role=2");
$total_user = mysqli_fetch_row($select_user);

$select_book = mysqli_query($conn,"select count(*) from tbl_book");
$total_book = mysqli_fetch_row($select_book);

$select_avail_book = mysqli_query($conn,"select count(*) from tbl_book where availability=1");
$avail_book = mysqli_fetch_row($select_avail_book);

$issued_book = mysqli_query($conn,"select count(*) from tbl_issue where status=1");
$issued_book = mysqli_fetch_row($issued_book);

$return_book = mysqli_query($conn,"select count(*) from tbl_return group by book_id");
$return_book = mysqli_num_rows($return_book);

?>
<?php include('include/header.php'); ?>
<div id="wrapper" style="background: url(img/bloi.jpg) no-repeat;  background-size:cover">
    <?php include('include/side-bar.php'); ?>
    <div id="content-wrapper">
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Tableau de bord</a>
          </li>
        </ol>
<div class="row">
  <div class="col-sm-4">
  <section class="panel panel-featured-left panel-featured-primary">
      <div class="panel-body total" style="background-color: #87CEEB;">
        <div class="widget-summary">
          <div class="widget-summary-col widget-summary-col-icon">
            <div class="summary-icon bg-secondary">
              <i class="fa fa-book"></i>
            </div>
          </div>
          <div class="widget-summary-col">
            <div class="summary">
              <h4 class="title">Total des livres</h4>
              <div class="info">
                <strong class="amount"><?php echo $total_book[0]; ?></strong><br>  
              </div>
            </div>
            <div class="summary-footer">
              <a class="text-muted text-uppercase"></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="col-sm-4">
  <section class="panel panel-featured-left panel-featured-primary">
      <div class="panel-body available" style="background-color: #87CEEB;">
        <div class="widget-summary">
          <div class="widget-summary-col widget-summary-col-icon">
            <div class="summary-icon bg-secondary">
              <i class="fa fa-book"></i>
            </div>
          </div>
          <div class="widget-summary-col">
            <div class="summary">
              <h4 class="title">Livres disponibles</h4>
              <div class="info">
                <strong class="amount"><?php echo $avail_book[0]; ?></strong><br>                
              </div>
            </div>
            <div class="summary-footer">
              <a class="text-muted text-uppercase"></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="col-sm-4">
   <section class="panel panel-featured-left panel-featured-primary">
      <div class="panel-body issued" style="background-color: #87CEEB;">
        <div class="widget-summary">
          <div class="widget-summary-col widget-summary-col-icon">
            <div class="summary-icon bg-secondary">
              <i class="fa fa-book"></i>
            </div>
          </div>
          <div class="widget-summary-col">
            <div class="summary">
              <h4 class="title">Livres empruntés</h4>
              <div class="info">
                <strong class="amount"><?php echo $issued_book[0]; ?></strong><br>                
              </div>
            </div>
            <div class="summary-footer">
              <a class="text-muted text-uppercase"></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="col-sm-4">
  <section class="panel panel-featured-left panel-featured-primary">
      <div class="panel-body returned" style="background-color: #87CEEB;">
        <div class="widget-summary">
          <div class="widget-summary-col widget-summary-col-icon">
            <div class="summary-icon bg-secondary">
              <i class="fa fa-book"></i>
            </div>
          </div>
          <div class="widget-summary-col">
            <div class="summary">
              <h4 class="title">Livres retournés</h4>
              <div class="info">
                <strong class="amount"><?php echo $return_book; ?></strong><br>                
              </div>
            </div>
            <div class="summary-footer">
              <a class="text-muted text-uppercase"></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="col-sm-4">
  <section class="panel panel-featured-left panel-featured-primary">
      <div class="panel-body user" style="background-color: #87CEEB;">
        <div class="widget-summary">
          <div class="widget-summary-col widget-summary-col-icon">
            <div class="summary-icon bg-secondary">
              <i class="fa fa-user"></i>
            </div>
          </div>
          <div class="widget-summary-col">
            <div class="summary">
              <h4 class="title">Total des utilisateurs</h4>
              <div class="info">
                <strong class="amount"><?php echo $total_user[0]; ?></strong><br>                 
              </div>
            </div>
            <div class="summary-footer">
              <a class="text-muted text-uppercase"></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
</div>
</div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <?php include('include/footer.php'); ?>
