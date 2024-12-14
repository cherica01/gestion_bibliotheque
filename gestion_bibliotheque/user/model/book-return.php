<?php 
session_start();
include ('../controller/connection.php');
$name = $_SESSION['user_name'];
$ids = $_SESSION['id'];
$id = $_GET['id'];
$delete_book = mysqli_query($conn, "delete from tbl_issue where book_id='$id' and  user_id='$ids'");
$return_book = mysqli_query($conn, "insert into tbl_return set book_id='$id', user_id='$ids', user_name='$name', return_date=CURDATE()");
$select_quantity = mysqli_query($conn, "select quantity from tbl_book where id='$id'");
$number = mysqli_fetch_row($select_quantity);
$count = $number[0];
$count = $count+1;
$update_book = mysqli_query($conn, "update tbl_book set quantity='$count' where id='$id'");
$update_issue_status = mysqli_query($conn, "update tbl_issue set status=0 where book_id='$id'");
if($update_book > 0)
{
    ?>
<script type="text/javascript">
alert("Book Returned successfully.");
window.location.href="../view/issued-book.php";
</script>
<?php
}

?>