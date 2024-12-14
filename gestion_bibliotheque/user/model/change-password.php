<?php
session_start();
include ('../controller/connection.php');
$name = $_SESSION['user_name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: ../view/index.php"); 
}
if(isset($_REQUEST['change-pwd']))
{
   
	$c_password = md5($_POST['c_password']);
    $n_password = $_POST['n_password'];
    $c_n_password = $_POST['c_n_password'];
    
    $select_query = mysqli_query($conn, "select password from tbl_users where id='$id'");
      $curr_pass = mysqli_fetch_assoc($select_query); 
          if($curr_pass['password']==$c_password){
          if($n_password == $c_n_password){
          $new_pwd = md5($n_password);
          $sql = "update `tbl_users` set password='$new_pwd' where id='$id' and role=2";   
          $result = mysqli_query($conn, $sql);
          if($result){
           ?>
        <script type="text/javascript">
            alert("Your Password updated successfully!")
        </script>
        <?php
        }
        }
        else
      {?>
        <script type="text/javascript">
            alert("New Password and Confirm Password do not match!")
        </script>
     <?php
      }
    }else
    {?>
        <script type="text/javascript">
            alert("Current Password do not match!")
        </script>
     <?php
    }
}
?>
<?php include('../view/include/header.php'); ?>
<div id="wrapper">
<?php include('../view/include//side-bar.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Change Password</a>
          </li>
          
        </ol>

  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            Submit Password Details</div>
             
            <form method="post" class="form-valide">
          <div class="card-body">
          <div class="form-group row">
          <label class="col-lg-4 col-form-label" for="pwd">Current Password <span class="text-danger">*</span></label>
           <div class="col-lg-6">
          <input type="password" name="c_password" id="c_password" class="form-control" placeholder="Enter Current Password" required>
           </div>
      </div>
                                         
       <div class="form-group row">
          <label class="col-lg-4 col-form-label" for="pwd">New Password <span class="text-danger">*</span></label>
           <div class="col-lg-6">
          <input type="password" name="n_password" id="n_password" class="form-control" placeholder="Enter New Password" required>
           </div>
      </div>     
                                                                            
   <div class="form-group row">
      <label class="col-lg-4 col-form-label" for="pwd">Confirm New Password <span class="text-danger">*</span></label>
       <div class="col-lg-6">
      <input type="password" name="c_n_password" id="c_n_password" class="form-control" placeholder="Confirm New Password" required>
       </div>
  </div> 
    <div class="form-group row">
        <div class="col-lg-8 ml-auto">
            <button type="submit" name="change-pwd" class="btn btn-primary">Submit</button>
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
 
 <?php include('../view/include//footer.php'); ?>