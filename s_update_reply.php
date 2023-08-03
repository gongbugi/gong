<?php
session_start();
$con = mysqli_connect("localhost","gong","0731","board");
$nick = $_SESSION['nick'];
$id = $_SESSION['id'];

$b_no = $_POST['b_no'];
$reply_no = $_POST['reply_no'];
$comment = $_POST['comment'];

$query = "update reply set comment='$comment' where b_no = $b_no AND reply_no='$reply_no'";

mysqli_query($con, $query);
echo "<script>
alert('수정이 완료되었습니다.');
location.replace('content.php?no=$b_no');
</script>";
?>
