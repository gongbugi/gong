<!DOCTYPE html>
<?php
  session_start();
  $nick = $_SESSION['nick'];
  $id = $_SESSION['id'];
  $con = mysqli_connect("localhost","gong","0731","board");
  $b_no = $_GET['b_no'];
  $reply_no = $_GET['reply_no'];
  $query = "select * from reply where reply_no='$reply_no'";
  $result = mysqli_query($con, $query);
  $data = mysqli_fetch_array($result);
?>
<?php
    if($nick != $data['nick']) {
        echo "<script>
        alert('작성자 본인만 수정 가능합니다.');
        location.replace('list.php');
        </script>";
        }
?>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="s_update_reply.php" method="post">
        <input type="hidden" name="b_no" value="<?=$b_no?>">
        <input type="hidden" name="reply_no" value="<?=$reply_no?>">
        <div>
            <br><input type="text" name='comment' value=<?=$data['comment']?> style="width:695px; height:80px;" required="required">
            <button style="padding: 30px 30px 30px 30px;">등록</button>
        </div>
        </form>
        <a href="content.php?no=<?=$data['b_no']?>">뒤로가기</a>
    </body>
</html>
