<?php
$con = mysqli_connect("localhost","root","0731","board");
session_start();
$nick = $_SESSION['nick'];
$id = $_SESSION['id'];

$no = $_POST['no'];
$title = $_POST['title'];
$content = $_POST['content'];

if(isset($_FILES['u_file'])){
    $type = $_FILES['u_file']['type'];
    $size = $_FILES['u_file']['size'];
    $tmpfile =  $_FILES['u_file']['tmp_name'];
    $filename = $_FILES['u_file']['name'];
    $folder = "./upload/".$filename;
    move_uploaded_file($tmpfile,$folder);
}

$query = "update data set title='$title', content='$content', file='$filename' where no = $no";

mysqli_query($con, $query);
echo "<script>
alert('수정이 완료되었습니다.');
location.replace('content.php?no=$no');
</script>";
?>

