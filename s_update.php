<?php
$con = mysqli_connect("localhost","root","0731","board");
session_start();
$nick = $_SESSION['nick'];
$id = $_SESSION['id'];

$no = $_POST['no'];
$title = $_POST['title'];
$content = $_POST['content'];

if(isset($_FILES['u_file'])){
    $tmpfile =  $_FILES['u_file']['tmp_name'];
    $o_name = $_FILES['u_file']['name'];
    $filename = iconv("UTF-8", "EUC-KR",$_FILES['u_file']['name']);
    $folder = "upload/".$filename;
    move_uploaded_file($tmpfile,$folder);
}

$query = "update data set title='$title', content='$content', file='$o_name' where no = $no";

mysqli_query($con, $query);
echo "<script>
alert('수정이 완료되었습니다.');
location.replace('content.php?no=$no');
</script>";
?>

