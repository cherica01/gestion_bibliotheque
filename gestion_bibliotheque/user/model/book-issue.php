<?php 
session_start();
include ('../controller/connection.php');
$name = $_SESSION['user_name'];
$ids = $_SESSION['id'];
$id = $_GET['id'];
$insert_issue = mysqli_query($conn, "insert into tbl_issue set book_id='$id', user_id='$ids', user_name='$name', status=3");
if($insert_issue > 0)
{
    ?>
<script type="text/javascript">
alert("Request sent successfully.");
window.location.href="../view/book.php";
</script>
<?php
}
?>