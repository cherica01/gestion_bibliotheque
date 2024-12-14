<?php 
include ('../controller/connection.php');
if(!empty($_GET['id'])){
$id = $_GET['id'];
$duedate = date('Y-m-d');
$newdate = date('Y-m-d', strtotime($duedate. ' + 3 months'));
$update_issue = mysqli_query($conn, "update tbl_issue set status=1, issue_date=CURDATE(), due_date='$newdate' where id='$id'");

$select_book_id = mysqli_query($conn,"select book_id from tbl_issue where id='$id'");
$book_id = mysqli_fetch_row($select_book_id);
$book_id = $book_id[0];
$select_quantity = mysqli_query($conn, "select quantity from tbl_book where id='$book_id'");
$number = mysqli_fetch_row($select_quantity);
$count = $number[0];
$count = $count-1;
$update_book = mysqli_query($conn, "update tbl_book set quantity='$count' where id='$book_id'");
if($update_issue > 0)
{
?>
<script type="text/javascript">
alert("Lasa iny boky iny !!.");
window.location.href="../view/issue-request.php";
</script>
<?php
}
}
if(!empty($_GET['ids']))
{
    $ids = $_GET['ids'];
    $update_issue = mysqli_query($conn, "update tbl_issue set status=2 where id='$ids'");
if($update_issue > 0)
{
    ?>
<script type="text/javascript">
alert("Tsy omena ty.");
window.location.href="../view/issue-request.php";
</script>
<?php
}
}
?>