<?php
$con = mysqli_connect("localhost","root","0731","board");
session_start();
$nick = $_SESSION['nick'];
$id = $_SESSION['id'];

$title = $_POST['title'];
$content = $_POST['content'];

if(isset($_FILES['u_file'])){
    $tmpfile =  $_FILES['u_file']['tmp_name'];
    $filename = $_FILES['u_file']['name'];
    $folder = "/var/www/html/upload/".$filename;
    move_uploaded_file($tmpfile,$folder);
}

$query = "insert into data(title, id, content, nick, file) values('$title', '$id', '$content', '$nick', '$filename')";

mysqli_query($con, $query);
echo "<script>
alert('작성이 완료되었습니다.');
location.replace('list.php');
</script>";
?>