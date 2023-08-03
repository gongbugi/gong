<?php
$con = mysqli_connect('localhost','gong','0731','board');
if ($_POST['id'] != NULL && $_POST['pw'] != NULL){
    $user_id = mysqli_real_escape_string($con, ($_POST['id']));
    $user_pw = mysqli_real_escape_string($con, ($_POST['pw']));
    $sql_check = "select * from userdata where id = '$user_id' and pw = '$user_pw'";
    $order = mysqli_query($con, $sql_check);
    $data = mysqli_fetch_array($order);
    if(mysqli_num_rows($order) > 0){
        session_start();
        $nick = $data['nick'];
        $_SESSION['nick'] = $nick;
        $_SESSION['id'] = $user_id;
        echo "<script>       
        location.replace('home.php');
        </script>";
    }
    else{
        echo "<script>
        alert('일치하는 아이디 또는 비밀번호가 없습니다.');
        location.replace('home.php');
        </script>";
    }
}
else{
    echo "<script>
    alert('아이디와 비밀번호를 입력하세요.');
    location.replace('home.php');
    </script>";
}
?>

