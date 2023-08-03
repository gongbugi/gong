<?php
$con = mysqli_connect("localhost","gong","0731","board");
session_start();
$nick = $_SESSION['nick'];
$id = $_SESSION['id'];

$comment = $_POST['comment'];
$b_no = $_POST['b_no'];

$query = "insert into reply(b_no, nick, comment) values('$b_no', '$nick', '$comment')";

mysqli_query($con, $query);
echo "<script>
alert('작성이 완료되었습니다.');
location.replace('content.php?no=$b_no');
</script>";
?>

