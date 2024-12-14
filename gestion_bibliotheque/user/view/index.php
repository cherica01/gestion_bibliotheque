<?php
session_start();
include('../controller/connection.php');
if(isset($_REQUEST['login_btn']))
{
    $uname = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);
    $upwd = md5($password);
    
    $select_query = mysqli_query($conn, "select user_name, id from tbl_users where emailid='$uname' and password='$upwd' and role=2 and status=1");
    $username = mysqli_fetch_row($select_query);
    if(!empty($username))
    {
        $_SESSION['user_name'] =  $username[0]; 
        $_SESSION['id'] = $username[1];
    }
    $rows = mysqli_num_rows($select_query);
    
    if($rows > 0)
    {
       header("Location:dashboard.php"); 
    }
    else
    { ?>
    <script>
        alert("Vous avez entré un email ou un mot de passe incorrect.");
    </script>
    <?php
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Système de Gestion de Bibliothèque</title>
    <!-- Polices personnalisées pour ce modèle-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Styles personnalisés pour ce modèle-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/custom_style.css?ver=1.1" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
</head>

<body class="bg-dark" style="background: url(img/bubu.jpg) no-repeat;  background-size:cover">

  <div class="container">
    <div class="card card-login mx-auto mt-5" style="background-color: brown;">
      <div class="card-header">
        <h2><center style="color:white;">Connexion Utilisateur</center></h2>
      </div>
      <div class="card-body">
        <form name="login"  method="post" action="">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Adresse e-mail" required="required" autofocus="autofocus">
              <label for="inputEmail">Adresse e-mail</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" name="pwd" required="required">
              <label for="inputPassword">Mot de passe</label>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" name="login_btn" value="Se connecter">
        </form>
      </div>
    </div>
  </div>
</body>
</html>
