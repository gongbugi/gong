<?php
session_start();
$con = mysqli_connect("localhost","gong","0731","board");

$reply_no = $_GET['reply_no'];
$b_no = $_GET['b_no'];
$nick = $_SESSION['nick'];

$query1 = "select * from reply where reply_no='$reply_no'";
$result = mysqli_query($con, $query1);
$data = mysqli_fetch_array($result);

if($nick != $data['nick']) {
    echo "<script>
    alert('작성자 본인만 삭제 가능합니다.');
    location.replace('content.php?no=$b_no');
    </script>";
}
else{
    $query = "delete from reply where reply_no='$reply_no'";

    mysqli_query($con, $query);
    
    echo "<script>
    alert('삭제되었습니다.');
    location.replace('content.php?no=$b_no');
    </script>";
}
?>

