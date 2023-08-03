<?php
$con = mysqli_connect("localhost","gong","0731","board");

$no = $_GET['no'];

$query = "delete from data where no='$no'";

mysqli_query($con, $query);

echo "<script>
alert('삭제되었습니다.');
location.replace('list.php');
</script>";
?>

