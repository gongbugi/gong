<?php
session_start();
$con = mysqli_connect("localhost","root","0731","board");

$no = $_GET['no'];
$nick = $_SESSION['nick'];

$query1 = "select * from data where no='$no'";
$result = mysqli_query($con, $query1);
$data = mysqli_fetch_array($result);
/*
if($nick != $data['nick']) {
    echo "<script>
    alert('작성자 본인만 삭제 가능합니다.');
    location.replace('content.php?no=$no');
    </script>";
}
else{*/
    mysqli_query($con, $query);
    $query = "delete from data where no='$no'";

    echo "<script>
    alert('삭제되었습니다.');
    location.replace('list.php');
    </script>";
/*}*/
?>

