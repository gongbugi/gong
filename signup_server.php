<?php
$con = mysqli_connect('localhost','gong','0731','board');
if ($_POST['id'] != NULL && $_POST['pw'] != NULL){
    $user_id = mysqli_real_escape_string($con, ($_POST['id']));
    $user_pw = mysqli_real_escape_string($con, ($_POST['pw']));
    $user_nick = mysqli_real_escape_string($con, ($_POST['nick']));
    $sql_same_id = "select * from userdata where id = '$user_id'";
    $sql_same_nick = "select * from userdata where nick = '$user_nick'";
    $order_id = mysqli_query($con, $sql_same_id);
    $order_nick = mysqli_query($con, $sql_same_nick);
    if(mysqli_num_rows($order_id) > 0){
        echo "<script>
        alert('아이디중복');
        location.replace('signup.php');
        </script>";
    }
    elseif(mysqli_num_rows($order_nick) > 0){
        echo "<script>
        alert('닉네임중복');
        location.replace('signup.php');
        </script>";
    }
    else{
        $sql_save = "insert into userdata (id, pw, nick) values('$user_id', '$user_pw', '$user_nick')";
        mysqli_query($con, $sql_save);
        echo "<script>
        alert('가입성공');
        location.replace('home.php');
        </script>";
    }
}
else{
    echo "<script>
    alert('아이디 또는 비밀번호를 입력하세요.');
    location.replace('signup.php');
    </script>";
}
?>

